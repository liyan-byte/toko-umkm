@extends('website.seller.layouts.menu')

@section('title', 'Seller Dashboard')

@section('content')
    {{-- Hapus blok verifikasi email kalau tidak diperlukan --}}
    {{-- 
    @if (auth('seller')->user()->email_verified_at == null)
        <p class="alert alert-danger d-md-flex justify-content-between align-items-center">
            <span>Harap konfirmasi alamat email terlebih dahulu.</span>
            <a href="{{ route('seller.verification.resend') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-sm fa-sync"></i> Kirim Ulang Email
            </a>
        </p>
    @endif
    --}}

    <div class="container mt-4">
        <h1 class="h3 mb-4">Selamat Datang, {{ auth('seller')->user()->name }}</h1>

        <div class="row">
            <!-- Card Dashboard -->
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Produk</h5>
                        <p class="card-text">Kelola semua produkmu</p>
                        <a href="{{ route('seller.product') }}" class="btn btn-dark btn-sm">Lihat Produk</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laporan</h5>
                        <p class="card-text">Cek laporan penjualan</p>
                        <a href="{{ route('seller.report') }}" class="btn btn-dark btn-sm">Lihat Laporan</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pengaturan</h5>
                        <p class="card-text">Update profil & toko</p>
                        <a href="{{ route('seller.setting') }}" class="btn btn-dark btn-sm">Pengaturan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
