```blade
@extends('layouts.admin')

@section('title', 'Time Slots')

@section('content')
<div class="topbar">
    <div>
        <h2>Time Slots</h2>
        <p>View the salon's configured working hours.</p>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h3>Salon Working Hours</h3>
            <p>Records currently saved in the system.</p>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Working Hours Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($workingHours as $workingHour)
                    <tr>
                        <td>{{ $workingHour->id }}</td>
                        <td>
                            @foreach ($workingHour->getAttributes() as $column => $value)
                                @if (!in_array($column, ['id', 'created_at', 'updated_at']))
                                    <strong>{{ str($column)->replace('_', ' ')->title() }}:</strong>
                                    {{ $value ?? '—' }}<br>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center;padding:30px;">
                            No working-hour records have been added yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
```