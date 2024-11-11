
<header class="topbar">
        <div class="with-vertical">
          <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
              <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                <i class="fas fa-bars fs-4"></i>

                </a>
              </li>
              <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-search fs-4"></i>

                </a>
              </li>
            </ul>

            <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
            <li class="nav-item">
        <span class="nav-link" id="greetingMessage"></span>
    </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
    <a class="nav-link" href="https://calendar.google.com" target="_blank">Calendar</a>
</li>

              <li class="nav-item dropdown-hover d-none d-lg-block">
    <a class="nav-link" href="https://mail.google.com" target="_blank">Email</a>
</li>


            </ul>
            <script>
    function updateGreeting() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        let greeting;

        if (hours < 12) {
            greeting = "Good morning";
        } else if (hours < 18) {
            greeting = "Good afternoon";
        } else {
            greeting = "Good evening";
        }

        document.getElementById("greetingMessage").innerText = `${greeting}, it's ${hours % 12 || 12}:${minutes} ${hours >= 12 ? 'PM' : 'AM'}`;
    }

  
    updateGreeting();
    setInterval(updateGreeting, 60000);
</script>


            <div class="d-block d-lg-none py-4">
    <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
        <img src="{{ asset('assets/logo.png') }}" width="180" height="50" class="dark-logo" alt="Logo-Dark" />
        <img src="{{ asset('assets/logo.png') }}" width="180" height="50" class="light-logo" alt="Logo-light" />
    </a>
</div>


            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-ellipsis-h fs-7"></i>

            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-align-justify fs-7"></i>

                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                 
                <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
    <a class="nav-link position-relative" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="far fa-bell"></i>
        @if($unreadNotificationsCount > 0)
            <div class="notification bg-primary rounded-circle">
                {{ $unreadNotificationsCount }}
            </div>
        @endif
    </a>

    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
        <div class="d-flex align-items-center justify-content-between py-3 px-7">
            <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
            <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">{{ $unreadNotificationsCount }} new</span>
        </div>
        <div class="message-body" data-simplebar>
        @forelse($notifications as $notification)
        <a href="javascript:void(0)" 
   class="dropdown-item {{ $notification->read ? 'read' : 'unread' }}" 
   id="notification-{{ $notification->id }}" 
   data-notification-id="{{ $notification->id }}">
    <div class="w-100">
        <h6 class="fw-semibold">{{ $notification->title }}</h6>
        <span class="text-muted">{{ $notification->message }}</span>

        @if($notification->payslip_url)
        <a href="{{ $notification->payslip_url }}" class="btn btn-sm btn-link text-muted mt-0" download>Download Payslip</a>

        @endif

        <!-- Mark as Read -->
        <form action="{{ route('markNotificationAsRead', $notification->id) }}" method="POST" style="display:inline;" id="mark-read-form-{{ $notification->id }}">
    @csrf
    @method('POST') 
    <button type="submit" style="display:none" id="mark-read-button-{{ $notification->id }}"></button>
    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('mark-read-form-{{ $notification->id }}').submit();" class= "text-muted">
       I Mark as Read
    </a>
</form>

        <!-- Delete -->
        <form action="{{ route('deleteNotification', $notification->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $notification->id }}">
            @csrf
            @method('DELETE')
            <button type="submit" style="display:none" id="delete-button-{{ $notification->id }}"></button>
            <a href="javascript:void(0)" onclick="confirmDelete({{ $notification->id }})" class="text-muted">
                I Delete
            </a>
        </form>
    </div>
</a>

@empty
    <div class="dropdown-item text-muted">No new notifications</div>
@endforelse


        </div>
    </div>
</li>


                  <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                      <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                      <div class="profile-dropdown position-relative" data-simplebar>
                        <div class="py-3 px-7 pb-0">
                          <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                          <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                          <div class="ms-3">
                          @if (Auth::check())
    <h5 class="mb-1 fs-3">{{ Auth::user()->employee_id }}</h5>
@else
    <p>Please log in to view your employee ID.</p>
@endif

<span class="mb-1 d-block">
    @if(Auth::check() && Auth::user()->employee && Auth::user()->employee->designation)
        {{ Auth::user()->employee->designation->name }}
    @else
        No Designation Assigned
    @endif
</span>


<span class="mb-1 d-block">
    @if(Auth::check() && Auth::user()->employee)
        {{ Auth::user()->employee->name }}
    @else
        No Employee Assigned
    @endif
</span>

<span class="mb-1 d-block">
    @if(Auth::check() && Auth::user()->employee)
        {{ Auth::user()->employee->phone }}
    @else
        No Phone Assigned
    @endif
</span>




                            <p class="mb-0 d-flex align-items-center gap-2">
                            <i class="fas fa-envelope fs-4"></i>
                            <span class="mb-1 d-block">
    @if(Auth::check() && Auth::user()->employee)
        {{ Auth::user()->employee->email }}
    @else
        No Employee Assigned
    @endif
</span>

                            </p>
                          </div>
                        </div>
                        <div class="message-body">
                         
                          <a href="{{ route('logout') }}" class="py-8 px-7 d-flex align-items-center border-0 bg-transparent text-primary ms-auto" tabindex="0" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
    <i class="fas fa-power-off fs-6"></i>
    </span>
</a>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

                         
                        </div>
                        
                      </div>
                    </div>
                  </li>
                 
                </ul>
              </div>
            </div>
          </nav>
         
          <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
            <nav class="sidebar-nav scroll-sidebar">
              <div class="offcanvas-header justify-content-between">
                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/favicon.ico" alt="modernize-img" class="img-fluid" />
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              
            </nav>
          </div>
        </div>
        <div class="app-header with-horizontal">
          <nav class="navbar navbar-expand-xl container-fluid p-0">
           
           
           
            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="p-2">
              <i class="fas fa-ellipsis-h fs-7"></i>

              </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-align-justify fs-7"></i>

                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                 
                   
          </nav>
        </div>
<script>





function updateUnreadCount() {
   
    fetch('/notifications/unread-count')
        .then(response => response.json())
        .then(data => {
            if (data.unreadCount >= 0) {
               
                const notificationCountElement = document.querySelector('.notification');
                if (notificationCountElement) {
                    if (data.unreadCount > 0) {
                        notificationCountElement.innerText = data.unreadCount;
                    } else {
                        notificationCountElement.style.display = 'none';
                    }
                }
            }
        })
        .catch(error => console.error('Error:', error));
}



       function confirmDelete(notificationId) {
  
    const confirmAction = confirm("Are you sure you want to delete this notification?");
    if (confirmAction) {
       
        const form = document.getElementById(`delete-form-${notificationId}`);
        const button = document.getElementById(`delete-button-${notificationId}`);
        button.click(); 
    }
}

</script>


      </header>
  
        