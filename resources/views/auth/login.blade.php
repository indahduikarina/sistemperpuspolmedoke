<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-md animate-fade-in">
        <div class="mb-6 text-center">
            <div class="text-4xl font-extrabold text-indigo-600 mb-2">📚</div>
            <h2 class="text-2xl font-semibold text-gray-700">Login ke Perpustakaan</h2>
            <p class="text-sm text-gray-500">Masukkan email dan password Anda untuk masuk</p>
        </div>

        @if (session('error'))
            <div class="mb-4 text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-indigo-600">
                    <span class="ml-2 text-gray-600">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline">
                    Lupa password?
                </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Masuk
                </button>
            </div>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>
</html>
