<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | UNIQUE</title>

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
            max-width: 700px;
            margin: 60px auto;
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

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0,0,0,.07);
        }

        .avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: #f0dfe6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            color: #805466;
            margin-bottom: 25px;
        }

        .info {
            border-bottom: 1px solid #eee;
            padding: 18px 0;
        }

        .info:last-child {
            border-bottom: none;
        }

        .info small {
            display: block;
            color: #888;
            margin-bottom: 6px;
        }

        .info strong {
            font-size: 17px;
        }

        @media(max-width: 600px) {
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
        <small>MY ACCOUNT</small>
        <h1>My Profile</h1>
    </div>

    <div class="card">

        <div class="avatar">
            {{ strtoupper(substr($customer->name, 0, 1)) }}
        </div>

        <div class="info">
            <small>Full Name</small>
            <strong>{{ $customer->name }}</strong>
        </div>

        <div class="info">
            <small>Email Address</small>
            <strong>{{ $customer->email }}</strong>
        </div>

        <div class="info">
            <small>Phone Number</small>
            <strong>{{ $customer->phone ?: 'Not provided' }}</strong>
        </div>

    </div>

</div>

</body>
</html>