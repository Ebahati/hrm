@extends('admin.layouts.app')

@section('title', 'Manage Bonuses')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Payroll</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Bonus</li>
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

                        <div class="mb-2">
                            <a href="{{ route('addBonus') }}" class="btn btn-primary">Add Bonus</a>
                        </div>

                        <div class="table-responsive">
                            <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Bonus Type</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bonuses as $bonus)
                                        <tr id="bonus-row-{{ $bonus->id }}">
                                            <td>{{ $bonus->employee ? $bonus->employee->name : 'N/A' }}</td>
                                            <td>{{ $bonus->employee && $bonus->employee->designation ? $bonus->employee->designation->name : 'No Designation' }}</td>
                                            <td>{{ $bonus->bonus_type }}</td>
                                            <td>{{ \Carbon\Carbon::parse($bonus->date)->format('F j, Y') }}</td>
                                            <td>Ksh.{{ number_format($bonus->amount, 2) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('editBonus', $bonus->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button class="btn bg-danger-subtle text-danger deleteBonusButton" 
                                                            data-id="{{ $bonus->id }}" 
                                                            data-url="{{ route('deleteBonus', $bonus->id) }}">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No bonuses available.</td>
                                        </tr>
                                    @endforelse
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
           
            $(document).on('click', '.deleteBonusButton', function(e) {
                e.preventDefault();

                var bonusId = $(this).data('id');
                var url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === true) {
                            $('#bonus-row-' + bonusId).remove();
                            toastr.success(response.message); 
                        } else {
                            toastr.error(response.message); 
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred while deleting the bonus.');
                    }
                });
            });
        });
    </script>

@endsection
