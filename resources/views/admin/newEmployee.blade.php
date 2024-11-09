@extends('admin.layouts.app')

@section('title', 'Add Employee')

@section('content')


<div class="body-wrapper">
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>{{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h2>

    <form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('POST') {{-- For Update --}}
        @endif

       

            <!-- Header Card -->
            <div class="card bg-info-subtle shadow-none mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-3">Employees</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Employee</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3 text-center">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-3">Enter team member details</h4>

                            <div class="mb-3">
    <label for="employeeID" class="form-label">Employee ID</label>
    
    <input type="text" class="form-control" id="employeeID" name="employee_id" 
       value="{{ isset($employee) ? $employee->employee_id : '' }}" 
       {{ isset($employee) ? 'readonly' : '' }}>

</div>


                            <div class="mb-3">
                                <label for="employeeName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="employeeName" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" required>
                                    <span class="input-group-text">@gmail.com</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone No</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="0712 150 451" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Marital Status</label>
                                <select class="form-select" name="marital_status">
                                    <option value="">Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="birthDate" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="birthDate" name="birth_date" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">ID Type</label>
                                <select class="form-select" name="id_type" required>
                                    <option value="">Select</option>
                                    <option value="NID">NID</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driving License">Driving License</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="idNumber" class="form-label">ID Number</label>
                                <input type="text" class="form-control" id="idNumber" name="id_number" placeholder="ID number" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            </div>

                            <div class="mb-3">
                                <label for="permanentAddress" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" id="permanentAddress" name="permanent_address" placeholder="Permanent Address" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <select class="form-select" name="department" required>
                    <option value="">Select</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                            </div>

                            <div class="mb-3" {{ isset($employee) ? 'hidden' : '' }}>
    <label class="form-label" {{ isset($employee) ? 'hidden' : '' }}>Role</label>
    <select class="form-select" name="role" required {{ isset($employee) ? 'hidden' : '' }}>
        <option value="">Select</option>
        <option value="SuperAdmin" {{ isset($employee) && $employee->role == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
        <option value="SubAdmin" {{ isset($employee) && $employee->role == 'SubAdmin' ? 'selected' : '' }}>SubAdmin</option>
        <option value="Employee" {{ isset($employee) && $employee->role == 'Employee' ? 'selected' : '' }}>Employee</option>
    </select>
</div>



                            <div class="mb-3">
                                <label for="nhif" class="form-label">NHIF</label>
                                <input type="text" class="form-control" id="nhif" name="nhif" placeholder="NHIF" required>
                            </div>

                            <div class="mb-3">
                                <label for="nssf" class="form-label">NSSF</label>
                                <input type="text" class="form-control" id="nssf" name="nssf" placeholder="NSSF" maxlength="9" pattern="\d{1,9}" title="Please enter up to 9 digits only" required>
                            </div>

                            <div class="mb-3">
                                <label for="bankName" class="form-label">Bank Name</label>
                                <input type="text" class="form-control" id="bankName" name="bank_name" placeholder="Bank Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="branchName" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="branch_name" placeholder="Branch Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="branchCode" class="form-label">Bank Branch Code</label>
                                <input type="text" class="form-control" id="branchCode" name="branch_code" placeholder="Branch Code" maxlength="5" pattern="\d{1,5}" required>
                            </div>

                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Bank Account Number</label>
                                <input type="text" class="form-control" id="accountNumber" name="account_number" placeholder="Account Number" required>
                            </div>
                            <div class="mb-3">
    <label class="form-label">Designation</label>
    <select class="form-select" name="designation_id" required> 
        <option value="">Select</option>
        @foreach ($designations as $designation)
            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
        @endforeach
    </select>
</div>
           

                            <div class="mb-3">
                                <label for="workPermit" class="form-label">Work Permit</label>
                                <input type="text" class="form-control" id="workPermit" name="work_permit" placeholder="Work Permit" required>
                            </div>

                            <div class="mb-3">
                                <label for="joiningDate" class="form-label">Joining Date</label>
                                <input type="date" class="form-control" id="joiningDate" name="joining_date" min="{{ now()->toDateString() }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="accordion mb-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#academic">
                            Academic Qualifications
                        </button>
                    </h2>
                    <div id="academic" class="accordion-collapse collapse">
                        <textarea class="form-control mt-3" rows="2" placeholder="Enter Academic Qualifications"></textarea>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#professional">
                            Professional Qualifications
                        </button>
                    </h2>
                    <div id="professional" class="accordion-collapse collapse">
                        <textarea class="form-control mt-3" rows="2" placeholder="Enter Professional Qualifications"></textarea>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#experience">
                            Experience
                        </button>
                    </h2>
                    <div id="experience" class="accordion-collapse collapse">
       

              
                    <textarea class="form-control mt-3" rows="2" placeholder="Enter Experience"></textarea>
                </div>
            </div>
        </div>

       
        <div class="d-flex justify-content-end gap-3">
        <button type="submit" class="btn btn-primary">
            {{ isset($employee) ? 'Update Employee' : 'Add Employee' }}
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
    </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.querySelector('select[name="role"]');
        const employeeIDInput = document.getElementById('employeeID');
        const isEditing = employeeIDInput.hasAttribute('readonly'); 

       
        function generateEmployeeID(role) {
            let prefix;
            switch(role) {
                case 'Employee':
                    prefix = 'EMP-';
                    break;
                case 'SubAdmin':
                    prefix = 'SBA-';
                    break;
                case 'Admin':
                    prefix = 'A-';
                    break;
                default:
                    prefix = '';
            }
        
            const randomChars = Math.random().toString(36).substr(2, 5).toUpperCase();
            return prefix + randomChars;
        }

      
        if (isEditing) {
            employeeIDInput.value = employeeIDInput.value;
        } else {
          
            employeeIDInput.value = generateEmployeeID(roleSelect.value);
            
            
            roleSelect.addEventListener('change', function() {
                const selectedRole = this.value;
                employeeIDInput.value = generateEmployeeID(selectedRole);
            });
        }
    });
</script>


@endsection
