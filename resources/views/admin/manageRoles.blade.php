@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')

      

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Configuration</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item" aria-current="page">Manage  Roles</li>
                    </ol>
                  </nav>
                </div>
                <div class="col-3">
                  <div class="text-center mb-n5">
                  <img src="{{ asset('assets/logo.png') }}"  width="100" height="100" class="img-fluid mb-n4" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="datatables">
            <!-- start File export -->
            <div class="card">
              <div class="card-body">
                <div class="mb-2">
                <a href="{{ route('addRoles') }}"  class="btn btn-primary">Add</a>
                </div>
                
                <div class="table-responsive">
                  <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                    <thead>
                      <!-- start row -->
                      <tr>
                        <th>ID</th>
                        <th>	Name</th>
                        <th>
                           Description</th>
                        <th>Date</th>
                        
                        <th>Action</th>
                      </tr>
                      <!-- end row -->
                    </thead>
                    <tbody>
                      <!-- start row -->
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                      
                        <td>2011/04/25</td>
                        <td>
                        <div class="d-flex align-items-center gap-3">
                          
                        
    <button type="submit" class="btn bg-danger-subtle text-danger">Delete</button>
</form>

</td>
                      </div>
                      </tr>
                      <!-- end row -->
                     
                      
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- end File export -->
            
            
           
           
           
           
          </div>
        </div>
      </div>
    </div>
    @endsection