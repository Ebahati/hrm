@extends('admin.layouts.app') 

@section('title', 'Manage Holidays')

@section('content')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Holidays and Events </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Manage Holidays</li>
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

        <div class="datatables">
            <!-- start File export -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                    <a href="{{ route('addHoliday') }}" class="btn btn-primary">Add</a>

                    </div>
                    
                    <div class="table-responsive">
                        
    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Details</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
            <tr>
                <td>{{ $holiday->id }}</td>
                <td>{{ $holiday->name }}</td>
                <td>{{ $holiday->description }}</td>
               
                <td>{{ $holiday->date }}</td>
                <td>{{ $holiday->status }}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('editHoliday', $holiday->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('deleteHoliday', $holiday->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this holiday?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-danger-subtle text-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>
</div>
@endsection