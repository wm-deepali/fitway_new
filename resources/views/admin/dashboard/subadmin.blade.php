@include('admin.top-header')

<div class="main-section">
  @include('admin.header')

  <div class="container-fluid">
    <div class="content-area" style="background:#f1f2f4; padding:24px 28px; min-height:100vh;">

      <div class="dash-page-header mb-4">
        <h1 style="font-size:20px; font-weight:650; margin:0;">Overview</h1>
        <div style="font-size:13px; color:#6d7175; margin-top:2px;">
          Welcome back, {{ auth()->user()->name }}
        </div>
      </div>

      <div class="card" style="border:1px solid #e3e5e8; border-radius:12px; box-shadow:0 1px 3px rgba(0,0,0,.08);">
        <div class="card-body text-center py-5">
          <i class="fa-solid fa-hand-wave" style="font-size:28px; color:#303d89;"></i>
          <h5 class="mt-3 mb-1">You're logged in</h5>
          <p class="text-muted mb-0">Use the menu on the left to open the modules assigned to you.</p>
        </div>
      </div>

    </div>
  </div>
</div>

@include('admin.footer')