<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintReportController extends Controller
{
    public function index()
    {
        return view('admin.complaint.reports.index');
    }
}