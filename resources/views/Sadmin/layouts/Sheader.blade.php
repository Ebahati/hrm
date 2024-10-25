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
            <a href="{{ route('dashboard') }}" class="sidebar-link">
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
                <span class="hide-menu">Employees</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('newEmployee') }}" class="sidebar-link">
                 

                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New employee</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageEmployee') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage employee</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-basket"></i>
                </span>
                <span class="hide-menu">Payroll</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('manageSalary') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Salary</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('salaryList') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Salary List</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('newIncrement') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New increment</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('incrementList') }}"  class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Increment List</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/eco-add-product.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Payment</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/eco-edit-product.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Payslips</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageBonus') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Bonus</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageDeductions') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Deductions</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageLoan') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Loans</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Attendance</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('manageAttendance') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage Attendance</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/blog-detail.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Reports</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Expenses</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                
              
                <li class="sidebar-item">
                  <a href="{{ route('addExpense') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Create Expense</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('expenseList') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Expense  List</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Leave</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                
               
                <li class="sidebar-item">
                  <a href="{{ route('addLeave') }}"class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New leave application</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageLeave') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage leave application</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="https://bootstrapdemos.adminmart.com/modernize/dist/main/blog-detail.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">leave reports</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Awards</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('addAward') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New awards</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageAward') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage awards</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">Notice board</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('addNotice') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New notice</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageNotice') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage notice</span>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-chart-donut-3"></i>
                </span>
                <span class="hide-menu">File management</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('addFiles') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">New upload</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('manageFiles') }}" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">File list</span>
                  </a>
                </li>
              </ul>
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
                  <a href="manage-departments" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage departments</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="manage-designations" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage designations</span>
                  </a>
                </li>
              
            <li class="sidebar-item">
                  <a href="manage-leavecategories" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage Leave Categories</span>
                  </a>
                </li>
              
            
            <li class="sidebar-item">
                  <a href="manage-awardcategories" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Manage Awards Categories</span>
                  </a>
                </li>
                 
            <li class="sidebar-item">
                  <a href="manage-roles" class="sidebar-link">
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