@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')


      

      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h4 class="fw-semibold mb-8">Expense</h4>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item" aria-current="page">Manage  Expenses</li>
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
                <a href="{{ route('addExpense') }}"  class="btn btn-primary">Add</a>
                </div>
                
                <div class="table-responsive">
                  <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                    <thead>
                      <!-- start row -->
                      <tr>
                        <th>ID</th>
                        <th>Created By</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Expense Purpose</th>
                        <th>Amount</th>
                        
                      </tr>
                      <!-- end row -->
                    </thead>
                    <tbody>
                      <!-- start row -->
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                      
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    
                        
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