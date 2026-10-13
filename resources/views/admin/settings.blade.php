```blade
@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="topbar">
    <div>
        <h2>Settings</h2>
        <p>Administrator account information.</p>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h3>Admin Profile</h3>
            <p>Your current administrator account details.</p>
        </div>
    </div>

    <div style="line-height:2;">
        <p><strong>Name:</strong> {{ $admin->name }}</p>
        <p><strong>Email:</strong> {{ $admin->email }}</p>
        <p><strong>Phone:</strong> {{ $admin->phone ?: 'Not provided' }}</p>
        <p><strong>Account Type:</strong> Administrator</p>
    </div>
</div>
@endsection
```