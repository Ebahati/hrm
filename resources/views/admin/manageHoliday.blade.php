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
           
            <div class="card">
                <div class="card-body">
                     
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
            <tr id="holiday-row-{{ $holiday->id }}">
                <td>{{ $holiday->id }}</td>
                <td>{{ $holiday->name }}</td>
                <td>{{ $holiday->description }}</td>
                <td>{{ $holiday->date }}</td>
                <td>{{ $holiday->status }}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('editHoliday', $holiday->id) }}" class="btn btn-warning">Edit</a>
                        <button class="btn bg-danger-subtle text-danger deleteHolidayButton" 
                                data-id="{{ $holiday->id }}" 
                                data-url="{{ route('deleteHoliday', $holiday->id) }}">
                            Delete
                        </button>
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
<script>
    $(document).ready(function() {
     
        $(document).on('click', '.deleteHolidayButton', function(e) {
            e.preventDefault();

            var holidayId = $(this).data('id');
            var url = $(this).data('url');

           
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === true) {
                       
                        $('#holiday-row-' + holidayId).remove();
                        toastr.success(response.message); 
                    } else {
                        toastr.error(response.message); 
                    }
                },
                error: function(xhr) {
                    toastr.error('An error occurred while deleting the holiday.');
                }
            });
        });
    });
</script>


@endsection