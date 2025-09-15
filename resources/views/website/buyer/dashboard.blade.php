@extends('website.master')

@section('title', 'Dashboard Buyer')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success">
        Selamat datang, {{ Auth::user()->name }} 🎉
    </div>
    <h4>Dashboard Pembeli</h4>
    <p>Ini adalah halaman dashboard khusus pembeli.</p>
</div>
@endsection
