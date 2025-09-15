@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <a href="{{ route('landing') }}" class="text-xl font-bold text-green-600">UMKMku</a>
        <div>
            @auth
                <span class="mr-4 text-gray-700">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('buyer.login') }}" class="text-gray-700 hover:text-green-600 mr-4">Login</a>
                <a href="{{ route('buyer.register') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Register</a>
            @endauth
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="text-center py-16 bg-gradient-to-r from-green-400 to-green-600 text-white">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di UMKMku</h1>
        <p class="mb-6 text-lg">Temukan berbagai produk lokal terbaik dari para pelaku UMKM</p>
        <div>
            <a href="#" class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                Mulai Belanja
            </a>
            <a href="{{ route('seller.register') }}" class="ml-4 border border-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600">
                Daftar Jadi Penjual
            </a>
        </div>
    </section>

    {{-- Kategori Produk --}}
    <section class="max-w-6xl mx-auto py-12 px-6">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Kategori Produk</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Makanan --}}
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <img src="https://img.icons8.com/color/96/000000/meal.png" alt="Makanan" class="mx-auto mb-4">
                <h3 class="font-semibold text-lg mb-2">Makanan</h3>
                <p class="text-gray-600">Aneka kuliner khas lokal</p>
            </div>

            {{-- Minuman --}}
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <img src="https://img.icons8.com/color/96/000000/cocktail.png" alt="Minuman" class="mx-auto mb-4">
                <h3 class="font-semibold text-lg mb-2">Minuman</h3>
                <p class="text-gray-600">Segarkan harimu dengan produk lokal</p>
            </div>

            {{-- Pakaian --}}
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <img src="https://img.icons8.com/color/96/000000/t-shirt.png" alt="Pakaian" class="mx-auto mb-4">
                <h3 class="font-semibold text-lg mb-2">Pakaian</h3>
                <p class="text-gray-600">Produk fashion dari UMKM lokal</p>
            </div>

        </div>
    </section>
</div>
@endsection
