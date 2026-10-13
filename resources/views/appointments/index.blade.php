@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h1>Appointments</h1>
        <p>Manage customer appointments at Unique — Center for All.</p>
    </div>

    <a href="{{ route('admin.appointments.create') }}" class="btn-primary">
        + New Appointment
    </a>
</div>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="appointments-card">

    @if($appointments->count())

        <div class="table-wrapper">
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>
                                <strong>{{ $appointment->customer_name }}</strong>
                                <small>{{ $appointment->customer_email }}</small>
                            </td>

                            <td>
                                {{ $appointment->service->name ?? 'Service removed' }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                            </td>

                            <td>
                                {{ $appointment->customer_phone }}
                            </td>

                            <td>
                                <span class="status {{ $appointment->status }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else

        <div class="empty-state">
            <div class="empty-icon">📅</div>
            <h3>No appointments yet</h3>
            <p>Customer appointments will appear here once they are booked.</p>

            <a href="{{ route('admin.appointments.create') }}" class="btn-primary">
                Create First Appointment
            </a>
        </div>

    @endif

</div>

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .page-header h1 {
        margin: 0 0 6px;
        font-size: 32px;
    }

    .page-header p {
        margin: 0;
        color: #777;
    }

    .btn-primary {
        display: inline-block;
        padding: 12px 20px;
        background: #e91e63;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: 600;
        border: none;
    }

    .alert-success {
        background: #e8f8ee;
        color: #16803c;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .appointments-card {
        background: white;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 30px rgba(0,0,0,.06);
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .appointments-table {
        width: 100%;
        border-collapse: collapse;
    }

    .appointments-table th,
    .appointments-table td {
        padding: 16px 14px;
        text-align: left;
        border-bottom: 1px solid #eee;
        white-space: nowrap;
    }

    .appointments-table th {
        color: #777;
        font-size: 13px;
        text-transform: uppercase;
    }

    .appointments-table td strong {
        display: block;
    }

    .appointments-table td small {
        display: block;
        color: #999;
        margin-top: 4px;
    }

    .status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status.pending {
        background: #fff3cd;
        color: #856404;
    }

    .status.confirmed {
        background: #dff6e7;
        color: #18733b;
    }

    .status.completed {
        background: #e5e7eb;
        color: #374151;
    }

    .status.cancelled {
        background: #fde2e2;
        color: #b42318;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 45px;
        margin-bottom: 15px;
    }

    .empty-state h3 {
        margin-bottom: 8px;
    }

    .empty-state p {
        color: #777;
        margin-bottom: 22px;
    }

    @media (max-width: 700px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .page-header h1 {
            font-size: 26px;
        }
    }
</style>

@endsection