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
            <!-- Start File Export -->
            <div class="card">
                <div class="card-body">
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
    <tr>
        <td>{{ $notice->title }}</td>
        <td>{{ $notice->content }}</td>
        <td>{{ $notice->publish_date }}</td>
        <td>
            <span class="badge {{ $notice->status === 'active' ? 'bg-success' : 'bg-secondary' }}">
                {{ ucfirst($notice->status) }}
            </span>
        </td>
        <td>
    <div class="d-flex align-items-center gap-3">
        <a href="{{ route('viewNotice', $notice->id) }}" class="btn bg-info-subtle text-info">Read More</a>

        <form action="{{ route('storeNotice') }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-danger-subtle text-danger">Delete</button>
        </form>
        <button class="btn bg-primary-subtle text-primary">Download</button>
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
            <!-- End File Export -->
        </div>
    </div>
</div>

@endsection
