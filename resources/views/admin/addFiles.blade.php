@extends('admin.layouts.app') 

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Files</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Upload Files</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Enter Folder Details</h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <input type="text" name="folder_name" class="form-control" placeholder="Folder Name" required />
    </div>
    <div class="mb-3">
        <textarea name="details" class="form-control" rows="3" placeholder="Folder Details"></textarea>
    </div>

    <div class="email-repeater mb-3">
        <div data-repeater-list="repeater-group">
            <div data-repeater-item class="row mb-3">
                <div class="col-md-10">
                    <input type="file" name="files[]" class="form-control" required />
                </div>
                <div class="col-md-2 mt-3 mt-md-0">
                    <button data-repeater-delete class="btn btn-danger" type="button">
                        <i class="fas fa-times fs-5 d-flex"></i>
                    </button>
                </div>
            </div>
        </div>
       
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Upload  <i class="fas fa-plus ms-1 fs-5"></i></button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>

       
    </div>
</div>

@endsection
