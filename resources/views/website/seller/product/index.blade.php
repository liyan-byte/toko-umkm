@extends('website.seller.layouts.app')
@section('title', 'Landing Page')

@section('content')
<div class="dashboard-section">
    <div class="container py-5">
        <div class="row">
            <!-- Konten Utama tanpa sidebar -->
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3">Daftar Produk</h1>
                    <a href="{{ route('seller.product.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-xs fa-plus"></i> Tambah Produk
                    </a>
                </div>

                <div class="row mt-3">
                    @foreach ($product as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            {{-- Gambar Produk --}}
                            <img class="card-img-top img-fluid"
                            src="{{ $item->images ? asset('uploads/'.$item->images) : asset('images/no-image.png') }}"
                            alt="{{ $item->name }}"
                            style="height:200px; object-fit:cover;">


                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-dark">{{ $item->name }}</h5>
                                <p class="card-text text-muted mb-3">
                                    {!! Str::limit($item->description, 70) !!}
                                </p>
                                <h6 class="text-primary fw-bold mb-3">@currency($item->price)</h6>
                                <div class="mt-auto d-flex justify-content-between">
                                    <a href="/seller/product/{{ $item->slug }}/edit" class="btn btn-sm btn-info">
                                        <i class="fa fa-pen"></i> Ubah
                                    </a>
                                    <form action="/seller/product/{{ $item->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                                type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="col-md-6 mx-auto">
                        <div class="d-flex justify-content-center">
                            {{ $product->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon:'success',
                title:'Berhasil',
                text:"{{ session()->get('success') }}",
            });
        </script>
    @endif
@endsection
