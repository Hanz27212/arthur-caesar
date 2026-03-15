<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .container {
            width: 900px;
            height: 500px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .left {
            width: 50%;
            background: linear-gradient(135deg, #5f72ff, #9b23ea);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            text-align: center;
        }

        .left h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .left p {
            font-size: 14px;
            opacity: 0.9;
        }

        /* RIGHT SIDE */

        .right {
            width: 50%;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-top: 5px;
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: #667eea;
            outline: none;
        }

        /* BUTTON */

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #667eea;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5563d6;
        }

        /* ERROR MESSAGE */

        .error {
            background: #ffdede;
            color: #c0392b;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        /* FOOTER */

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #777;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="left">
            <h1>Welcome Back</h1>
            <p>Login untuk melanjutkan ke dashboard sistem.</p>
        </div>

        <div class="right">

            <h2>Login Account</h2>

            @if (session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password">
                </div>

                <button type="submit">Login</button>

            </form>

            <div class="footer">
                In Omnia Paratus
            </div>

        </div>

    </div>

</body>

</html>
