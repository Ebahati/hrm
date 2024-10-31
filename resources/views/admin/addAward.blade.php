@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Awards</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">New Award</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="modernize-img" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!-- Display Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- start Employee Timing -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Award</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="POST" action="{{ route('storeAward') }}">
                    @csrf
                        <div class="card-body">
                            <!-- Employee ID -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employeeId" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="employeeId" name="employee_id" required onchange="showEmployeeName()">
                                            <option selected disabled>Select Employee ID</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->employee_id }}">{{ $employee->employee_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="employeeName" placeholder="Employee Name" readonly />
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="awardCategory" class="col-3 text-end col-form-label">Award Category</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="awardCategory" name="award_category" required>
                                            <option selected disabled>Select Award Category</option>
                                            <option value="Employee of the Month">Employee of the Month</option>
                                            <option value="Best Team Player">Best Team Player</option>
                                            <option value="Outstanding Performance">Outstanding Performance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="giftItem" class="col-3 text-end col-form-label">Gift Item</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="giftItem" name="gift_item" placeholder="Enter Gift Item" required />
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="awardDate" class="col-3 text-end col-form-label">Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="awardDate" name="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required />
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="description" class="col-3 text-end col-form-label">Description</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Add Award</button>
                                <a href="{{ route('manageAward') }}" class="btn bg-danger-subtle text-danger ms-6">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

<script>
    const employees = @json($employees); 
    
    function showEmployeeName() {
        const selectedId = document.getElementById('employeeId').value;
        const employee = employees.find(emp => emp.employee_id === selectedId);
        document.getElementById('employeeName').value = employee ? employee.name : '';
    }
</script>

@endsection
