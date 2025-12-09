<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: url('{{ asset('asset/img/bg-login.png') }}'); /* GANTI sesuai background kamu */
            background-size: cover;
            background-position: center;
        }

        .register-container {
            width: 60%;
            max-width: 700px;
            background-color: #004f46;
            margin: 100px auto;
            padding: 40px 30px;
            border-radius: 40px;
            text-align: center;
            color: white;
        }

        .register-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .input-box {
            width: 70%;
            margin: 8px auto;
        }

        .input-box input {
            width: 100%;
            padding: 12px;
            border-radius: 20px;
            border: none;
            outline: none;
            text-align: center;
            font-size: 12px;
            background: white;
        }

        .btn-register {
            margin-top: 20px;
            padding: 8px 25px;
            background: black;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #222;
        }
    </style>

</head>
<body>

    <div class="register-container">
        <div class="register-title">Register</div>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="input-box">
                <input type="email" name="email" placeholder="Masukkan Email" required>
            </div>

            <div class="input-box">
                <input type="text" name="telepon" placeholder="Masukkan No.Telepon" required>
            </div>

            <div class="input-box">
                <input type="text" name="nama" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="input-box">
                <input type="text" name="username" placeholder="Masukkan Username" required>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn-register">Register</button>
        </form>
    </div>

</body>
</html>
