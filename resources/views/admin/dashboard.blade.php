@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')
<div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true" id="greetingToast">
    <div class="toast-body hstack align-items-start gap-6">
        <i class="fas fa-check-circle fs-6"></i>
        <span id="loginSuccessMessage">Login successful! Welcome,</span>
        <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>

      <div class="body-wrapper">
        <div class="container-fluid">
     
          <div class="owl-carousel counter-carousel owl-theme">
          <div class="item">
    <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
        <div class="card-body">
            <div class="text-center">
                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                <p class="fw-semibold fs-3 text-primary mb-1">
                    Employees
                </p>
                <h5 class="fw-semibold text-primary mb-0">{{ $totalEmployees }}</h5>
            </div>
        </div>
    </div>
</div>

<div class="item">
    <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
        <div class="card-body">
            <div class="text-center">
                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-briefcase.svg" 
                     width="50" height="50" class="mb-3" alt="modernize-img" />
                <p class="fw-semibold fs-3 text-warning mb-1">Files</p>
                <h5 class="fw-semibold text-warning mb-0">{{ $totalFiles }}</h5> <!-- Display the count here -->
            </div>
        </div>
    </div>
</div>

            <div class="item">
    <div class="card border-0 zoom-in bg-info-subtle shadow-none">
        <div class="card-body">
            <div class="text-center">
                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                <p class="fw-semibold fs-3 text-info mb-1">Holidays</p>
                <h5 class="fw-semibold text-info mb-0">{{ $publishedCount }}</h5>
            </div>
        </div>
    </div>
</div>

            <div class="item">
              <div class="card border-0 zoom-in bg-danger-subtle shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-favorites.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                    <p class="fw-semibold fs-3 text-danger mb-1">Awards</p>
                    <h5 class="fw-semibold text-danger mb-0">{{ $totalAwards }}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
    <div class="card border-0 zoom-in bg-success-subtle shadow-none">
        <div class="card-body">
            <div class="text-center">
                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-speech-bubble.svg"
                     width="50" height="50" class="mb-3" alt="modernize-img" />
                <p class="fw-semibold fs-3 text-success mb-1">Notices</p>
                <h5 class="fw-semibold text-success mb-0">{{ $totalActiveNotices }}</h5> 
                
            </div>
        </div>
    </div>
</div>

            <div class="item">
              <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                  <div class="text-center">
                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                    <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
                    <h5 class="fw-semibold text-info mb-0">59</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                      <h4 class="card-title fw-semibold"> Updates</h4>
                      <p class="card-subtitle mb-0">Latest Info</p>
                    </div>
                    <select class="form-select w-auto">
                      <option value="1">March 2024</option>
                      <option value="2">April 2024</option>
                      <option value="3">May 2024</option>
                      <option value="4">June 2024</option>
                    </select>
                  </div>
                  <div class="row align-items-center">
                    <div class="col-md-8">
                    <div id="chart" class="mx-n6"></div>
                   
                    </div>
                    <div class="col-md-4">
                      <div class="hstack mb-4 pb-1">
                        <div class="p-8 bg-primary-subtle rounded-1 me-3 d-flex align-items-center justify-content-center">
                        <i class="fas fa-newspaper fs-4"></i>

                        </div>
                        <div>
                          <p class="fw-semibold fs-3 text-info mb-1">Total Published</p>
                <h5 class="fw-semibold text-info mb-0">{{ $totalPublished }}</h5>
                
                        </div>
                      </div>
                      <div>
                        <div class="d-flex align-items-baseline mb-4">
                          <span class="round-8 text-bg-primary rounded-circle me-6"></span>
                          <div>
                          <p class="fs-3 mb-1">Notices this month</p>
                          <h6 class="fs-5 fw-semibold mb-0">{{ $noticesThisMonth }}</h6>
                          </div>
                        </div>
                        <div class="d-flex align-items-baseline mb-4 pb-1">
                          <span class="round-8 text-bg-secondary rounded-circle me-6"></span>
                          <div>
                          <div>
                    <p class="fs-3 mb-1">Holidays this month</p>
                    <h6 class="fs-5 fw-semibold mb-0">{{ $publishedCount }}</h6>
                </div>
                          </div>
                        </div>
                        <div>
                        <a href="{{ route('viewNotice', $latestNotice->id) }}" class="btn btn-primary w-100">
    View Full Report
</a>

                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="mb-3 mb-sm-0">
    <h4 class="card-title fw-semibold">Updates</h4>
    <p class="card-subtitle mb-0">
        @if($latestNotice)
            <strong>{{ $latestNotice->title }}:</strong> 
            {{ Str::limit($latestNotice->content, 100) }}
            <a href="{{ route('viewNotice', $latestNotice->id) }}" class="btn btn-primary w-100">Read more</a>
        @else
            No notices available.
        @endif
    </p>
</div>



                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch flex-column">
         
              <div class="card w-100">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-8">
                <h4 class="card-title mb-9 fw-semibold">Files</h4>
                <h4 class="fw-semibold mb-3">{{ $filesThisYear }}</h4>
                <div class="d-flex align-items-center mb-3">
                    <span class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-up fs-6 text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">+{{ $newFilesAdded }}</p>
        <p class="fs-3 mb-0">since last year</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <span class="round-8 text-bg-primary rounded-circle me-2 d-inline-block"></span>
                        <span class="fs-2">{{ now()->year }}</span>
                    </div>
                    <div>
                        <span class="round-8 bg-primary-subtle rounded-circle me-2 d-inline-block"></span>
                        <span class="fs-2">{{ now()->year - 1 }}</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div id="breakup"></div>
                </div>
            </div>
        </div>
    </div>
</div>


              <!-- rem check all graphs -->
              <div class="card w-100">
    <div class="card-body">
        <div class="row align-items-start">
            <div class="col-8">
                <h4 class="card-title mb-9 fw-semibold">Employees</h4>
                <h4 class="fw-semibold mb-3">{{ $totalEmployees }}</h4>
                <div class="d-flex align-items-center pb-1">
                    <span class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-up fs-6 text-success"></i>
                    </span>
                    <p class="text-dark me-1 fs-3 mb-0">{{ $increase > 0 ? '+' : '' }}{{ number_format($increase) }} ({{ number_format($percentageIncrease, 2) }}%)</p>
                    <p class="fs-3 mb-0">since last year</p>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end">
                    <div class="text-white text-bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <canvas id="employees" width="400" height="200"></canvas> 
   

</div>
</div>

          
           
            <div class="col-lg-4 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body">
            <h4 class="card-title fw-semibold">Awards</h4>
            <p class="card-subtitle">Total Awards</p>
            <canvas id="awardChart"></canvas> 
            <div class="my-4"></div>
            <div class="position-relative">

                @foreach ($awardCounts as $awardCount)
                    <div class="d-flex align-items-center justify-content-between mb-7">
                        <div class="d-flex">
                            <div class="p-6 bg-primary-subtle rounded me-6 d-flex align-items-center justify-content-center">
                                <i class="fas fa-award fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fs-4 fw-semibold">{{ $awardCount->award_category }}</h6>
                                <p class="fs-3 mb-0">Total: {{ $awardCount->total }}</p>
                            </div>
                        </div>
                        <div class="bg-primary-subtle badge">
                            <p class="fs-3 text-primary fw-semibold mb-0">{{ $awardCount->total }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

            <div class="col-lg-8 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                <div class="mb-3 mb-sm-0">
                    <h4 class="card-title fw-semibold">Top Performers</h4>
                    <p class="card-subtitle">Best Employees</p>
                </div>
                <div>
                    <select class="form-select">
                        <option value="1">March 2024</option>
                        <option value="2">April 2024</option>
                        <option value="3">May 2024</option>
                        <option value="4">June 2024</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-muted fw-semibold">
                            <th scope="col" class="ps-0">Employee</th>
                            <th scope="col">Department</th>
                            <th scope="col">Award Category</th> 
                            <th scope="col">Month</th>
                        </tr>
                    </thead>
                    <tbody class="border-top">
    @foreach ($topPerformers as $performer)
    <tr>
        <td class="ps-0">
            <div class="d-flex align-items-center">
                <div class="me-2 pe-1">
                <img src="{{ $award->employee->profile_picture_url ?? asset('assets/logo.png') }}" class="rounded-circle" width="40" height="40" alt="Profile Picture" />

                </div>
                <div>
                    <h6 class="fw-semibold mb-1">{{ $performer['name'] }}</h6>
                    <p class="fs-2 mb-0 text-muted">{{ $performer['role'] }}</p>
                </div>
            </div>
        </td>
        <td>
            <p class="mb-0 fs-3">{{ $performer['department'] }}</p>
        </td>
        <td>
            <p class="mb-0 fs-3">{{ $performer['award_category'] }}</p>
        </td>
        <td>
            <p class="fs-3 text-dark mb-0">{{ $performer['month'] }}</p>
        </td>
    </tr>
    @endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>

          </div>
        </div>
      </div>
      <script src= "https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/apexcharts/dist/apexcharts.min.js">
      </script>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
       
        if (window.chart) {
            window.chart.destroy();
        }
      var options = {
            chart: {
                type: 'bar',
                height: 350,
            },
            series: [
                {
                    name: 'Notices',
                    data: @json($noticesCount)
                },
                {
                    name: 'Holidays',
                    data: @json($holidaysCount)
                }
            ],
            xaxis: {
                categories: @json($dates), 
                labels: {
                    rotate: -45,
                    style: {
                        fontSize: '12px',
                    }
                },
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: '12px',
                    },
                },
            },
            grid: {
                strokeDashArray: 4, 
                position: 'back',
            },
            colors: ['#1E90FF', '#FF6347'], 
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false
            },
        };

       
        window.chart = new ApexCharts(document.querySelector("#chart"), options);
        window.chart.render();
    });
</script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const totalEmployeesLastYear = {{ $totalEmployeesLastYear }};
    const totalEmployees = {{ $totalEmployees }};

    const ctx = document.getElementById('employees').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', 
        data: {
            labels: ['Last Year', 'This Year'],
            datasets: [{
                label: 'Employees',
                data: [totalEmployeesLastYear, totalEmployees],
                backgroundColor: '#00BFFF',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: true, 
                tension: 0, 
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
        
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   
const ctxAward = document.getElementById('awardChart').getContext('2d');
const awardChart = new Chart(ctxAward, {
    type: 'line', 
    data: {
        labels: {!! json_encode($awardCounts->pluck('award_category')) !!},
        datasets: [{
            label: 'Total Awards',
            data: {!! json_encode($awardCounts->pluck('total')) !!},
            backgroundColor: '#36A2EB', 
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>



      @endsection

 