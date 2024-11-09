@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Departments</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item" aria-current="page">New Department</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-3">
                  <div class="text-center mb-n5">
                    <img src="{{ asset('assets/logo.png') }}" width="100" height="100"  alt="modernize-img" class="img-fluid mb-n4" />
                  </div>
                </div>
              </div>
            </div>
          </div>
    
          <div class="row">
                      
            <div class="col-12">
        
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add</h4>
                  
                </div>
                 
                   @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

          
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

           
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal r-separator" method="POST" action="{{ route('departments.store') }}">
    @csrf 

    

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card-body">
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="inputText11" class="col-3 text-end col-form-label">Publication status</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <select class="form-select" name="publication_status" required>
                        <option value="0">Unpublished</option>
                        <option value="1">Published</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="inputText12" class="col-3 text-end col-form-label">Department</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <input type="text" class="form-control" id="inputText12" name="department" placeholder="Department Name" required />
                </div>
            </div>
        </div>
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="inputText14" class="col-3 text-end col-form-label">Description</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <input type="text" class="form-control" id="inputText14" name="description" placeholder="Description Here" />
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 border-top">
        <div class="form-group mb-0 text-end">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn bg-danger-subtle text-danger ms-6" onclick="window.history.back();">
                Cancel
            </button>
        </div>
    </div>
</form>

              </div>
            
            </div>
            <div class="col-12">
             
            </div>
          </div>
    
        </div>
      </div>
      <script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if ($errors->any())
        toastr.error("{{ $errors->first() }}");
    @endif
</script>

      @endsection