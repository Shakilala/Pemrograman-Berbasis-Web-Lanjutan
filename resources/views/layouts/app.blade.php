
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris Barang')</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f6fb;
            color: #263247;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #17243b;
            color: white;
            position: fixed;
            padding: 28px 20px;
        }

        .brand {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 45px;
        }

        .brand span {
            color: #65a8ff;
        }

        .menu-label {
            color: #8998af;
            font-size: 11px;
            margin: 25px 10px 12px;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 9px;
            margin-bottom: 8px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #29466e;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 30px 38px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .topbar h2 {
            font-size: 24px;
        }

        .profile {
            background: white;
            padding: 11px 18px;
            border-radius: 10px;
            color: #526078;
            box-shadow: 0 3px 15px #1b31500b;
        }

        .content {
            background: white;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 5px 25px #1b31500b;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-primary {
            background: #3478d4;
            color: white;
        }

        .btn-primary:hover {
            background: #2464b9;
        }

        .btn-edit {
            background: #fff2d8;
            color: #a56a00;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #d13d3d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
        }

        th {
            background: #f3f6fb;
            color: #65738a;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
            text-align: left;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #edf0f5;
        }

        td {
            font-size: 14px;
        }

        tr:hover td {
            background: #fafcff;
        }

        input, select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce2ec;
            border-radius: 8px;
            margin-top: 8px;
            margin-bottom: 18px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #3478d4;
        }

        label {
            font-size: 14px;
            font-weight: 600;
        }

        .alert {
            background: #e5f7ec;
            color: #207346;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                padding: 20px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">INVENTORY<span>.</span></div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="menu">
            <a href="{{ route('barang.index') }}" class="active">
                📦 &nbsp; Data Barang
            </a>
            <a href="{{ route('barang.create') }}">
                ＋ &nbsp; Tambah Barang
            </a>
        </nav>

        <div class="menu-label">SISTEM</div>
        <nav class="menu">
            <a href="{{ route('barang.index') }}">
                ⚙ &nbsp; Manajemen Inventaris
            </a>
        </nav>
    </aside>

    <main class="main">
        <div class="topbar">
            <h2>@yield('page-heading', 'Dashboard')</h2>
            <div class="profile">Administrator</div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </main>

</body>
</html>
