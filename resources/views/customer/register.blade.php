<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Registration | UNIQUE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #211a20, #d98ba5);
            padding: 20px;
        }

        .register-box {
            width: 100%;
            max-width: 470px;
            background: white;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand h1 {
            font-size: 32px;
            letter-spacing: 6px;
            color: #211a20;
        }

        .brand p {
            color: #d98ba5;
            font-size: 13px;
            margin-top: 5px;
        }

        h2 {
            text-align: center;
            color: #302830;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #8b8087;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #453b42;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e4dce0;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #d98ba5;
            box-shadow: 0 0 0 3px rgba(217, 139, 165, .12);
        }

        .btn {
            width: 100%;
            border: none;
            padding: 14px;
            background: #d98ba5;
            color: white;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 5px;
        }

        .btn:hover {
            background: #c96e8d;
        }

        .login-link {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
            color: #8b8087;
        }

        .login-link a {
            color: #c96e8d;
            font-weight: 600;
            text-decoration: none;
        }

        .error {
            background: #fbe7e7;
            color: #b94a4a;
            padding: 12px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .error ul {
            padding-left: 18px;
        }
    </style>
</head>

<body>

<div class="register-box">

    <div class="brand">
        <h1>UNIQUE</h1>
        <p>Center for All</p>
    </div>

    <h2>Create Your Account</h2>

    <p class="subtitle">
        Register to book and manage your salon appointments.
    </p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="e.g. 08012345678"
                required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Minimum 8 characters"
                required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm your password"
                required>
        </div>

        <button type="submit" class="btn">
            Create Account
        </button>
    </form>

    <div class="login-link">
        Already have an account?
        <a href="{{ route('customer.login') }}">Login</a>
    </div>

</div>

</body>
</html>