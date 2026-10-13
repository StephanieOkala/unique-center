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
            background: #faf7f8;
            color: #222;
        }

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
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .heading small {
            color: #a56b80;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .heading h1 {
            font-size: 38px;
            margin: 8px 0 30px;
        }

        .success {
            background: #eaf8ef;
            color: #176b35;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .appointment {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.06);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .service {
            font-size: 21px;
            font-weight: bold;
        }

        .status {
            padding: 7px 13px;
            border-radius: 30px;
            background: #f7edf1;
            color: #8b5369;
            font-size: 13px;
            text-transform: capitalize;
            font-weight: bold;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .detail small {
            color: #888;
            display: block;
            margin-bottom: 5px;
        }

        .detail strong {
            font-size: 15px;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 60px 25px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,.05);
        }

        .empty h2 {
            margin-bottom: 10px;
        }

        .book {
            display: inline-block;
            margin-top: 20px;
            background: #111;
            color: white;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 8px;
        }

        @media(max-width: 700px) {
            .details {
                grid-template-columns: 1fr;
            }

            .top {
                align-items: flex-start;
                flex-direction: column;
            }

            .heading h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="brand">
        UNIQUE
        <span>CENTER FOR ALL</span>
    </div>

    <a href="{{ route('customer.dashboard') }}" class="back">
        Dashboard
    </a>

</nav>

<div class="container">

    <div class="heading">
        <small>MY ACCOUNT</small>
        <h1>My Appointments</h1>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @forelse($appointments as $appointment)

        <div class="appointment">

            <div class="top">

                <div class="service">
                    {{ $appointment->service->name }}
                </div>

                <div class="status">
                    {{ $appointment->status }}
                </div>

            </div>

            <div class="details">

                <div class="detail">
                    <small>Date</small>
                    <strong>
                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}
                    </strong>
                </div>

                <div class="detail">
                    <small>Time</small>
                    <strong>
                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                    </strong>
                </div>

                <div class="detail">
                    <small>Service Price</small>
                    <strong>
                        ₦{{ number_format($appointment->service->price, 2) }}
                    </strong>
                </div>

            </div>

        </div>

    @empty

        <div class="empty">

            <h2>No appointments yet</h2>

            <p>
                You haven't booked an appointment with UNIQUE yet.
            </p>

            <a href="{{ route('customer.appointments.create') }}" class="book">
                Book Your First Appointment
            </a>

        </div>

    @endforelse

</div>

</body>
</html>