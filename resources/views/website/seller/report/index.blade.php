@extends('website.seller.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📊 Laporan Penjualan</h4>
        </div>
        <div class="card-body">
            <p>Di sini kamu bisa melihat laporan transaksi dan penjualan toko.</p>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2025-09-13</td>
                        <td>Produk Contoh</td>
                        <td>3</td>
                        <td>Rp 150.000</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">Data laporan penjualan akan muncul di sini.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
