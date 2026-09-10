<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Dashboard - Buku Tamu BPS</title>

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #eef3f8;
            margin: 0;
            padding-bottom: 40px;
            color: #263238;
        }
        .header,
        .navbar {
            height: 62px;
            background-color: #005b96;
            color: #ffffff;
            padding: 0 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .header-title {
            font-size: 15px;
        }
        .header form {
            margin: 0;
        }
        .btn-logout {
            background-color: transparent;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.45);
            padding: 8px 15px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            border-radius: 6px;
        }
        .btn-logout:hover {
            background-color: rgba(255, 255, 255, 0.12);
        }
        .container {
            max-width: 900px;
            margin: 32px auto;
            padding: 0 20px;
        }
        /* Modal Logout */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.35);
            align-items: center;
            justify-content: center;
            z-index: 999;
            padding: 20px;
        }
        .modal-overlay.show {
            display: flex;
        }
        .logout-modal {
            width: 100%;
            max-width: 360px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 26px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .modal-icon {
            width: 42px;
            height: 42px;
            margin: 0 auto 14px;
            border-radius: 7px;
            background-color: #eef5fa;
            color: #005b96;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-icon i {
            font-size: 17px;
        }
        .logout-modal h3 {
            margin: 0;
            color: #003b5c;
            font-size: 17px;
        }
        .logout-modal p {
            margin: 8px 0 22px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.5;
        }
        .modal-actions {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        .modal-actions form {
            margin: 0;
        }
        .btn-cancel,
        .btn-confirm {
            padding: 9px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }
        .btn-cancel {
            background-color: #ffffff;
            color: #59636d;
            border: 1px solid #d5dee6;
        }
        .btn-cancel:hover {
            background-color: #f5f7f9;
        }
        .btn-confirm {
            background-color: #005b96;
            color: #ffffff;
            border: 1px solid #005b96;
        }
        .btn-confirm:hover {
            background-color: #003b5c;
        }
        .top-menu {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 24px;
        }
        .page-title {
            margin: 0;
            color: #003b5c;
            font-size: 24px;
        }
        .page-title i {
            color: #005b96;
            font-size: 20px;
            margin-right: 7px;
        }
        .page-subtitle {
            color: #6b7280;
            font-size: 13px;
            margin: 6px 0 0;
        }
        .btn-link {
            display: inline-block;
            background-color: #005b96;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }
        .btn-link:hover {
            background-color: #003b5c;
        }
        .cards {
            display: flex;
            gap: 18px;
            margin-bottom: 20px;
        }
        .card {
            flex: 1;
            background-color: #ffffff;
            padding: 22px 24px;
            border: 1px solid #dce4eb;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .card-icon {
            width: 44px;
            height: 44px;
            border-radius: 7px;
            background-color: #eef5fa;
            color: #005b96;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .card-icon i {
            font-size: 18px;
        }
        .card .number {
            font-size: 29px;
            font-weight: bold;
            color: #005b96;
            line-height: 1;
            margin-bottom: 7px;
        }
        .card .label {
            color: #6b7280;
            font-size: 13px;
        }
        .box {
            background-color: #ffffff;
            border: 1px solid #dce4eb;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
        .box-header {
            padding-bottom: 15px;
            border-bottom: 1px solid #e3e8ed;
            margin-bottom: 3px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .box-icon {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            background-color: #eef5fa;
            color: #005b96;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .box-icon i {
            font-size: 15px;
        }
        .box h3 {
            margin: 0;
            color: #003b5c;
            font-size: 16px;
        }
        .box-description {
            color: #6b7280;
            font-size: 12px;
            margin: 5px 0 0;
        }
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 5px;
            border-bottom: 1px solid #edf0f3;
            font-size: 14px;
        }
        .row:last-child {
            border-bottom: none;
        }
        .row span {
            color: #4b5563;
        }
        .row b {
            color: #005b96;
            font-size: 14px;
        }

        /* Mobile */
        @media (max-width: 700px) {
            .header,
            .navbar {
                height: 52px;
                padding: 0 18px;
            }

            .header-title,
            .brand {
                font-size: 13px;
            }
            .container {
                margin: 22px auto;
                padding: 0 14px;
            }
            .top-menu {
                align-items: flex-start;
                gap: 15px;
            }
            .page-title {
                font-size: 21px;
            }
            .cards {
                flex-direction: column;
                gap: 12px;
            }
        }
        @media (max-width: 500px) {
            .top-menu {
                flex-direction: column;
            }
            .btn-link {
                width: 100%;
                text-align: center;
            }
            .card {
                padding: 20px;
            }

            .box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-title">
            Buku Tamu Digital — BPS Kota Bukittinggi
        </div>
        <button type="button" class="btn-logout" onclick="bukaModalLogout()">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </button>
    </div>

    <div class="container">
        <div class="top-menu">
            <div>
                <h2 class="page-title">
                    Dashboard
                </h2>
                <p class="page-subtitle">
                    Ringkasan data buku tamu BPS Kota Bukittinggi
                </p>
            </div>
            <a href="{{ route('guests.index') }}" class="btn-link">
                Lihat Daftar Tamu
            </a>
        </div>

        <div class="cards">
            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <div class="number">
                        {{ $tamuBulanIni }}
                    </div>
                    <div class="label">
                        Tamu Bulan Ini
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <div class="number">{{ $totalTamu }} </div>
                    <div class="label">Total Seluruh Tamu </div>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="box-header">
                <div class="box-icon"><i class="fa-solid fa-chart-simple"></i></div>
                <div>
                    <h3> Jumlah Tamu Berdasarkan Source</h3>
                </div>
            </div>

            <div class="row">
                <span>Direct</span>
                <b>{{ $tamuPerSource['direct'] ?? 0 }}</b>
            </div>
            <div class="row">
                <span>WhatsApp</span>
                <b>{{ $tamuPerSource['whatsapp'] ?? 0 }}</b>
            </div>
            <div class="row">
                <span>Instagram</span>
                <b>{{ $tamuPerSource['instagram'] ?? 0 }}</b>
            </div>
            <div class="row">
                <span>Facebook</span>
                <b>{{ $tamuPerSource['facebook'] ?? 0 }}</b>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div id="logoutModal" class="modal-overlay">
        <div class="logout-modal">
            <div class="modal-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>
            <h3>Konfirmasi Logout</h3>
            <p>
                Apakah Anda yakin ingin keluar dari akun?
            </p>
            <div class="modal-actions">
                <button type="button" class="btn-cancel" onclick="tutupModalLogout()">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-confirm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function bukaModalLogout() {
            document.getElementById('logoutModal').classList.add('show');
        }

        function tutupModalLogout() {
            document.getElementById('logoutModal').classList.remove('show');
        }

        document.getElementById('logoutModal').addEventListener('click', function(event) {
            if (event.target === this) {
                tutupModalLogout();
            }
        });
    </script>
</body>
</html>