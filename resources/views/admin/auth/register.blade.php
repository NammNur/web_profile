<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 to-emerald-900 px-4">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-8 text-white">
        
        <h2 class="text-2xl font-bold text-center mb-6 tracking-wide">
            Register Admin
        </h2>

        <form action="{{ route('admin.register.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <input type="text" name="nama" placeholder="Nama Lengkap"
                    class="w-full px-4 py-3 rounded-full bg-white text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required>
            </div>

            <div>
                <input type="text" name="username" placeholder="Username"
                    class="w-full px-4 py-3 rounded-full bg-white text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required>
            </div>

            <div>
                <input type="email" name="email" placeholder="Email Admin"
                    class="w-full px-4 py-3 rounded-full bg-white text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required>
            </div>

            <div>
                <input type="text" name="telepon" placeholder="No. Telepon"
                    class="w-full px-4 py-3 rounded-full bg-white text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-3 rounded-full bg-white text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-emerald-500"
                    required>
            </div>

            <button type="submit"
                class="w-full py-3 mt-2 rounded-full bg-emerald-600
                       hover:bg-emerald-700 transition font-semibold tracking-wide">
                Register Admin
            </button>
        </form>

        <p class="text-center text-sm mt-6 text-gray-300">
            Sudah punya akun admin?
            <a href="{{ route('admin.login') }}"
               class="text-emerald-400 hover:underline">
                Login Admin
            </a>
        </p>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="mt-4 bg-red-500/20 text-red-300 text-sm p-3 rounded-xl">
                {{ $errors->first() }}
            </div>
        @endif

    </div>

</div>

</body>
</html>
