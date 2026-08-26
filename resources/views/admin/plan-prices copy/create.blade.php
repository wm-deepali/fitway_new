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
    .cat-breadcrumb { font-size: 12.5px; color: var(--text-hint); margin-top: 3px; }
    .cat-breadcrumb a { color: var(--accent); text-decoration: none; }
    .cat-breadcrumb a:hover { text-decoration: underline; }
    .cat-breadcrumb span { margin: 0 5px; }
    .btn-primary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff !important; border: none; border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 1px 3px rgba(48,61,137,.25); }
    .btn-primary-dash:hover { background: #252f70; }
    .btn-secondary-dash { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); color: var(--text-primary) !important; border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 9px 18px; font-size: 13px; font-weight: 500; cursor: pointer; text-decoration: none !important; }
    .btn-secondary-dash:hover { background: var(--bg); }
    .cat-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); padding: 24px; max-width: 760px; }
    .form-row { display: flex; gap: 16px; flex-wrap: wrap; }
    .form-row .form-field { flex: 1; min-width: 160px; }
    .form-field { margin-bottom: 18px; }
    .form-field label { display: block; font-size: 12.5px; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; letter-spacing: .02em; }
    .form-field .hint { font-size: 11.5px; color: var(--text-hint); margin-top: 4px; }
    .form-control-styled {
        width: 100%; height: 40px; border: 1px solid var(--border); border-radius: var(--radius-sm);
        padding: 0 12px; font-size: 13.5px; font-family: var(--font); color: var(--text-primary);
        outline: none; transition: border-color .15s, box-shadow .15s; background: var(--surface);
    }
    select.form-control-styled { appearance: none; background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='10' height='6'><path d='M0 0l5 6 5-6z' fill='%238c9196'/></svg>"); background-repeat: no-repeat; background-position: right 12px center; }
    .form-control-styled:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(48,61,137,.12); }
    .form-error { color: #b22222; font-size: 12px; margin-top: 5px; }
    .form-actions { display: flex; gap: 10px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border); }
    .section-label { font-size: 13px; font-weight: 650; margin: 0 0 14px; }
    </style>

    <div class="app-content content container-fluid">
        <div class="cat-page">

            <div class="cat-page-header">
                <div>
                    <h1>Add Price Plan</h1>
                    <div class="cat-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span>›</span>
                        <a href="{{ route('admin.plan-prices.index') }}">Price Plans</a>
                        <span>›</span>
                        Add
                    </div>
                </div>
                <a href="{{ route('admin.plan-prices.index') }}" class="btn-secondary-dash">
                    <i class="fa fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="cat-card">
                <form action="{{ route('admin.plan-prices.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <p class="section-label">Titles</p>
                    <div class="form-row">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="form-field">
                                <label for="title_{{ $i }}">Title {{ $i }}</label>
                                <input type="text" id="title_{{ $i }}" name="title_{{ $i }}"
                                    class="form-control-styled" value="{{ old('title_'.$i) }}"
                                    placeholder="Enter title">
                            </div>
                        @endfor
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label for="day">Days of Week</label>
                            <input type="number" id="day" name="day" min="0"
                                class="form-control-styled @error('day') is-invalid @enderror"
                                value="{{ old('day') }}" placeholder="e.g. 5">
                            @error('day') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="class">Class</label>
                            <input type="text" id="class" name="class"
                                class="form-control-styled @error('class') is-invalid @enderror"
                                value="{{ old('class') }}" placeholder="e.g. Zumba">
                            @error('class') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-field">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" id="price" name="price"
                                class="form-control-styled @error('price') is-invalid @enderror"
                                value="{{ old('price') }}" placeholder="Enter price">
                            @error('price') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-field">
                            <label for="montly_yearly">Billing Cycle</label>
                            <select id="montly_yearly" name="montly_yearly"
                                class="form-control-styled @error('montly_yearly') is-invalid @enderror">
                                <option value="">-- Select --</option>
                                <option value="month" {{ old('montly_yearly') == 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ old('montly_yearly') == 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                            @error('montly_yearly') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="form-field">
                        <label for="plan">Plan</label>
                        <select id="plan" name="plan"
                            class="form-control-styled @error('plan') is-invalid @enderror">
                            <option value="">-- Select Plan --</option>
                            <option value="medium" {{ old('plan') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="standard" {{ old('plan') == 'standard' ? 'selected' : '' }}>Standard</option>
                            <option value="premium" {{ old('plan') == 'premium' ? 'selected' : '' }}>Premium</option>
                        </select>
                        @error('plan') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-field">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image"
                            class="form-control-styled @error('image') is-invalid @enderror">
                        <div class="hint">JPG, PNG, GIF, WEBP or SVG — max 2MB</div>
                        @error('image') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-primary-dash">
                            <i class="fa fa-check"></i> Save Price
                        </button>
                        <a href="{{ route('admin.plan-prices.index') }}" class="btn-secondary-dash">Cancel</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')