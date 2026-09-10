<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">

    <title>@yield('title', 'Buku Tamu BPS')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        .header {
            background-color: #ffffff;
            padding: 15px 20px;
            border-bottom: 3px solid #1e5aa8;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header img {
            width: 50px;
            height: auto;
        }

        .header h1 {
            font-size: 18px;
            color: #1e5aa8;
            margin: 0;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('logo-bps.png') }}" alt="Logo BPS">
        <h1>BPS Kota Bukittinggi</h1>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>