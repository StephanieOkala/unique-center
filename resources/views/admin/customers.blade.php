```blade
@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="topbar">
    <div>
        <h2>Customers</h2>
        <p>View customers registered with UNIQUE.</p>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h3>Registered Customers</h3>
            <p>Total customers: {{ $customers->count() }}</p>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date Registered</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone ?: 'Not provided' }}</td>
                        <td>{{ $customer->created_at?->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align:center;padding:30px;">
                            No customers registered yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
```