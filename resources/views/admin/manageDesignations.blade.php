@extends('admin.layouts.app')

@section('title', 'Manage Designations')

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
                                <li class="breadcrumb-item" aria-current="page">Manage Designations</li>
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
                    <div class="mb-2">
                        <a href="{{ route('addDesignation') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($designations as $designation)
                                    <tr id="designation-row-{{ $designation->id }}">
                                        <td>{{ $designation->id }}</td>
                                        <td>{{ $designation->name }}</td>
                                        <td>{{ optional($designation->department)->name ?? 'N/A' }}</td>
                                        <td>{{ $designation->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <button class="btn bg-danger-subtle text-danger deleteDesignationButton" 
                                                        data-id="{{ $designation->id }}" 
                                                        data-url="{{ route('designations.destroy', $designation->id) }}">
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
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteDesignationButton', function(e) {
            e.preventDefault();

            var designationId = $(this).data('id');
            var url = $(this).data('url');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === true) {
                      
                        $('#designation-row-' + designationId).remove();
                        toastr.success(response.message); 
                    } else {
                        toastr.error(response.message); 
                    }
                },
                error: function(xhr) {
                    toastr.error('An error occurred while deleting the designation.'); 
                }
            });
        });
    });
</script>



@endsection
