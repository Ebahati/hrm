<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>navbar</title>

    <style>
        .hidden {
            display: none;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons@latest/themify-icons.css" />


</head>
<body>
<aside class="left-sidebar with-vertical">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
          
            <img src="{{ asset('assets/logo.png') }}" width="100" height="50" class="dark-logo" alt="Logo-Dark" />
            
          </a>
          <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
          <span class="hide-menu">x</span>
          </a>
        </div>

<nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
           
            <li class="sidebar-item">
    <a class="sidebar-link" href="{{ route('dashboard') }}" id="get-url" aria-expanded="false">
        <span>
            <i class="ti ti-aperture"></i> <!-- Dashboard icon -->
        </span>
        <span class="hide-menu">Dashboard</span> <!-- Text label -->
    </a>
</li>

           

            <!-- ---------------------------------- -->
            <!-- sections -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Section</span>
            </li>
           
            
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Configuration</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                
                <li class="sidebar-item">
                  <a href="{{ route('manageDepartments') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage departments</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageDesignations') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage designations</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageLeaveCategories') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage Leave Categories</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageHoliday') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Holiday Lists and Events</span>
                  </a>
                </li>
                
                <li class="sidebar-item">
                  <a href="{{ route('manageAwardCategories') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Award Categories</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageRoles') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Roles</span>
                  </a>
                </li>
              </ul>
            </li>
           
          </ul>
        </nav>
        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
          <div class="hstack gap-3">
            <div class="john-img">
              <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
            </div>
            <div class="john-title">
              <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
              <span class="fs-2">Designer</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
              <i class="ti ti-power fs-6"></i>
            </button>
          </div>
        </div>
        </div>
        </aside>
        </body>
</html>