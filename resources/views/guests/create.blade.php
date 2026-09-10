<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Buku Tamu Digital BPS Kota Bukittinggi</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #eef3f8;
            color: #263238;
        }
        .navbar {
            height: 62px;
            background-color: #005b96;
            color: #ffffff;
            padding: 0 30px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .brand {
            font-size: 15px;
            font-weight: 400;
        }
        .container {
            width: 100%;
            max-width: 620px;
            margin: 32px auto;
            padding: 0 20px 40px;
        }
        .form-card {
            background-color: #ffffff;
            border: 1px solid #dce4eb;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0, 59, 92, 0.06);
        }
        .card-top {
            height: 7px;
            background-color: #005b96;
        }
        .form-header {
            position: relative;
            text-align: center;
            padding: 28px 30px 24px;
            background-color: #ffffff;
        }
        .logo-wrapper {
            width: 76px;
            height: 76px;
            margin: 0 auto 13px;
            background-color: #f1f6fa;
            border: 1px solid #dce8ef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 58px;
            height: 58px;
            object-fit: contain;
        }
        .form-header h1 {
            margin: 0 0 6px;
            color: #003b5c;
            font-size: 23px;
            font-weight: 700;
        }
        .subtitle {
            margin: 0;
            color: #6b7280;
            font-size: 13px;
        }
        .header-line {
            width: 42px;
            height: 3px;
            margin: 13px auto 0;
            background-color: #005b96;
            border-radius: 3px;
        }
        .form-content {
            padding: 24px 30px 28px;
            background-color: #fafcfd;
            border-top: 1px solid #e7edf1;
        }
        .form-intro {
            margin-bottom: 20px;
            padding: 11px 13px;
            background-color: #eef5fa;
            border-left: 3px solid #005b96;
            color: #59636d;
            font-size: 12px;
            line-height: 1.5;
        }
        .form-intro strong {
            color: #003b5c;
        }
        .form-group {
            margin-bottom: 17px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-size: 13px;
            font-weight: 600;
        }
        .required {
            color: #b42318;
        }
        .form-control {
            width: 100%;
            height: 40px;
            padding: 9px 12px;
            box-sizing: border-box;
            border: 1px solid #d4dde5;
            border-radius: 6px;
            background-color: #ffffff;
            color: #263238;
            font-family: Arial, sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: #005b96;
            box-shadow: 0 0 0 3px rgba(0, 91, 150, 0.09);
        }
        .form-control::placeholder {
            color: #9aa5af;
        }
        .success {
            margin-bottom: 18px;
            padding: 11px 13px;
            background-color: #edf8f2;
            border: 1px solid #b7dfc7;
            border-radius: 6px;
            color: #18794e;
            font-size: 13px;
        }
        .success i {
            margin-right: 5px;
        }
        .error {
            margin-bottom: 20px;
            padding: 11px 13px;
            background-color: #fff1f0;
            border: 1px solid #f1b8b5;
            border-radius: 6px;
            color: #b42318;
            font-size: 12px;
            line-height: 1.5;
        }
        .error strong {
            display: block;
            margin-bottom: 5px;
            font-size: 13px;
        }
        .error strong i {
            margin-right: 5px;
        }
        .error ul {
            margin: 5px 0 0 18px;
            padding: 0;
        }
        .error li {
            margin-bottom: 2px;
        }
        .btn-login {
            margin-left: auto;
            padding: 8px 14px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            color: #ffffff;
            text-decoration: none;
            font-size: 12px;
            font-weight: 400;
        }
        .btn-submit {
            width: 100%;
            height: 42px;
            margin-top: 5px;
            padding: 10px 20px;
            background-color: #005b96;
            border: 1px solid #005b96;
            border-radius: 6px;
            color: #ffffff;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 13px;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .btn-submit:hover {
            background-color: #003b5c;
            border-color: #003b5c;
        }
        .btn-submit i {
            margin-right: 6px;
        }
        .footer {
            padding: 15px 20px;
            border-top: 1px solid #e5eaee;
            background-color: #ffffff;
            text-align: center;
            color: #8a949e;
            font-size: 11px;
        }
        /* Mobile */
        @media (max-width: 700px) {
            .navbar {
                height: 52px;
                padding: 0 18px;
            }
            .brand {
                font-size: 13px;
            }
            .container {
                margin: 22px auto;
                padding: 0 14px 30px;
            }
            .form-header {
                padding: 25px 20px 22px;
            }
            .logo-wrapper {
                width: 70px;
                height: 70px;
            }
            .logo {
                width: 54px;
                height: 54px;
            }
            .form-header h1 {
                font-size: 21px;
            }
            .subtitle {
                font-size: 12px;
            }
            .form-content {
                padding: 21px 20px 24px;
            }
            .form-intro {
                font-size: 11px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            Buku Tamu Digital — BPS Kota Bukittinggi
        </div>
        <a href="{{ route('login') }}" class="btn-login">
            Login Admin
        </a>
    </nav>

    <main class="container">
        <div class="form-card">
            <div class="card-top"></div>
                <div class="form-header">
                    <div class="logo-wrapper">
                        <img src="{{ asset('logo-bps.png') }}" alt="Logo BPS" class="logo">
                    </div>
                        <h1>Buku Tamu Digital</h1>
                        <p class="subtitle">
                            BPS Kota Bukittinggi
                        </p>
                    <div class="header-line"></div>
                </div>

                {{-- Form --}}
                <div class="form-content">
                    <div class="form-intro">
                        <strong>Selamat datang.</strong>
                        Silakan lengkapi data kunjungan Anda pada formulir berikut.
                    </div>

                    @if (session('success'))
                        <div class="success">
                            <i class="fa-solid fa-circle-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="error">
                            <strong>
                                <i class="fa-solid fa-circle-exclamation"></i>
                                Data belum lengkap atau belum benar.
                            </strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('guests.store') }}" method="POST">
                        @csrf
                        {{-- Nama --}}
                        <div class="form-group">
                            <label for="nama"> Nama </label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
                        </div>

                        {{-- Nomor HP --}}
                        <div class="form-group">
                            <label for="no_hp"> Nomor HP </label>
                            <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp') }}" maxlength="13" inputmode="numeric" placeholder="Masukkan nomor HP" required>
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan alamat email" required>
                        </div>

                        {{-- Instansi --}}
                        <div class="form-group">
                            <label for="instansi"> Instansi </label>
                            <input type="text" id="instansi" name="instansi" class="form-control" value="{{ old('instansi') }}" placeholder="Masukkan nama instansi" required>
                        </div>

                        {{-- Tujuan Kunjungan --}}
                        <div class="form-group">
                            <label for="tujuan_kunjungan"> Tujuan Kunjungan </label>
                            <input type="text" id="tujuan_kunjungan" name="tujuan_kunjungan" class="form-control" value="{{ old('tujuan_kunjungan') }}" placeholder="Masukkan tujuan kunjungan" required>
                        </div>

                        {{-- Tanggal Kunjungan --}}
                        <div class="form-group">
                            <label for="tanggal_kunjungan"> Tanggal Kunjungan </label>
                            <input type="date" id="tanggal_kunjungan" name="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan') }}" required>
                        </div>

                        {{-- Button Kirim --}}
                        <button type="submit" class="btn-submit"> Kirim </button>
                    </form>
                </div>
        </div>

    </main>

    <script>
        document.getElementById('no_hp').addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 13);
        });
    </script>
    
</body>
</html>