<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: url('{{ asset('asset/img/bg-login.png') }}') no-repeat center center/cover;
            height: 100vh;
        }

        .overlay {
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.40);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 450px;
            background: #053b33;
            padding: 40px 30px;
            border-radius: 45px;
            text-align: center;
            color: white;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.4);
        }

        .login-card h2 {
            margin-bottom: 25px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        .login-card input,
        .login-card select {
            width: 90%;
            padding: 12px 15px;
            margin: 10px 0;
            border: none;
            outline: none;
            border-radius: 30px;
            background: #ffffff;
            font-size: 14px;
        }

        .login-card button {
            width: 90%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 25px;
            background: black;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .login-card button:hover {
            opacity: 0.8;
        }

        .register-text {
            margin-top: 15px;
            font-size: 13px;
            color: #ffffff;
        }

        .register-text a {
            color: #00ffea;
            font-weight: bold;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="overlay">
        <div class="login-card">
            <h2>Login</h2>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <input type="email" name="email" placeholder="Masukkan Email">
                <input type="text" name="username" placeholder="Masukkan Username">
                <input type="password" name="password" placeholder="Masukkan Password">

                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="pemilik">Pemilik</option>
                </select>

                <button type="submit">Login</button>
            </form>

            <div class="register-text">
                Belum punya akun? <a href="{{ route('register') }}">Registrasi sekarang</a>
            </div>

        </div>
    </div>

</body>

</html>
