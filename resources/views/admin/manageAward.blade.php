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
                                <li class="breadcrumb-item" aria-current="page">Manage Awards</li>
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
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="datatables">
           
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <h4 class="card-title mb-0">List</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Award Category</th>
                                    <th>Gift Item</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($awards as $award)
                                <tr>
                                    <td>{{ $award->employee_id }}</td>
                                    <td>{{ $award->employee->name }}</td>
                                    <td>{{ $award->award_category }}</td>
                                    <td>{{ $award->gift_item }}</td>
                                    <td>{{ $award->date }}</td>
                                    <td>{{ $award->description }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <form action="{{ route('deleteAward', $award->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this award?');">
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
    </div>
</div>

@endsection
