<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Dashboard | UNIQUE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f8f5f7;
            color: #292229;
        }

        .navbar {
            background: #211a20;
            color: white;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 25px;
            letter-spacing: 5px;
        }

        .brand span {
            display: block;
            color: #dca0b7;
            font-size: 11px;
            letter-spacing: 1px;
            margin-top: 3px;
        }

        .logout {
            background: #d98ba5;
            color: white;
            border: none;
            padding: 10px 17px;
            border-radius: 8px;
            cursor: pointer;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .welcome {
            background: linear-gradient(135deg, #211a20, #d98ba5);
            color: white;
            padding: 35px;
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 8px;
        }

        .welcome p {
            opacity: .9;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 30px rgba(35, 25, 32, .06);
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #8b8087;
            font-size: 14px;
            line-height: 1.6;
        }

        .card a {
            display: inline-block;
            margin-top: 18px;
            background: #d98ba5;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
        }

        @media (max-width: 750px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 18px 5%;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="brand">
        UNIQUE
        <span>Center for All</span>
    </div>

    <form method="POST" action="{{ route('customer.logout') }}">
        @csrf

        <button type="submit" class="logout">
            Logout
        </button>
    </form>

</nav>

<div class="container">

    <div class="welcome">
        <h1>Welcome, {{ $customer->name }} </h1>

        <p>
            Welcome to your UNIQUE customer dashboard.
            Manage your salon appointments from here.
        </p>
    </div>

    <div class="grid">

        <div class="card">
            <h3>Book Appointment</h3>

            <p>
                Choose a service and book your next appointment
                with UNIQUE.
            </p>

            <a href="{{ route('customer.appointments.create') }}">
                Book Now
            </a>
        </div>

        <div class="card">
            <h3>My Appointments</h3>

            <p>
                View your upcoming and previous salon appointments
                and their current status.
            </p>

           <a href="{{ route('customer.appointments') }}">
    View Appointments
</a>
        </div>

        <div class="card">
            <h3>My Profile</h3>

            <p>
                View and manage your customer information.
            </p>

           <a href="{{ route('customer.profile') }}">
    View Profile
</a>
        </div>

    </div>

</div>

</body>
</html>