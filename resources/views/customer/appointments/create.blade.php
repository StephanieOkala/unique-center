<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | UNIQUE</title>

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
            font-weight: 700;
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
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 30px;
        }

        .heading small {
            color: #a56b80;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .heading h1 {
            font-size: 38px;
            margin-top: 8px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0,0,0,.07);
        }

        .welcome {
            background: #f6edf1;
            padding: 16px 18px;
            border-radius: 10px;
            margin-bottom: 25px;
            color: #684554;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #a56b80;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .btn {
            width: 100%;
            border: none;
            background: #111;
            color: white;
            padding: 15px;
            border-radius: 9px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #a56b80;
        }

        .errors {
            background: #fff0f0;
            color: #a00000;
            padding: 15px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        @media (max-width: 650px) {
            .row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 25px 20px;
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
        <small>APPOINTMENTS</small>
        <h1>Book an Appointment</h1>
    </div>

    <div class="card">

        <div class="welcome">
            Booking as <strong>{{ Auth::user()->name }}</strong>
        </div>

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix the following:</strong>
                <ul style="margin-top: 8px; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.appointments.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="service_id">Select Service</label>

                <select name="service_id" id="service_id" required>
                    <option value="">Choose a service</option>

                    @foreach ($services as $service)
                        <option value="{{ $service->id }}"
                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }} —
                            ₦{{ number_format($service->price, 2) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">

                <div class="form-group">
                    <label for="appointment_date">Preferred Date</label>
                    <input
                        type="date"
                        name="appointment_date"
                        id="appointment_date"
                        value="{{ old('appointment_date') }}"
                        min="{{ date('Y-m-d') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="appointment_time">Preferred Time</label>
                    <input
                        type="time"
                        name="appointment_time"
                        id="appointment_time"
                        value="{{ old('appointment_time') }}"
                        required
                    >
                </div>

            </div>

            <div class="form-group">
                <label for="notes">Additional Notes</label>

                <textarea
                    name="notes"
                    id="notes"
                    placeholder="Anything you'd like us to know?">{{ old('notes') }}</textarea>
            </div>

            <button type="submit" class="btn">
                Book Appointment
            </button>

        </form>
    </div>
</div>

</body>
</html>