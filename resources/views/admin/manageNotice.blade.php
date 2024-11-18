@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">

        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Notice</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Manage Notices</li>
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
                        <a href="{{ route('addNotice') }}" class="btn btn-primary">New Notice</a>
                    </div>

                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>Notice Title</th>
                                    <th>Notice Content</th>
                                    <th>Publish Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notices as $notice)
                                    <tr id="notice-row-{{ $notice->id }}">
                                        <td>{{ $notice->title }}</td>
                                        <td>{{ Str::limit($notice->content, 50) }}</td>
                                        <td>{{ $notice->publish_date }}</td>
                                        <td>
                                            <span class="badge {{ $notice->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($notice->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="{{ route('viewNotice', $notice->id) }}" class="btn bg-info-subtle text-info">Read More</a>
                                                <button 
                                                    class="btn bg-danger-subtle text-danger deleteNoticeButton" 
                                                    data-id="{{ $notice->id }}" 
                                                    data-url="{{ route('deleteNotice', $notice->id) }}">
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Notice Title</th>
                                    <th>Notice Content</th>
                                    <th>Publish Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function() {
        $(document).on('click', '.deleteNoticeButton', function(e) {
            e.preventDefault();

            var noticeId = $(this).data('id');
            var url = $(this).data('url');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === true) {
                        $('#notice-row-' + noticeId).remove();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error('An error occurred while deleting the notice.');
                }
            });
        });
    });
</script>

@endsection
