@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Header Card -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">New Notice</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Create Notice</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="logo" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Post a New Notice</h4>
                    </div>

                    
                        <form action="{{ route('storeNotice') }}" method="POST">
                        @csrf
                        <!-- Notice Title -->
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="notice_title" class="col-3 text-end col-form-label">Notice Title</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="notice_title" name="notice_title" placeholder="Enter Notice Title" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Notice Content -->
                            <div class="form-group mb-0 mt-3">
                                <div class="row align-items-center">
                                    <label for="notice_content" class="col-3 text-end col-form-label">Notice Content</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <textarea class="form-control" id="notice_content" name="notice_content" rows="5" placeholder="Enter Notice Content" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Publish Date -->
                            <div class="form-group mb-0 mt-3">
                                <div class="row align-items-center">
                                    <label for="publish_date" class="col-3 text-end col-form-label">Publish Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ date('Y-m-d') }}" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="form-group mb-0 mt-3">
                                <div class="row align-items-center">
                                    <label for="status" class="col-3 text-end col-form-label">Status</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="active" selected>Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Post Notice</button>
                                <button type="reset" class="btn bg-danger-subtle text-danger ms-6">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@endsection
