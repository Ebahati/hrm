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
                <!-- start Employee Timing -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Award</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="POST" action="{{ route('manageAward') }}">
                        @csrf
                        <div class="card-body">
                            <!-- Employee Name -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="employeeName" name="employee_id" required>
                                            <option selected disabled>Select Employee</option>
                                            <option value="1">SuperAdmin</option>
                                            <option value="2">SubAdmin</option>
                                            <option value="3">Employee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Award Category -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="awardCategory" class="col-3 text-end col-form-label">Award Category</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="awardCategory" name="award_category" required>
                                            <option selected disabled>Select Award Category</option>
                                            <option value="1">Employee of the Month</option>
                                            <option value="2">Best Team Player</option>
                                            <option value="3">Outstanding Performance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Gift Item -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="giftItem" class="col-3 text-end col-form-label">Gift Item</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="giftItem" name="gift_item" placeholder="Enter Gift Item" required />
                                    </div>
                                </div>
                            </div>
                            <!-- Date -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="awardDate" class="col-3 text-end col-form-label">Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="awardDate" name="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required />
                                    </div>
                                </div>
                            </div>
                            <!-- Publication Status -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="publicationStatus" class="col-3 text-end col-form-label">Publication Status</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="publicationStatus" name="publication_status" required>
                                            <option selected disabled>Select Status</option>
                                            <option value="published">Published</option>
                                            <option value="unpublished">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="description" class="col-3 text-end col-form-label">Description</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description" required></textarea>
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
                <!-- end Employee Timing -->
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@endsection
