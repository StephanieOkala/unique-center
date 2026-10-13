<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Login | UNIQUE</title>

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

        .login-box {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 40px;
            border-radius: 22px;
            box-shadow: 0 20px 60px rgba(0,0,0,.2);
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
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #e4dce0;
            border-radius: 10px;
            outline: none;
        }

        input:focus {
            border-color: #d98ba5;
        }

        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #d98ba5;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
        }

        .error {
            background: #fbe7e7;
            color: #b94a4a;
            padding: 12px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success {
            background: #e8f7ec;
            color: #327344;
            padding: 12px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .register-link {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
            color: #8b8087;
        }

        .register-link a {
            color: #c96e8d;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="brand">
        <h1>UNIQUE</h1>
        <p>Center for All</p>
    </div>

    <h2>Welcome Back</h2>

    <p class="subtitle">
        Login to manage your appointments.
    </p>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('customer.login') }}">
        @csrf

        <div class="form-group">
            <label>Email Address</label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required>
        </div>

        <div class="form-group">
            <label>Password</label>

            <input
                type="password"
                name="password"
                required>
        </div>

        <button type="submit" class="btn">
            Login
        </button>
    </form>

    <div class="register-link">
        Don't have an account?
        <a href="{{ route('customer.register') }}">
            Create Account
        </a>
    </div>

</div>

</body>
</html>