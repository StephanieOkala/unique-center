<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments | UNIQUE</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff0f6;
            color: #382432;
        }

        /* NAVIGATION BAR */
        .navbar {
            background: #111;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
        }

        .brand span {
            display: block;
            font-size: 11px;
            color: #d7bfc8;
            letter-spacing: 2px;
            margin-top: 4px;
        }

        .back {
            color: white;
            text-decoration: none;
            border: 1px solid #555;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .back:hover {
            background: #333;
        }

        /* APPOINTMENTS CONTENT */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(110, 35, 75, .10);
        }

        h1 {
            color: #c02672;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            background: #c02672;
            color: white;
        }

        .btn.secondary {
            background: #fce7f3;
            color: #9d174d;
        }

        .success {
            padding: 14px;
            background: #e8f8ed;
            color: #216e39;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 15px 12px;
            border-bottom: 1px solid #f0dce6;
        }

        th {
            background: #fff0f6;
            color: #9d174d;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fff3cd;
            color: #856404;
            text-transform: capitalize;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 35px 10px;
            color: #777;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 18px 5%;
            }

            .brand {
                font-size: 21px;
            }

            .back {
                padding: 9px 13px;
                font-size: 14px;
            }

            .container {
                margin: 25px 12px;
                padding: 20px 14px;
            }
        }
    </style>
</head>

<body>

<!-- NAVIGATION BAR -->
<nav class="navbar">
    <div class="brand">
        UNIQUE
        <span>CENTER FOR ALL</span>
    </div>

    <a href="{{ route('customer.dashboard') }}" class="back">
        Dashboard
    </a>
</nav>

<!-- APPOINTMENTS CONTENT -->
<div class="container">

    <h1>My Appointments</h1>
    <p class="subtitle">UNIQUE — Center for All. View your salon bookings below.</p>

    <div class="actions">
        +
		

        <a href="{{ route('customer.appointments.create') }}" class="btn">
            + Book Appointment
        </a>
    </div>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($appointments->isEmpty())
        <div class="empty">
            <h3>No appointments yet</h3>
            <p>Your bookings will appear here when you book a salon appointment.</p>
            <a href="{{ route('customer.appointments.create') }}" class="btn">
                Book Your First Appointment
            </a>
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
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
                                {{ $appointment->service->name ?? 'Service unavailable' }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                            </td>
                            <td>{{ $appointment->customer_phone }}</td>
                            <td>
                                <span class="status">{{ $appointment->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

</body>
</html>
