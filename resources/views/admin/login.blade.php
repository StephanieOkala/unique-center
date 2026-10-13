<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | UNIQUE</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #211a20, #4a2f3c);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 70px rgba(0,0,0,.25);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h1 {
            font-size: 32px;
            letter-spacing: 6px;
            color: #211a20;
        }

        .logo p {
            color: #d889a4;
            margin-top: 7px;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .heading {
            text-align: center;
            margin-bottom: 25px;
        }

        .heading h2 {
            color: #302830;
            margin-bottom: 6px;
        }

        .heading p {
            color: #8b8087;
            font-size: 14px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .success {
            background: #e8f7ec;
            color: #327344;
        }

        .error {
            background: #fdeaea;
            color: #a33d3d;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
            color: #453b42;
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
            border-color: #d889a4;
        }

        button {
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 10px;
            background: #d889a4;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            background: #c96e8d;
            transform: translateY(-1px);
        }

        .back {
            text-align: center;
            margin-top: 22px;
        }

        .back a {
            color: #b85f7c;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">
        <h1>UNIQUE</h1>
        <p>Center for All</p>
    </div>

    <div class="heading">
        <h2>Admin Login</h2>
        <p>Sign in to manage the salon.</p>
    </div>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="form-group">
            <label>Email Address</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="admin@example.com"
                required
            >
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >
        </div>

        <button type="submit">
            Login to Admin Panel
        </button>
    </form>

    <div class="back">
        <a href="{{ route('customer.login') }}">
            ← Back to customer login
        </a>
    </div>

</div>

</body>
</html>