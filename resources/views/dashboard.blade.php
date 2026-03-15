<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #1e293b;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
        }

        .sidebar a:hover {
            background: #334155;
        }

        .main {
            margin-left: 220px;
            padding: 30px;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin: 0;
            font-size: 16px;
            color: #555;
        }

        .card p {
            font-size: 28px;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="sidebar">

        <h2>My Admin</h2>

        <a href="#">Dashboard</a>
        <a href="#">Users</a>
        <a href="#">Products</a>
        <a href="#">Transactions</a>
        <a href="#">Settings</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                style="width:100%; padding:10px; border:none; background:#ef4444; color:white; cursor:pointer;">
                Logout
            </button>
        </form>


    </div>

    <div class="main">

        <div class="header">
            Dashboard
        </div>

        <div class="cards">

            <div class="card">
                <h3>Total Users</h3>
                <p>{{ $users }}</p>
            </div>

            <div class="card">
                <h3>Total Products</h3>
                <p>{{ $products }}</p>
            </div>

            <div class="card">
                <h3>Total Transactions</h3>
                <p>{{ $transactions }}</p>
            </div>

            <div class="card">
                <h3>Total Revenue</h3>
                <p>Rp {{ number_format($revenue) }}</p>
            </div>

        </div>

    </div>

</body>

</html>
