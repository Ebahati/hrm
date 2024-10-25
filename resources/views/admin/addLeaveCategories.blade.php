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
                      <li class="breadcrumb-item" aria-current="page">Leave Categories </li>
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
          <!-- Row -->
          <div class="row">
            
            
            <div class="col-12">
              <!-- start Employee Timing -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New</h4>
                  
                </div>
                <form class="form-horizontal r-separator">
                  <div class="card-body">
                    <div class="form-group mb-0">
                      <div class="row align-items-center">
                        <label for="inputText11" class="col-3 text-end  col-form-label">Publication status
                        </label>
                        <div class="col-9 border-start pb-2 pt-2">
                        <select class="form-select" aria-label="Default select example">
                          <option selected="">Unpublished</option>
                          <option value="1">Published</option>
                          
                        </select>
                        </div>
                      </div>
                    </div>
                                       
                    <div class="form-group mb-0">
                      <div class="row align-items-center">
                        <label for="inputText12" class="col-3 text-end  col-form-label">Category name
                         </label>
                        <div class="col-9 border-start pb-2 pt-2">
                          <input type="text" class="form-control" id="inputText12" placeholder="Project Name Here" />
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="form-group mb-0">
                      <div class="row align-items-center">
                        <label for="inputText14" class="col-3 text-end  col-form-label">Description</label>
                        <div class="col-9 border-start pb-2 pt-2">
                          <input type="text" class="form-control" id="inputText14" placeholder="Reason Here" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div class="form-group mb-0 text-end">
                    <a href="{{ route('manageLeaveCategories') }}" class="btn btn-primary">Add</a>
                   
                    
                      <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                        Cancel
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Employee Timing -->
            </div>
            <div class="col-12">
              <!-- start Event Registration -->
              
              <!-- end Event Registration -->
            </div>
          </div>
          <!-- End Row -->
        </div>
      </div>
      @endsection