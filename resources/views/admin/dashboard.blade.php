@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')

      

      <div class="body-wrapper">
        <div class="container-fluid">
          <!--  Owl carousel -->
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
                    <h5 class="fw-semibold text-danger mb-0">696</h5>
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
              <!-- files -->
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


              <!-- Employees -->
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
    <canvas id="employees" width="400" height="200"></canvas> <!-- Graph canvas -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const totalEmployeesLastYear = {{ $totalEmployeesLastYear }};
    const totalEmployees = {{ $totalEmployees }};

    const ctx = document.getElementById('employees').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // Line type for spline chart
        data: {
            labels: ['Last Year', 'This Year'],
            datasets: [{
                label: 'Employees',
                data: [totalEmployeesLastYear, totalEmployees],
                backgroundColor: '#00BFFF', // Adjust this for fill color
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: true, // Fill the area under the curve
                tension: 0, // Controls the curvature of the line for a spline effect
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

            </div>
            
            
              
           
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Awards</h4>
                  <p class="card-subtitle">Totals Awards</p>
                  <div id="stats" class="my-4"></div>
                  <div class="position-relative">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-primary-subtle rounded me-6 d-flex align-items-center justify-content-center">
                        <i class="fas fa-newspaper fs-4"></i>

                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Top Sales</h6>
                          <p class="fs-3 mb-0">Johnathan Doe</p>
                        </div>
                      </div>
                      <div class="bg-primary-subtle badge">
                        <p class="fs-3 text-primary fw-semibold mb-0">+68</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <div class="d-flex">
                        <div class="p-6 bg-success-subtle rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-success fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">Best Seller</h6>
                          <p class="fs-3 mb-0">MaterialPro Admin</p>
                        </div>
                      </div>
                      <div class="bg-success-subtle badge">
                        <p class="fs-3 text-success fw-semibold mb-0">+68</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="d-flex">
                        <div class="p-6 bg-danger-subtle rounded me-6 d-flex align-items-center justify-content-center">
                          <i class="ti ti-grid-dots text-danger fs-6"></i>
                        </div>
                        <div>
                          <h6 class="mb-1 fs-4 fw-semibold">
                            Most Commented
                          </h6>
                          <p class="fs-3 mb-0">Ample Admin</p>
                        </div>
                      </div>
                      <div class="bg-danger-subtle badge">
                        <p class="fs-3 text-danger fw-semibold mb-0">+68</p>
                      </div>
                    </div>
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
                          <th scope="col">Status</th>
                          <th scope="col">Month</th>
                        </tr>
                      </thead>
                      <tbody class="border-top">
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-3.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Web Designer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Elite Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-primary-subtle text-primary">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$3.9K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-5.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">John Deo</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Web Developer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Flexy Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-warning-subtle text-warning">Medium</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$24.5K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-6.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
                              </div>
                              
                              <div>
                                <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Project Manager
                                </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Xtreme Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1 w-85 bg-success-subtle text-success">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$4.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-0 ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-8.jpg" class="rounded-circle" width="40" height="40" alt="modernize-img" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                <p class="fs-2 mb-0 text-muted">
                                  Content Writer
                                </p>
                              </div>
                            </div>
                          </td>
                          <td class="border-0">
                            <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                          </td>
                          <td class="border-0">
                            <span class="badge fw-semibold py-1 w-85 bg-danger-subtle text-danger">High</span>
                          </td>
                          <td class="border-0">
                            <p class="fs-3 text-dark mb-0">$9.3K</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
      <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if a previous chart exists and destroy it
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
                categories: @json($dates), // Dates in 'MM/DD' format
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
                strokeDashArray: 4, // Dotted gridlines
                position: 'back',
            },
            colors: ['#1E90FF', '#FF6347'], // Custom colors
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false
            },
        };

        // Store the new chart instance in a global variable
        window.chart = new ApexCharts(document.querySelector("#chart"), options);
        window.chart.render();
    });
</script>


      @endsection