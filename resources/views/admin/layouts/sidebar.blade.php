

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
            
              <span class="hide-menu">Home</span>
            </li>
           
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('dashboard') }}" id="get-url" aria-expanded="false">
                <span>
                <i class="fas fa-camera"></i> 

                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
           
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Section</span>
            </li>
            @if(in_array('addFiles', $allowedRoutes) || in_array('manageFiles', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-folder fs-4"></i>
            </span>
            <span class="hide-menu">File Management</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('addFiles', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('addFiles') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-upload fs-4"></i>
                        </div>
                        <span class="hide-menu">New upload</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageFiles', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageFiles') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-archive fs-4"></i>
                        </div>
                        <span class="hide-menu">File list</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

            @if(in_array('addLeave', $allowedRoutes) || in_array('leaveStatus', $allowedRoutes) || in_array('manageLeave', $allowedRoutes) || in_array('leaveReports', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-id-badge fs-4"></i>
            </span>
            <span class="hide-menu">Leave</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('addLeave', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('addLeave') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-paper-plane fs-4"></i>
                        </div>
                        <span class="hide-menu">New leave application</span>
                    </a>
                </li>
            @endif

            @if(in_array('leaveStatus', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('leaveStatus') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-paper-plane fs-4"></i>
                        </div>
                        <span class="hide-menu">Leave Status</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageLeave', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageLeave') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-cog fs-4"></i>
                        </div>
                        <span class="hide-menu">Manage leave application</span>
                    </a>
                </li>
            @endif

            @if(in_array('leaveReports', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('leaveReports') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar-check fs-4"></i>
                        </div>
                        <span class="hide-menu">Leave Reports</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

           
            @if(in_array('newEmployee', $allowedRoutes) || in_array('manageEmployee', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-users fs-4"></i>
            </span>
            <span class="hide-menu">Employees</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('newEmployee', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('newEmployee') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus fs-4"></i>
                        </div>
                        <span class="hide-menu">New employee</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageEmployee', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageEmployee') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-cog fs-4"></i>
                        </div>
                        <span class="hide-menu">Manage employee</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

            @if(in_array('manageSalary', $allowedRoutes) || in_array('salaryList', $allowedRoutes) || in_array('paymentList', $allowedRoutes) || in_array('salaryPayments', $allowedRoutes) || in_array('manageBonus', $allowedRoutes) || in_array('manageDeductions', $allowedRoutes) || in_array('manageLoan', $allowedRoutes) || in_array('generate.payslip', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-money-bill-wave fs-4"></i>
            </span>
            <span class="hide-menu">Payroll</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('manageSalary', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageSalary') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-dollar-sign fs-4"></i>
                        </div>
                        <span class="hide-menu">Salary</span>
                    </a>
                </li>
            @endif

            @if(in_array('salaryList', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('salaryList') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-clipboard-list fs-4"></i>
                        </div>
                        <span class="hide-menu">Salary List</span>
                    </a>
                </li>
            @endif

            @if(in_array('paymentList', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('paymentList') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-invoice-dollar fs-4"></i>
                        </div>
                        <span class="hide-menu">Payment List</span>
                    </a>
                </li>
            @endif

            @if(in_array('salaryPayments', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('salaryPayments') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-credit-card fs-4"></i>
                        </div>
                        <span class="hide-menu">Payment</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageBonus', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageBonus') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus-circle fs-4"></i>
                        </div>
                        <span class="hide-menu">Bonus</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageDeductions', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageDeductions') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-minus-circle fs-4"></i>
                        </div>
                        <span class="hide-menu">Deductions</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageLoan', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageLoan') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-hand-holding-usd fs-4"></i>
                        </div>
                        <span class="hide-menu">Loans</span>
                    </a>
                </li>
            @endif

            @if(in_array('generate.payslip', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('generate.payslip') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-invoice fs-4"></i>
                        </div>
                        <span class="hide-menu">Payslips</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

          
                
                  @if(in_array('manageHoliday', $allowedRoutes))
    <li class="sidebar-item">
        <a href="manage-holiday" class="sidebar-link">
            <div class="round-16 d-flex align-items-center justify-content-center">
                <i class="fas fa-clock fs-4"></i>
            </div>
            <span class="hide-menu">Holidays and Events</span>
        </a>
    </li>
@endif

            
                @if(in_array('addExpense', $allowedRoutes) || in_array('expenseList', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-dollar-sign fs-4"></i>
            </span>
            <span class="hide-menu">Expenses</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('addExpense', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('addExpense') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus-circle fs-4"></i>
                        </div>
                        <span class="hide-menu">Create Expense</span>
                    </a>
                </li>
            @endif

            @if(in_array('expenseList', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('expenseList') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-invoice fs-4"></i>
                        </div>
                        <span class="hide-menu">Expense List</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

          
            @if(in_array('addAward', $allowedRoutes) || in_array('manageAward', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-medal fs-4"></i>
            </span>
            <span class="hide-menu">Awards</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('addAward', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('addAward') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus-circle fs-4"></i>
                        </div>
                        <span class="hide-menu">New awards</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageAward', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageAward') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-cog fs-4"></i>
                        </div>
                        <span class="hide-menu">Manage awards</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

            
            @if(in_array('addNotice', $allowedRoutes) || in_array('manageNotice', $allowedRoutes))
    <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span class="d-flex">
                <i class="fas fa-bullhorn fs-4"></i>
            </span>
            <span class="hide-menu">Notice board</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
            @if(in_array('addNotice', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('addNotice') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus-circle fs-4"></i>
                        </div>
                        <span class="hide-menu">New notice</span>
                    </a>
                </li>
            @endif

            @if(in_array('manageNotice', $allowedRoutes))
                <li class="sidebar-item">
                    <a href="{{ route('manageNotice') }}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="fas fa-edit fs-4"></i>
                        </div>
                        <span class="hide-menu">Manage notice</span>
                    </a>
                </li>
            @endif
        </ul>
    </li>
@endif

            @if(in_array('manageDepartments', $allowedRoutes) || in_array('manageDesignations', $allowedRoutes))
                <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                <i class="fas fa-cog fs-4"></i>

                </span>
                <span class="hide-menu">Configuration</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
              @if(in_array('manageDepartments',$allowedRoutes))
                <li class="sidebar-item">
                  <a href="manage-departments" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="fas fa-building fs-4"></i>

                    </div>
                    <span class="hide-menu">Manage departments</span>
                  </a>
                </li>
                @endif
                @if(in_array('manageDesignations',$allowedRoutes))
                <li class="sidebar-item">
                  <a href="manage-designations" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-tie fs-4"></i>

                    </div>
                    <span class="hide-menu">Manage designations</span>
                  </a>
                </li>
              
                @endif
              </ul>
            </li>
            @endif
        
        </nav>
      
       <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
    <div class="hstack gap-3">
        <div class="john-img">
            <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
        </div>
        <div class="john-title">
        @if (Auth::check())
    <h6 class="mb-0 fs-4 fw-semibold">{{ Auth::user()->employee_id }}</h6>
@else
    <h6 class="mb-0 fs-4 fw-semibold">No Employee ID available</h6>
@endif
<span class="fs-2">
    {{ Auth::check() && Auth::user()->employee && Auth::user()->employee->designation ? Auth::user()->employee->designation->name : 'No Designation' }}
</span>



        </div>
        <a href="{{ route('login') }}" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout">
            <i class="fas fa-power-off fs-6"></i>
        </a>
    </div>
</div>


       
      </div>
    </aside>
   
    <!--  Sidebar End -->