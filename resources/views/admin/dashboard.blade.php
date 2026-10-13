@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="topbar">
    <button type="button" class="admin-menu-toggle" onclick="openAdminSidebar()">
        ☰
    </button>

    <div>
        <h2>Admin Dashboard</h2>
        <p>Welcome back to UNIQUE — Center for All. Here's what's happening at your salon.</p>
    </div>

    <div class="admin-profile">
        UNIQUE Administrator
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-title">Total Services</div>
        <div class="stat-value">{{ $serviceCount ?? 0 }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Active Services</div>
        <div class="stat-value">{{ $activeServices ?? 0 }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Today's Appointments</div>
        <div class="stat-value">{{ $todayAppointments ?? 0 }}</div>
    </div>

    <div class="stat-card">
        <div class="stat-title">Registered Customers</div>
        <div class="stat-value">{{ $customerCount ?? 0 }}</div>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h3>Quick Actions</h3>
            <p>Manage your salon operations from one place.</p>
        </div>
    </div>

    <div class="quick-grid">
        <a href="{{ route('admin.services.create') }}" class="quick-action">
            <strong>+ Add Service</strong>
            <span>Create a new salon service.</span>
        </a>

        <a href="{{ route('admin.services.index') }}" class="quick-action">
            <strong>Manage Services</strong>
            <span>Update service prices, duration and availability.</span>
        </a>

        <a href="{{ route('admin.appointments.index') }}" class="quick-action">
            <strong>Manage Appointments</strong>
            <span>Review and manage customer bookings.</span>
        </a>

        <a href="{{ route('admin.customers') }}" class="quick-action">
            <strong>View Customers</strong>
            <span>See registered salon customers.</span>
        </a>

        <a href="{{ route('admin.time-slots') }}" class="quick-action">
            <strong>Working Hours</strong>
            <span>View your salon's working-hour settings.</span>
        </a>

        <a href="{{ route('admin.settings') }}" class="quick-action">
            <strong>Admin Settings</strong>
            <span>View your administrator account.</span>
        </a>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h3>Recent Appointments</h3>
            <p>The latest bookings at UNIQUE.</p>
        </div>

        <a href="{{ route('admin.appointments.index') }}" class="btn btn-light">
            View All
        </a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($recentAppointments ?? [] as $appointment)
                    <tr>
                        <td>
                            {{ $appointment->customer_name ?? 'Customer' }}
                        </td>

                        <td>
                            {{ $appointment->service->name ?? 'Service unavailable' }}
                        </td>

                        <td>
                            {{ $appointment->appointment_date
                                ? \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y')
                                : '—' }}
                        </td>

                        <td>
                            {{ $appointment->appointment_time ?? '—' }}
                        </td>

                        <td>
                            {{ ucfirst($appointment->status ?? 'pending') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#999;padding:35px;">
                            No appointments have been booked yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
