@extends('admin.layouts.app')

@section('title', 'View Notice')

@section('content')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <h4 class="fw-semibold mb-8">Notice Details</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="{{ route('manageNotice') }}">Manage Notices</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">View Notice</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-bg-primary">
                <h5 class="mb-0 text-white">{{ $notice->title }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Content:</strong> {{ $notice->content }}</p>
                <p><strong>Publish Date:</strong> {{ $notice->publish_date }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ $notice->status == 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($notice->status) }}
                    </span>
                </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
