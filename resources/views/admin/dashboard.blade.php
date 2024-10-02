@extends('layout.template')
@section('content')
    <h1 class="text-center font-bold text-3xl py-5">Dashboard</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
        <!-- Kartu Rusak Berat -->
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Rusak Berat
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 text-center">
                {{ $rb }}
            </p>
        </div>

        <!-- Kartu Rusak Sedang -->
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Rusak Sedang
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 text-center">
                {{ $rs }}
            </p>
        </div>

        <!-- Kartu Bagus -->
        <div
            class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Bagus
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 text-center">
                {{ $b }}
            </p>
        </div>
    </div>
@endsection
