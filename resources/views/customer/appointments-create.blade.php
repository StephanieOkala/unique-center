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

        /* BOOKING FORM */
        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 32px;
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

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #e5c8d7;
            border-radius: 9px;
            font-size: 15px;
            background: #fffafd;
        }

        textarea {
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 15px;
            border: 0;
            border-radius: 9px;
            background: #c02672;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #991b58;
        }

        .error {
            color: #c62828;
            font-size: 14px;
            margin-top: 6px;
        }

        .success {
            padding: 12px;
            background: #e8f8ed;
            color: #216e39;
            border-radius: 8px;
        }

        @media (max-width: 500px) {
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
                margin: 25px auto;
                padding: 22px;
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

<!-- BOOKING FORM -->
<div class="container">

    <h1>Book an Appointment</h1>
    <p class="subtitle">UNIQUE — Center for All. We look forward to serving you.</p>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="error">
            Please correct the following:
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.appointments.store') }}">
        @csrf

        <label for="service_id">Choose a Service</label>
        <select id="service_id" name="service_id" required>
            <option value="">Select a service</option>
            @foreach($services as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                    {{ $service->name }}
                    @if(isset($service->price))
                        — ₦{{ number_format($service->price, 2) }}
                    @endif
                </option>
            @endforeach
        </select>

        <label for="customer_phone">Phone Number</label>
        <input
            type="tel"
            id="customer_phone"
            name="customer_phone"
            value="{{ old('customer_phone', auth()->user()->phone ?? '') }}"
            maxlength="30"
            placeholder="Enter your phone number"
            required
        >

        <label for="appointment_date">Appointment Date</label>
        <input
            type="date"
            id="appointment_date"
            name="appointment_date"
            min="{{ date('Y-m-d') }}"
            value="{{ old('appointment_date') }}"
            required
        >

        <label for="appointment_time">Appointment Time</label>
        <input
            type="time"
            id="appointment_time"
            name="appointment_time"
            value="{{ old('appointment_time') }}"
            required
        >

        <label for="notes">Additional Notes (Optional)</label>
        <textarea
            id="notes"
            name="notes"
            rows="4"
            maxlength="1000"
            placeholder="Any details you'd like us to know?"
        >{{ old('notes') }}</textarea>

        <button type="submit">Confirm Appointment</button>
    </form>
</div>

</body>
</html>
