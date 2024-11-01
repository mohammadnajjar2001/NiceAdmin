<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
        }

        .container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            padding: 50px;
            text-align: center;
            width: 350px;
            animation: fadeIn 1.2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            background-color: #5A67D8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #4C51BF;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #48BB78;
        }

        .btn-secondary:hover {
            background-color: #38A169;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
        }

        .footer a {
            color: #5A67D8;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 30px;
            }

            h1 {
                font-size: 24px;
            }

            .btn {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to {{ config('app.name') }}</h1>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn">Log In</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                @endif
            @endauth
        @endif
        <div class="footer">
            <p>&copy; 2024 {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
