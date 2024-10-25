@extends('admin.layouts.app') 

@section('title', isset($holiday) ? 'Update Holiday' : 'Add Holiday')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Holidays and Events</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">{{ isset($holiday) ? 'Update Holiday' : 'Add Holiday' }}</li>
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
                <!-- start Add Holiday Form -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Holiday</h4>
                        <form action="{{ isset($holiday) ? route('updateHoliday', $holiday->id) : route('storeHoliday') }}" method="POST">
    @csrf
    @if(isset($holiday))
        @method('PUT') <!-- Use PUT method for updating -->
    @endif
                        <form class="form-horizontal r-separator" method="POST" action="{{ route('storeHoliday') }}">
                            @csrf 
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <label for="status" class="col-3 text-end col-form-label">Publication Status</label>
                                        <div class="col-9 border-start pb-2 pt-2">
                                            <select name="status" id="status" class="form-select" required>
                                            <option value="Published" {{ (isset($holiday) && $holiday->status == 'Published') ? 'selected' : '' }}>Published</option>
                                            <option value="Unpublished" {{ (isset($holiday) && $holiday->status == 'Unpublished') ? 'selected' : '' }}>Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <label for="event_name" class="col-3 text-end col-form-label">Event Name *</label>
                                        <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($holiday) ? $holiday->name : '') }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <label for="event_date" class="col-3 text-end col-form-label">Date *</label>
                                        <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', isset($holiday) ? $holiday->date : '') }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="row align-items-center">
                                        <label for="description" class="col-3 text-end col-form-label">Description</label>
                                        <div class="col-9 border-start pb-2 pt-2">
                                        <textarea class="form-control" id="description" name="description">{{ old('description', isset($holiday) ? $holiday->description : '') }}</textarea>   
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 border-top">
                                <div class="form-group mb-0 text-end">
                                    <a href="{{ route('manageHoliday') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary">{{ isset($holiday) ? 'Update Holiday' : 'Add Holiday' }}</button>
</form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end Add Holiday Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@endsection
