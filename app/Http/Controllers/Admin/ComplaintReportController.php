<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintReportController extends Controller
{
    public function index(Request $request)
    {
        [$from, $to] = $this->dateRange($request);
        $base = $this->filteredQuery($request, $from, $to);

        // ---- Summary cards (single query) ----
        $s = (clone $base)->toBase()->selectRaw(
            "COUNT(*) as total,
             COALESCE(SUM(status = ?), 0) as new_count,
             COALESCE(SUM(status = ?), 0) as process_count,
             COALESCE(SUM(status = ?), 0) as done_count,
             COALESCE(SUM(technician_id IS NULL), 0) as unassigned,
             COALESCE(SUM(CASE WHEN complaint_type = 'paid' THEN paid_price ELSE 0 END), 0) as revenue",
            [Complaint::STATUS_NEW, Complaint::STATUS_UNDER_PROCESS, Complaint::STATUS_COMPLETED]
        )->first();

        $summary = [
            'total'      => (int) $s->total,
            'new'        => (int) $s->new_count,
            'process'    => (int) $s->process_count,
            'completed'  => (int) $s->done_count,
            'unassigned' => (int) $s->unassigned,
            'revenue'    => (float) $s->revenue,
            'rate'       => $s->total > 0 ? round(($s->done_count / $s->total) * 100) : 0,
        ];

        // ---- Trend by day ----
        $trend = (clone $base)->toBase()
            ->selectRaw('DATE(created_at) as d, COUNT(*) as c')
            ->groupBy('d')->orderBy('d')
            ->pluck('c', 'd');

        // ---- Technician-wise ----
        $technicianStats = (clone $base)
            ->whereNotNull('technician_id')
            ->select('technician_id')
            ->selectRaw('COUNT(*) as total')
            ->selectRaw('SUM(status = ?) as completed', [Complaint::STATUS_COMPLETED])
            ->selectRaw('SUM(status != ?) as pending', [Complaint::STATUS_COMPLETED])
            ->groupBy('technician_id')
            ->with('technician:id,full_name')
            ->orderByDesc('total')
            ->get();

        // ---- Detail list ----
        $complaints = (clone $base)
            ->with(['technician:id,full_name', 'state:id,name', 'city:id,name'])
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $technicians = Technician::orderBy('full_name')->get(['id', 'full_name']);

        return view('admin.complaint.reports.index', compact(
            'summary', 'trend', 'technicianStats', 'complaints', 'technicians', 'from', 'to'
        ));
    }

    public function export(Request $request)
    {
        [$from, $to] = $this->dateRange($request);

        $query = $this->filteredQuery($request, $from, $to)
            ->with(['technician:id,full_name', 'state:id,name', 'city:id,name'])
            ->latest();

        $filename = 'complaints-report-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(function () use ($query) {
            $out = fopen('php://output', 'w');
            fputcsv($out, [
                'Complaint ID', 'Customer', 'Mobile', 'Email', 'State', 'City', 'Type',
                'Technician', 'Status', 'Paid Price', 'Source', 'Schedule Date', 'Raised On',
            ]);

            $query->chunk(500, function ($rows) use ($out) {
                foreach ($rows as $c) {
                    fputcsv($out, [
                        $c->complaint_code,
                        $c->customer_name,
                        $c->mobile_number,
                        $c->email,
                        $c->state->name ?? '',
                        $c->city->name ?? '',
                        ucfirst($c->complaint_type),
                        $c->technician->full_name ?? 'Unassigned',
                        $c->status_label,
                        $c->paid_price,
                        ucfirst($c->source ?? ''),
                        optional($c->schedule_date)->format('d M Y'),
                        $c->created_at->format('d M Y h:i A'),
                    ]);
                }
            });

            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv']);
    }

    /** Defaults to the last 30 days when no dates are given. */
    private function dateRange(Request $request): array
    {
        $from = $request->filled('from') ? $request->from : now()->subDays(29)->toDateString();
        $to   = $request->filled('to') ? $request->to : now()->toDateString();

        return [$from, $to];
    }

    private function filteredQuery(Request $request, string $from, string $to)
    {
        return Complaint::query()
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('technician_id'), function ($q) use ($request) {
                $request->technician_id === 'none'
                    ? $q->whereNull('technician_id')
                    : $q->where('technician_id', $request->technician_id);
            })
            ->when($request->filled('complaint_type'), fn ($q) => $q->where('complaint_type', $request->complaint_type))
            ->when($request->filled('source'), fn ($q) => $q->where('source', $request->source));
    }
}