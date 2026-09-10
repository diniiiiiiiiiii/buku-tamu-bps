<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Login Admin - Buku Tamu BPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #eef3f8;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #263238;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 35px;
            border-radius: 10px;
            border-top: 5px solid #005b96;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo {
            width: 65px;
            height: 65px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        h1 {
            color: #003b5c;
            font-size: 22px;
            margin: 0 0 6px;
        }

        .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin: 0;
        }

        label {
            display: block;
            margin-top: 16px;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        input[type=email],
        input[type=password],
        input[type=text] {
            width: 100%;
            height: 42px;
            padding: 9px 12px;
            border: 1px solid #d4dde5;
            border-radius: 6px;
            font-size: 14px;
            color: #263238;
            background-color: #ffffff;
            outline: none;
        }

        input:focus {
            border-color: #005b96;
            box-shadow: 0 0 0 3px rgba(0, 91, 150, 0.10);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 42px;
        }

        .toggle-password {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
            font-size: 14px;
            border: none;
            background: transparent;
            padding: 5px;
        }

        .toggle-password:hover {
            color: #005b96;
        }

        .btn-submit {
            margin-top: 24px;
            width: 100%;
            height: 43px;
            background-color: #005b96;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #003b5c;
        }

        .error {
            background-color: #fff1f0;
            border: 1px solid #f1b8b5;
            color: #b42318;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            .container {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <img src="{{ asset('logo-bps.png') }}" alt="Logo BPS" class="logo">

            <h1>Login Admin</h1>

            <p class="subtitle">
                Buku Tamu Digital BPS Kota Bukittinggi
            </p>
        </div>

        @error('email')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Email</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required>

            <label for="password">Password</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>

                <button
                    type="button"
                    class="toggle-password"
                    onclick="lihatPassword()"
                    id="toggle-button">
                    <i id="icon-eye" class="fa-solid fa-eye"></i>
                </button>
            </div>

            <button type="submit" class="btn-submit">
                Login
            </button>

        </form>

    </div>

    <script>
        function lihatPassword() {
            let password = document.getElementById('password');
            let icon = document.getElementById('icon-eye');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>

</html>