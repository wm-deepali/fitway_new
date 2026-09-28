@include('admin.top-header')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  :root {
    --bg: #f1f2f4; --surface: #ffffff; --border: #e3e5e8;
    --text-primary: #202223; --text-secondary: #6d7175; --text-hint: #8c9196;
    --accent: #303d89; --accent-light: #f0f1fc;
    --green: #007a5e; --green-bg: #e3f1ec;
    --amber: #916a00; --amber-bg: #fff5cc;
    --blue: #0069d9; --blue-bg: #e8f2ff;
    --red: #b22222; --red-bg: #fce8e8;
    --purple: #6d28d9; --purple-bg: #ede9fe;
    --radius-sm: 8px; --radius-md: 12px;
    --shadow-card: 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 1px var(--border);
    --font: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  }
  .content-area * { box-sizing: border-box; }
  .content-area { background: var(--bg); padding: 24px 28px; min-height: 100vh; font-family: var(--font); color: var(--text-primary); }

  .dash-page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; flex-wrap: wrap; gap: 12px; }
  .dash-page-header h1 { font-size: 20px; font-weight: 650; color: var(--text-primary) !important; margin: 0; }
  .dash-page-header .dash-meta { font-size: 13px; color: var(--text-secondary); margin-top: 2px; }
  .dash-date-badge { display: inline-flex; align-items: center; gap: 6px; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 7px 13px; font-size: 13px; font-weight: 500; color: var(--text-primary); box-shadow: 0 1px 2px rgba(0, 0, 0, .05); }

  .quick-action-card { display: flex; align-items: center; gap: 12px; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px 18px; height: 100%; text-decoration: none !important; transition: box-shadow .18s, transform .18s; box-shadow: 0 1px 2px rgba(0, 0, 0, .04); }
  .quick-action-card:hover { box-shadow: 0 3px 10px rgba(0, 0, 0, .08); transform: translateY(-1px); }
  .quick-action-card .qa-icon { width: 40px; height: 40px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; background: rgba(255, 255, 255, .55); }
  .quick-action-card .qa-label { font-size: 13.5px; font-weight: 650; color: var(--text-primary) !important; line-height: 1.25; }
  .quick-action-card.qa-purple { background: #f2eefc; } .quick-action-card.qa-purple .qa-icon { color: #6d28d9; }
  .quick-action-card.qa-blue { background: #eaf3ff; } .quick-action-card.qa-blue .qa-icon { color: #0069d9; }
  .quick-action-card.qa-red { background: #fdecec; } .quick-action-card.qa-red .qa-icon { color: #b22222; }
  .quick-action-card.qa-green { background: #e7f6ef; } .quick-action-card.qa-green .qa-icon { color: #007a5e; }

  .cardx { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 20px; box-shadow: var(--shadow-card); height: 100%; }
  .cardx h1,.cardx h2,.cardx h3,.cardx h4,.cardx h5,.cardx h6,.cardx p,.cardx td,.cardx th,.cardx li { color: var(--text-primary) !important; }
  .cardx h5 { font-size: 13px; font-weight: 600; letter-spacing: .02em; text-transform: uppercase; color: var(--text-secondary) !important; margin: 0; }
  .cardx-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; flex-wrap: wrap; gap: 10px; }

  .kpi-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 20px 20px 18px; box-shadow: var(--shadow-card); position: relative; height: 100%; }
  .kpi-label { font-size: 13px; font-weight: 500; color: var(--text-secondary); margin-bottom: 6px; }
  .kpi-value { font-size: 28px; font-weight: 700; color: var(--text-primary) !important; line-height: 1.1; margin-bottom: 10px; }
  .kpi-icon { position: absolute; top: 18px; right: 18px; width: 36px; height: 36px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 15px; opacity: .85; }
  .kpi-icon.purple { background: #ede9fe; color: #6d28d9; }
  .kpi-icon.green { background: var(--green-bg); color: var(--green); }
  .kpi-icon.blue { background: var(--blue-bg); color: var(--blue); }
  .kpi-icon.amber { background: var(--amber-bg); color: var(--amber); }
  .kpi-divider { height: 1px; background: var(--border); margin: 14px -20px; }
  .kpi-sub { font-size: 12px; color: var(--text-hint); }

  .range-filter { display: inline-flex; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 3px; gap: 2px; }
  .range-filter a { font-size: 12.5px; font-weight: 600; padding: 6px 12px; border-radius: 6px; color: var(--text-secondary); text-decoration: none !important; }
  .range-filter a.active { background: var(--accent); color: #fff !important; }
  .range-filter a:not(.active):hover { background: var(--bg); }

  .dash-table { width: 100%; border-collapse: collapse; font-size: 13px; }
  .dash-table thead th { font-size: 11px; font-weight: 600; letter-spacing: .06em; text-transform: uppercase; color: var(--text-hint) !important; padding: 0 12px 10px; border-bottom: 1px solid var(--border); text-align: left; white-space: nowrap; }
  .dash-table tbody tr { border-bottom: 1px solid var(--bg); }
  .dash-table tbody tr:hover { background: var(--bg); }
  .dash-table tbody tr:last-child { border-bottom: none; }
  .dash-table tbody td { padding: 11px 12px; color: var(--text-primary) !important; vertical-align: middle; }
 .today-complaints-table { padding-top: 16px;}
  .id-tag { background: var(--purple-bg); color: var(--purple); font-weight: 650; font-size: 11.5px; padding: 3px 9px; border-radius: 6px; }

  .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 650; padding: 3px 9px; border-radius: 20px; white-space: nowrap; }
  .status-pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; }
  .status-pill.open, .status-pill.draft { background: var(--amber-bg); color: var(--amber); }
  .status-pill.open::before, .status-pill.draft::before { background: var(--amber); }
  .status-pill.progress { background: var(--blue-bg); color: var(--blue); }
  .status-pill.progress::before { background: var(--blue); }
  .status-pill.resolved, .status-pill.printready { background: var(--green-bg); color: var(--green); }
  .status-pill.resolved::before, .status-pill.printready::before { background: var(--green); }
  .status-pill.closed { background: #eceef0; color: var(--text-secondary); }
  .status-pill.closed::before { background: var(--text-hint); }

  .eng-scroll { display: flex; gap: 14px; overflow-x: auto; padding-bottom: 6px; }
  .eng-card { flex: 0 0 200px; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; box-shadow: var(--shadow-card); }
  .eng-card .eng-top { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
  .eng-avatar-fallback { width: 42px; height: 42px; border-radius: 50%; background: var(--accent); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 15px; flex-shrink: 0; }
  .eng-name { font-size: 13.5px; font-weight: 650; color: var(--text-primary); line-height: 1.2; }
  .eng-stats { display: flex; justify-content: space-between; gap: 8px; }
  .eng-stat { flex: 1; text-align: center; background: var(--bg); border-radius: 8px; padding: 8px 4px; }
  .eng-stat .n { font-size: 16px; font-weight: 700; color: var(--text-primary); }
  .eng-stat .l { font-size: 10.5px; color: var(--text-hint); text-transform: uppercase; letter-spacing: .03em; }
  .eng-stat.pending .n { color: var(--amber); }

  .activity-item { display: flex; gap: 12px; padding: 11px 0; border-bottom: 1px solid var(--bg); font-size: 13px; }
  .activity-item:last-child { border-bottom: none; }
  .activity-dot { width: 30px; height: 30px; border-radius: 50%; background: var(--accent-light); color: var(--accent); display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; }
  .activity-text b { color: var(--text-primary); }
  .activity-time { font-size: 11.5px; color: var(--text-hint); margin-top: 2px; }

  .chart-wrap { position: relative; height: 240px; }
  .chart-wrap.sm { height: 210px; }

  /* ==========================================================
     Today's Complaints Report — CRM-style block below the KPI cards
     ========================================================== */
  .today-report-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); overflow: hidden; }

  .today-report-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; padding: 18px 20px; border-bottom: 1px solid var(--border); }
  .today-report-head-left { display: flex; align-items: center; gap: 12px; }
  .today-report-icon { width: 38px; height: 38px; border-radius: var(--radius-sm); background: var(--red-bg); color: var(--red); display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
  .today-report-title { font-size: 15px; font-weight: 700; color: var(--text-primary); line-height: 1.2; }
  .today-report-sub { font-size: 12px; color: var(--text-secondary); margin-top: 2px; }
  .today-report-head-right { display: flex; align-items: center; gap: 10px; }
  .today-report-view-all { font-size: 12.5px; font-weight: 650; color: var(--accent); text-decoration: none !important; display: inline-flex; align-items: center; gap: 5px; }
  .today-report-view-all:hover { text-decoration: underline !important; }

  .today-stats-strip { display: flex; flex-wrap: nowrap; overflow-x: auto; gap: 10px; padding: 16px 20px; border-bottom: 1px solid var(--border); background: var(--bg); }
  .today-stat-chip { flex: 1 1 auto; min-width: max-content; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-sm); padding: 10px 16px; display: flex; align-items: center; gap: 10px; white-space: nowrap; }
  .today-stat-chip .dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
  .today-stat-chip.total .dot { background: var(--accent); }
  .today-stat-chip.open .dot { background: var(--amber); }
  .today-stat-chip.progress .dot { background: var(--blue); }
  .today-stat-chip.resolved .dot { background: var(--green); }
  .today-stat-chip .n { font-size: 17px; font-weight: 700; color: var(--text-primary); line-height: 1; white-space: nowrap; }
  .today-stat-chip .l { font-size: 11px; color: var(--text-hint); text-transform: uppercase; letter-spacing: .03em; margin-top: 2px; white-space: nowrap; }

  .priority-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 650; padding: 3px 9px; border-radius: 20px; white-space: nowrap; }
  .priority-pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; }
  .priority-pill.high { background: var(--red-bg); color: var(--red); }
  .priority-pill.high::before { background: var(--red); }
  .priority-pill.medium { background: var(--amber-bg); color: var(--amber); }
  .priority-pill.medium::before { background: var(--amber); }
  .priority-pill.low { background: var(--green-bg); color: var(--green); }
  .priority-pill.low::before { background: var(--green); }

  .today-cust-cell { display: flex; align-items: center; gap: 10px; }
  .today-cust-avatar { width: 30px; height: 30px; border-radius: 50%; background: var(--accent-light); color: var(--accent); font-size: 12px; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .today-cust-name { font-weight: 650; color: var(--text-primary); line-height: 1.2; }
  .today-cust-mobile { font-size: 11.5px; color: var(--text-hint); margin-top: 1px; }

  .today-eng-cell { display: flex; align-items: center; gap: 8px; }
  .today-eng-unassigned { color: var(--text-hint); font-style: italic; font-size: 12.5px; }

  .today-row-btn { border: 1px solid var(--border); background: var(--surface); color: var(--text-secondary); width: 30px; height: 30px; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; }
  .today-row-btn:hover { background: var(--accent); border-color: var(--accent); color: #fff; }

  .today-report-empty { padding: 40px 20px; text-align: center; color: var(--text-hint); font-size: 13px; }

  @media (max-width: 768px) { .content-area { padding: 16px; } .kpi-value { font-size: 24px; } }
</style>

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">
    <div class="content-area">

      <!-- Page header -->
      <div class="dash-page-header">
        <div>
          <h1>Overview</h1>
          <div class="dash-meta">Welcome back, Admin</div>
        </div>
        <div class="dash-date-badge">
          <i class="fa fa-calendar-alt" style="color:var(--text-hint)"></i> 22nd Sep, 2026
        </div>
      </div>

      <!-- Quick action cards -->
  <!--   <div class="row g-3 mb-3">
  <div class="col-md-3 col-sm-6">
    <a href="{{ route('admin.products.create') }}" class="quick-action-card qa-purple">
      <div class="qa-icon"><i class="fa-solid fa-plus"></i></div>
      <div class="qa-label">Add Product</div>
    </a>
  </div>
  <div class="col-md-3 col-sm-6">
    <a href="{{ route('admin.quotes.create') }}" class="quick-action-card qa-blue">
      <div class="qa-icon"><i class="fa-solid fa-file-invoice"></i></div>
      <div class="qa-label">New Quote</div>
    </a>
  </div>
  <div class="col-md-3 col-sm-6">
    <a href="{{ route('admin.complaint.complaints.create') }}" class="quick-action-card qa-red">
      <div class="qa-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
      <div class="qa-label">Raise a Complaint</div>
    </a>
  </div>
  <div class="col-md-3 col-sm-6">
    <a href="{{ route('admin.customers.index') }}" class="quick-action-card qa-green">
      <div class="qa-icon"><i class="fa-solid fa-users"></i></div>
      <div class="qa-label">Manage Customers</div>
    </a>
  </div>
</div> -->

      <!-- KPI cards -->
      <div class="row g-3 mb-3">
        <div class="col-md-3 col-sm-6">
          <div class="kpi-card">
            <div class="kpi-icon amber"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <div class="kpi-label">Pending Complaints</div>
            <div class="kpi-value">18</div>
            <div class="kpi-divider"></div>
            <div class="kpi-sub">4 raised today</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="kpi-card">
            <div class="kpi-icon green"><i class="fa-solid fa-inbox"></i></div>
            <div class="kpi-label">Leads &amp; Enquiries</div>
            <div class="kpi-value">156</div>
            <div class="kpi-divider"></div>
            <div class="kpi-sub">42 newsletter subscribers</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="kpi-card">
            <div class="kpi-icon purple"><i class="fa-solid fa-box"></i></div>
            <div class="kpi-label">Total Products</div>
            <div class="kpi-value">312</div>
            <div class="kpi-divider"></div>
            <div class="kpi-sub">24 categories · 68 sub-categories</div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="kpi-card">
            <div class="kpi-icon blue"><i class="fa-solid fa-file-lines"></i></div>
            <div class="kpi-label">Quotes in Draft</div>
            <div class="kpi-value">9</div>
            <div class="kpi-divider"></div>
            <div class="kpi-sub">27 print-ready</div>
          </div>
        </div>
      </div>

      <!-- ==========================================================
           Today's Complaints Report — CRM-style, sits right below the
           KPI summary cards. Swap the sample rows for a real dynamic
           loop over your today's-complaints collection.
           ========================================================== -->
      <div class="today-report-card mb-3">

        <div class="today-report-head">
          <div class="today-report-head-left">
            <div class="today-report-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <div>
              <div class="today-report-title">Today's Complaints</div>
              <div class="today-report-sub">22nd September, 2026 &middot; live snapshot of everything raised today</div>
            </div>
          </div>
          <div class="today-report-head-right">
            <!-- TODO: point this at the real complaints index route, filtered by today -->
            <a href="{{ route('admin.complaint.complaints.index') }}" class="today-report-view-all">
              View All Complaints <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="today-stats-strip">
          <div class="today-stat-chip total">
            <span class="dot"></span>
            <div>
              <div class="n">4</div>
              <div class="l">Raised Today</div>
            </div>
          </div>
          <div class="today-stat-chip open">
            <span class="dot"></span>
            <div>
              <div class="n">1</div>
              <div class="l">Open</div>
            </div>
          </div>
          
          <div class="today-stat-chip inprogress">
            <span class="dot"></span>
            <div>
              <div class="n">2</div>
              <div class="l">In Progress</div>
            </div>
          </div>
          
          <div class="today-stat-chip resolved">
            <span class="dot"></span>
            <div>
              <div class="n">1</div>
              <div class="l">Resolved</div>
            </div>
          </div>
        </div>

       <div class="table-responsive today-complaints-table">
          <table class="dash-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Complaint Type</th>
                <th>Priority</th>
                <th>Assigned Engineer</th>
                <th>Status</th>
                <th>Raised At</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td><span class="id-tag">CMP0007</span></td>
                <td>
                  <div class="today-cust-cell">
                    <div class="today-cust-avatar">R</div>
                    <div>
                      <div class="today-cust-name">Ritika Sharma</div>
                      <div class="today-cust-mobile">+91 98765 43210</div>
                    </div>
                  </div>
                </td>
                <td>Treadmill not starting</td>
                <td><span class="priority-pill high">High</span></td>
                <td><span class="today-eng-unassigned">Not assigned</span></td>
                <td><span class="status-pill open">Open</span></td>
                <td>22 Sep, 10:15 AM</td>
                <td><a href="#" class="today-row-btn" title="View"><i class="fa-solid fa-eye"></i></a></td>
              </tr>

              <tr>
                <td><span class="id-tag">CMP0006</span></td>
                <td>
                  <div class="today-cust-cell">
                    <div class="today-cust-avatar">A</div>
                    <div>
                      <div class="today-cust-name">Amit Verma</div>
                      <div class="today-cust-mobile">+91 91234 56780</div>
                    </div>
                  </div>
                </td>
                <td>Cycle brake adjustment</td>
                <td><span class="priority-pill medium">Medium</span></td>
                <td>
                  <div class="today-eng-cell">
                    <div class="eng-avatar-fallback" style="width:24px;height:24px;font-size:11px;">R</div>
                    Rakesh Kumar
                  </div>
                </td>
                <td><span class="status-pill progress">In Progress</span></td>
                <td>22 Sep, 09:40 AM</td>
                <td><a href="#" class="today-row-btn" title="View"><i class="fa-solid fa-eye"></i></a></td>
              </tr>

              <tr>
                <td><span class="id-tag">CMP0005</span></td>
                <td>
                  <div class="today-cust-cell">
                    <div class="today-cust-avatar">W</div>
                    <div>
                      <div class="today-cust-name">Web Mingo IT Solutions</div>
                      <div class="today-cust-mobile">+91 90000 11223</div>
                    </div>
                  </div>
                </td>
                <td>Installation follow-up</td>
                <td><span class="priority-pill low">Low</span></td>
                <td>
                  <div class="today-eng-cell">
                    <div class="eng-avatar-fallback" style="width:24px;height:24px;font-size:11px;">S</div>
                    Suresh Yadav
                  </div>
                </td>
                <td><span class="status-pill progress">In Progress</span></td>
                <td>22 Sep, 09:05 AM</td>
                <td><a href="#" class="today-row-btn" title="View"><i class="fa-solid fa-eye"></i></a></td>
              </tr>

              <tr>
                <td><span class="id-tag">CMP0004</span></td>
                <td>
                  <div class="today-cust-cell">
                    <div class="today-cust-avatar">N</div>
                    <div>
                      <div class="today-cust-name">Neha Gupta</div>
                      <div class="today-cust-mobile">+91 99887 66554</div>
                    </div>
                  </div>
                </td>
                <td>Weight plate replacement</td>
                <td><span class="priority-pill low">Low</span></td>
                <td>
                  <div class="today-eng-cell">
                    <div class="eng-avatar-fallback" style="width:24px;height:24px;font-size:11px;">V</div>
                    Vikas Sharma
                  </div>
                </td>
                <td><span class="status-pill resolved">Resolved</span></td>
                <td>22 Sep, 08:20 AM</td>
                <td><a href="#" class="today-row-btn" title="View"><i class="fa-solid fa-eye"></i></a></td>
              </tr>

              {{--
              <tr>
                <td colspan="8" class="today-report-empty">
                  <i class="fa-solid fa-circle-check" style="font-size:22px;display:block;margin-bottom:8px;color:var(--green);"></i>
                  No complaints raised today. All clear!
                </td>
              </tr>
              --}}

            </tbody>
          </table>
        </div>

      </div>

      

      <!-- Engineer workload -->
      <div class="cardx mb-3">
        <div class="cardx-head"><h5>Engineer-wise Complaints</h5></div>
        <div class="eng-scroll">
          <div class="eng-card">
            <div class="eng-top">
              <div class="eng-avatar-fallback">R</div>
              <div class="eng-name">Rakesh Kumar</div>
            </div>
            <div class="eng-stats">
              <div class="eng-stat"><div class="n">24</div><div class="l">Total</div></div>
              <div class="eng-stat pending"><div class="n">6</div><div class="l">Pending</div></div>
            </div>
          </div>
          <div class="eng-card">
            <div class="eng-top">
              <div class="eng-avatar-fallback">S</div>
              <div class="eng-name">Suresh Yadav</div>
            </div>
            <div class="eng-stats">
              <div class="eng-stat"><div class="n">19</div><div class="l">Total</div></div>
              <div class="eng-stat pending"><div class="n">3</div><div class="l">Pending</div></div>
            </div>
          </div>
          <div class="eng-card">
            <div class="eng-top">
              <div class="eng-avatar-fallback">V</div>
              <div class="eng-name">Vikas Sharma</div>
            </div>
            <div class="eng-stats">
              <div class="eng-stat"><div class="n">15</div><div class="l">Total</div></div>
              <div class="eng-stat pending"><div class="n">5</div><div class="l">Pending</div></div>
            </div>
          </div>
          <div class="eng-card">
            <div class="eng-top">
              <div class="eng-avatar-fallback">P</div>
              <div class="eng-name">Pooja Rani</div>
            </div>
            <div class="eng-stats">
              <div class="eng-stat"><div class="n">11</div><div class="l">Total</div></div>
              <div class="eng-stat pending"><div class="n">4</div><div class="l">Pending</div></div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Range filter -->
      <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap" style="gap:10px;">
        <div style="font-size:16px;font-weight:650;">Complaints &amp; Activity Overview</div>
        <div class="range-filter">
          <a href="#" class="active">Today</a>
          <a href="#">7 Days</a>
          <a href="#">15 Days</a>
          <a href="#">30 Days</a>
        </div>
      </div>
      <!-- Recent activity tabs -->
      <div class="cardx mb-3 p-0" style="overflow:hidden;">
        <ul class="nav nav-tabs px-3 pt-3" role="tablist" style="border-bottom:1px solid var(--border);">
          <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-complaints" type="button">Recent Complaints</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-leads" type="button">Recent Leads &amp; Enquiries</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-quotes" type="button">Recent Quotes</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-today" type="button">Today's Complaints</button></li>
        </ul>

        <div class="tab-content p-3">

          <div class="tab-pane fade show active" id="tab-complaints">
            <div class="table-responsive">
              <table class="dash-table">
                <thead><tr><th>ID</th><th>Customer</th><th>Assigned To</th><th>Status</th><th>Raised On</th></tr></thead>
                <tbody>
                  <tr><td><span class="id-tag">CMP0004</span></td><td>Ritika Sharma</td><td>-</td><td><span class="status-pill open">Open</span></td><td>22 Sep, 10:15 AM</td></tr>
                  <tr><td><span class="id-tag">CMP0003</span></td><td>Amit Verma</td><td>Rakesh Kumar</td><td><span class="status-pill progress">In Progress</span></td><td>21 Sep, 04:40 PM</td></tr>
                  <tr><td><span class="id-tag">CMP0002</span></td><td>Web Mingo IT Solutions</td><td>Suresh Yadav</td><td><span class="status-pill resolved">Resolved</span></td><td>19 Sep, 09:05 AM</td></tr>
                  <tr><td><span class="id-tag">CMP0001</span></td><td>Neha Gupta</td><td>Rakesh Kumar</td><td><span class="status-pill closed">Closed</span></td><td>16 Sep, 11:22 AM</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="tab-leads">
            <div class="table-responsive">
              <table class="dash-table">
                <thead><tr><th>Name</th><th>Type</th><th>Message</th><th>Date</th></tr></thead>
                <tbody>
                  <tr><td>Karan Mehta</td><td>Contact</td><td>Need pricing for bulk order...</td><td>22 Sep, 2026</td></tr>
                  <tr><td>Sunita Devi</td><td>Product Enquiry</td><td>Is this available in blue colour...</td><td>21 Sep, 2026</td></tr>
                  <tr><td>Rohit Bansal</td><td>Newsletter</td><td>Subscribed to updates</td><td>20 Sep, 2026</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="tab-quotes">
            <div class="table-responsive">
              <table class="dash-table">
                <thead><tr><th>Proposal ID</th><th>Business</th><th>Amount</th><th>Status</th><th>Date</th></tr></thead>
                <tbody>
                  <tr><td><span class="id-tag">FIT00003</span></td><td>Web Mingo IT Solutions</td><td>₹15,875.00</td><td><span class="status-pill draft">Draft</span></td><td>22 Sep, 2026</td></tr>
                  <tr><td><span class="id-tag">FIT00002</span></td><td>Web Mingo IT Solutions</td><td>₹10,316.00</td><td><span class="status-pill printready">Print Ready</span></td><td>21 Sep, 2026</td></tr>
                  <tr><td><span class="id-tag">FIT00001</span></td><td>Web Mingo IT Solutions</td><td>₹6,040.00</td><td><span class="status-pill printready">Print Ready</span></td><td>18 Sep, 2026</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="tab-today">
            <div class="table-responsive">
              <table class="dash-table">
                <thead><tr><th>ID</th><th>Customer</th><th>Type</th><th>Assigned To</th><th>Status</th></tr></thead>
                <tbody>
                  <tr><td><span class="id-tag">CMP0004</span></td><td>Ritika Sharma</td><td>Unpaid</td><td>-</td><td><span class="status-pill open">Open</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <!-- Charts -->
      <div class="row g-3 mb-3">
        <div class="col-lg-5">
          <div class="cardx">
            <h5 class="mb-3">Complaint Status Split</h5>
            <div class="chart-wrap sm"><canvas id="statusPieChart"></canvas></div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="cardx">
            <h5 class="mb-3">Complaints Trend</h5>
            <div class="chart-wrap sm"><canvas id="trendLineChart"></canvas></div>
          </div>
        </div>
      </div>

      <!-- Products by Category -->
      <div class="row g-3 mb-3">
        <div class="col-lg-12">
          <div class="cardx">
            <h5 class="mb-3">Products by Category</h5>
            <div class="chart-wrap"><canvas id="categoryChart"></canvas></div>
          </div>
        </div>
      </div>

      

      <!-- Recent activity log -->
      <div class="row g-3">
        <div class="col-lg-12">
          <div class="cardx">
            <h5 class="mb-3">Recent Activity (Admins &amp; Sub-Admins)</h5>
            <div class="activity-item">
              <div class="activity-dot"><i class="fa-solid fa-clock-rotate-left"></i></div>
              <div>
                <div class="activity-text"><b>Admin</b> marked complaint CMP0002 as Resolved</div>
                <div class="activity-time">2 hours ago</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="activity-dot"><i class="fa-solid fa-clock-rotate-left"></i></div>
              <div>
                <div class="activity-text"><b>Rakesh Kumar</b> added notes to complaint CMP0003</div>
                <div class="activity-time">5 hours ago</div>
              </div>
            </div>
            <div class="activity-item">
              <div class="activity-dot"><i class="fa-solid fa-clock-rotate-left"></i></div>
              <div>
                <div class="activity-text"><b>Admin</b> created new proposal FIT00003</div>
                <div class="activity-time">Yesterday, 06:40 PM</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        const categoryChart = new Chart(document.getElementById('categoryChart'), {
          type: 'bar',
          data: {
            labels: ['Treadmill', 'Cross Trainers', 'Bikes', 'Home Gym', 'Plates'],
            datasets: [{ label: 'Products', data: [82, 64, 47, 71, 48], backgroundColor: '#303d89', borderRadius: 6, maxBarThickness: 36 }]
          },
          options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } } }
        });

        const statusPieChart = new Chart(document.getElementById('statusPieChart'), {
          type: 'doughnut',
          data: {
            labels: ['Open', 'In Progress', 'Resolved', 'Closed'],
            datasets: [{ data: [18, 9, 34, 21], backgroundColor: ['#916a00', '#0069d9', '#007a5e', '#8c9196'], borderWidth: 0 }]
          },
          options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 11 } } } } }
        });

        const trendLineChart = new Chart(document.getElementById('trendLineChart'), {
          type: 'line',
          data: {
            labels: ['16 Sep', '17 Sep', '18 Sep', '19 Sep', '20 Sep', '21 Sep', '22 Sep'],
            datasets: [{ label: 'Complaints Raised', data: [3, 5, 2, 6, 4, 7, 4], borderColor: '#303d89', backgroundColor: 'rgba(48,61,137,0.08)', fill: true, tension: 0.35, pointRadius: 3, pointBackgroundColor: '#303d89' }]
          },
          options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, ticks: { precision: 0 } } } }
        });
      </script>

    </div><!-- /content-area -->
  </div><!-- /container-fluid -->
</div><!-- /main-section -->

@include('admin.footer')