@include('admin.top-header')

<div class="main-section">
    @include('admin.header')

    <style>
    :root {
        --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
        --text-primary: #202223; --text-secondary:#6d7175; --text-hint:#8c9196;
        --accent: #303d89; --radius-sm: 8px; --radius-md: 12px;
        --shadow-card: 0 1px 3px rgba(0,0,0,.08), 0 0 0 1px var(--border);
        --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }
    .cat-page { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); box-sizing: border-box; }
    .cat-page * { box-sizing: border-box; }
    .cat-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 20px; }
    .cat-page-header h1 { font-size: 20px; font-weight: 650; margin: 0; }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .cat-table { width: 100%; border-collapse: collapse; font-size: 13px; }
    .cat-table th { text-align: left; font-size: 11.5px; font-weight: 650; color: var(--text-secondary); text-transform: uppercase; letter-spacing: .03em; padding: 12px 16px; border-bottom: 1px solid var(--border); background: var(--bg); white-space: nowrap; }
    .cat-table td { padding: 12px 16px; border-bottom: 1px solid var(--border); vertical-align: middle; }
    .cat-table tr:last-child td { border-bottom: none; }
    .badge-score { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 600; background: rgba(48,61,137,.1); color: var(--accent); }
    .empty-state { padding: 40px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <h1>BMI Calculator Submissions</h1>
            </div>

            <div class="cat-card">
                <div style="overflow-x:auto;">
                    <table class="cat-table">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Height</th>
                                <th>Weight</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bmi as $index => $entry)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $entry->full_name }}</td>
                                    <td>{{ $entry->email }}</td>
                                    <td>{{ $entry->phone }}</td>
                                    <td>{{ $entry->height }}</td>
                                    <td>{{ $entry->weight }}</td>
                                    <td><span class="badge-score">{{ $entry->score }}</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty-state">No BMI submissions yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')