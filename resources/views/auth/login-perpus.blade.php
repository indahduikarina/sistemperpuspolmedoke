<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Perpustakaan</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login Perpustakaan</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.perpus') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Email:</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicons mail icon -->
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4 4-4-4m8-4l-4-4-4 4" />
                        </svg>
                    </span>
                    <input type="email" name="email" class="pl-10 w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" required autofocus>
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium">Password:</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicons lock icon -->
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.1 0 2 .9 2 2v4H10v-4c0-1.1.9-2 2-2zM6 11V9a6 6 0 1112 0v2" />
                        </svg>
                    </span>
                    <input type="password" name="password" class="pl-10 w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-300" required>
                </div>
            </div>

            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Lupa password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">
                Login
            </button>
        </form>
    </div>
</body>
</html>
