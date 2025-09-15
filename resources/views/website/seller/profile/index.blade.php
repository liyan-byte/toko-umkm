@extends('website.seller.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            {{-- Card Cover & Profil --}}
            <div class="card mb-4">
                @if($seller->cover)
                    <img src="{{ asset($seller->cover) }}" class="card-img-top" style="max-height: 250px; object-fit: cover;">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height:250px;">
                        <span>Belum ada cover toko</span>
                    </div>
                @endif
                <div class="card-body text-center">
                    <img src="{{ asset($seller->profile_picture ?? 'default.png') }}" 
                         alt="Foto Profil" class="rounded-circle mb-2" width="120" height="120">
                    <h3>{{ $seller->name }}</h3>
                    <p>{{ $seller->email }} | {{ $seller->whatsapp }}</p>
                    <p>{{ $seller->description }}</p>
                </div>
            </div>

            {{-- Card Form Update --}}
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Profil Saya</h5>
                </div>
                <div class="card-body">

                    {{-- Notifikasi sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form Update Profil --}}
                    <form action="{{ route('seller.profile.update') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" 
                                   value="{{ old('name', auth('seller')->user()->name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" 
                                   value="{{ old('email', auth('seller')->user()->email) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>No. UMKMku</label>
                            <input type="text" name="UMKMku" class="form-control" 
                                   value="{{ old('UMKMku', auth('seller')->user()->UMKMku) }}">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
