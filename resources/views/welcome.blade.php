<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <style rel="stylesheet">
        body {
            background-image: url('{{ asset('assets/image/sdn_1.png') }}');
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen mt-10">
        <div class="w-full max-w-lg p-8 space-y-6 bg-white rounded-lg shadow-lg">
            <img class="h-auto max-w-full mx-auto" src="{{ asset('/assets') }}/image/text_inventaris.png"
                alt="image description">

            {{-- <h2 class="text-2xl font-bold text-center text-gray-900">Login</h2> --}}
            <p class="text-1xl text-center text-gray-900">Silahkan masuk untuk menggunakan aplikasi</p>

            <!--alert-->
            <div>
                @if (session('message'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">{{ session('message') }}</span>
                    </div>
                @endif
                @if ($errors->has('errors'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">{{ $errors->first('errors') }}</span>
                    </div>
                @endif
            </div>
            <!-- end-alert-->

            <form class="space-y-4" action="/login" method="POST">
                @csrf
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                        class="block w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="nama pengguna" required>
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="block w-full p-2.5 border rounded-lg bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="kata sandi" required>
                </div>

                <button type="submit"
                    class="w-full px-5 py-2.5 text-center text-white bg-green-600 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300">MASUK</button>

                <p class="text-sm text-center text-gray-600">Don't have an account?
                    <a href="#" class="text-blue-600 hover:underline">Sign up here</a>
                </p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>
