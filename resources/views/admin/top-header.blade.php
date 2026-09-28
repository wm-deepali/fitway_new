<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Fitway Shunty Cycle Store a exlcusive store for Lucknowi Chikan kaari">
  <meta name="keywords" content="Fitway Shunty Cycle Store">
  <meta name="author" content="Webmingo">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Admin Dashboard | Fitway Shunty Cycle Store</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/android-chrome-512x512.png') }}">
  


  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  </script>

  <style>
    .main-section {
      display: flex !important;
    }

    .main-section #cssmenu {
      width: 280px !important;
      min-width: 280px !important;
      flex-shrink: 0 !important;
    }

    .main-section .app-content {
      flex: 1 !important;
      min-width: 0 !important;
    }
  </style>

  {{-- ==========================================================
  Scoped styling for the new top menu bar only — indigo theme to
  match the rest of the admin (Quotes) screens. Nothing above/below
  this block was touched.
  ========================================================== --}}
  <style>
    .wm-top-nav {
      background-color: #303d89;
      box-shadow: 0 2px 6px rgba(48, 61, 137, 0.18);
    }

.wm-top-nav .container-fluid {
    padding-left: 285px;
    margin-bottom:10px;
}
    .wm-top-nav .wm-top-nav-list {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 4px;
      padding: 6px 0;
      margin: 0;
      overflow-x: auto;
    }

    .wm-top-nav .wm-top-nav-list li {
      flex-shrink: 0;
    }

    .wm-top-nav .wm-top-nav-list li a {
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 0.5rem 0.9rem;
      border-radius: 8px;
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.82rem;
      font-weight: 600;
      letter-spacing: 0.2px;
      text-decoration: none;
      white-space: nowrap;
      transition: background-color 0.15s ease, color 0.15s ease;
    }

    .wm-top-nav .wm-top-nav-list li a:hover {
      background-color: rgba(255, 255, 255, 0.12);
      color: #ffffff;
      text-decoration: none;
    }

    .wm-top-nav .wm-top-nav-list li.active a {
      background-color: #ffffff;
      color: #303d89;
    }

    .wm-top-nav .wm-top-nav-list li a i {
      font-size: 0.85rem;
    }

    @media (max-width: 576px) {
      .wm-top-nav .wm-top-nav-list {
        padding: 6px 12px;
      }
    }
  </style>

</head>

<body>


  <div class="top-header-sec py-2 bg-light border-bottom mb-2">
    <div class="container-fluid">
      <div class="top-main-header d-flex align-items-center">
        <div class="admin-logo">
    <a href="{{ url('admin/dashboard') }}">
        <img src="{{ asset('admin/images/logo.png') }}" style="height:28px;">
    </a>
</div>
        <div class="ml-auto">

          <div class="btn-group">

            <button class="btn bg-transparent p-0 dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

              <i class="fa-solid fa-user-circle"></i> Admin

            </button>

            <div class="dropdown-menu keep-open header-dropdown">

              <a class="dropdown-item" href="{{ url('admin/profile-setting') }}">

                <i class="fa-solid fa-user mr-2"></i> Profile

              </a>

              <a class="dropdown-item" href="{{ url('admin/logout') }}">

                <i class="fa-solid fa-right-from-bracket mr-2"></i> Logout

              </a>

            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  </div>

  {{-- ==========================================================
  New top menu bar — all 6 items point to Manage Quotes for now.
  Update each href/route below once the real routes are ready;
  the active-state check on each <li> already follows the same
  pattern you gave, keyed to that item's own route name.
  ========================================================== --}}
  <nav class="wm-top-nav">
    <div class="container-fluid">
       <ul class="wm-top-nav-list">
 
        <li class="{{ request()->routeIs('admin.quotes.create') ? 'active' : '' }}">
          <a href="{{ route('admin.quotes.create') }}">
            <i class="fa-solid fa-file-circle-plus"></i> Create New Quote
          </a>
        </li>
 
        <li class="{{ request()->routeIs('admin.quotes.index') ? 'active' : '' }}">
          <a href="{{ route('admin.quotes.index') }}">
            <i class="fa-solid fa-file-lines"></i> All Quotes
          </a>
        </li>
 
        <li class="{{ request()->routeIs('admin.complaint.complaints.create') ? 'active' : '' }}">
          <a href="{{ route('admin.complaint.complaints.create') }}">
            <i class="fa-solid fa-triangle-exclamation"></i> Raise New Complaint
          </a>
        </li>
 
        <li class="{{ request()->routeIs('admin.complaint.complaints.index') ? 'active' : '' }}">
          <a href="{{ route('admin.complaint.complaints.index') }}">
            <i class="fa-solid fa-list-check"></i> All Complaints
          </a>
        </li>
 
        <li class="{{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
          <a href="{{ route('admin.products.create') }}">
            <i class="fa-solid fa-box-open"></i> Add New Product
          </a>
        </li>
 
        <li class="{{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
          <a href="{{ route('admin.products.index') }}">
            <i class="fa-solid fa-boxes-stacked"></i> Show All Products
          </a>
        </li>
 
      </ul>
    </div>
  </nav>


  <script type="text/javascript">
    jQuery('.dropdown-menu.keep-open').on('click', function (e) {
      e.stopPropagation();
    });

    if (1) {
      $('body').attr('tabindex', '0');
    }
    else {
      alertify.confirm().set({ 'reverseButtons': true });
      alertify.prompt().set({ 'reverseButtons': true });
    }
  </script>