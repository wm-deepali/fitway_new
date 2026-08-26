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
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }
    .cat-table { width: 100%; border-collapse: collapse; font-size: 13px; }
    .cat-table th { text-align: left; font-size: 11.5px; font-weight: 650; color: var(--text-secondary); text-transform: uppercase; letter-spacing: .03em; padding: 12px 16px; border-bottom: 1px solid var(--border); background: var(--bg); }
    .cat-table td { padding: 12px 16px; border-bottom: 1px solid var(--border); vertical-align: middle; }
    .cat-table tr:last-child td { border-bottom: none; }
    .row-img { height: 60px; width: 60px; object-fit: cover; border-radius: 6px; border: 1px solid var(--border); }
    .row-actions { display: flex; gap: 8px; }
    .icon-btn { display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px; border-radius: 6px; border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); text-decoration: none; cursor: pointer; }
    .icon-btn:hover { background: var(--bg); }
    .icon-btn.danger:hover { background: #fdeceb; color: #b22222; border-color: #f3c6c2; }
    .empty-state { padding: 40px; text-align: center; color: var(--text-hint); font-size: 13.5px; }
    .alert-success-dash { background: #e6f4ea; color: #1e7e34; border: 1px solid #b8e6c1; border-radius: var(--radius-sm); padding: 10px 14px; font-size: 13px; margin-bottom: 18px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <h1>Instagram Images</h1>
                <a href="{{ route('admin.instagram.create') }}" class="btn-primary-dash">
                    <i class="fa fa-plus"></i> Add Instagram Image
                </a>
            </div>

            @if(session('success'))
                <div class="alert-success-dash">{{ session('success') }}</div>
            @endif

            <div class="cat-card">
                <table class="cat-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($instagrams as $index => $instagram)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('instagram/'.$instagram->image) }}" class="row-img"></td>
                                <td>
                                    <div class="row-actions">
                                        <form action="{{ route('admin.instagram.destroy', $instagram) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="icon-btn danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-state">No Instagram images added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')