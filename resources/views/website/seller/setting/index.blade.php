@extends('website.seller.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Pengaturan Akun & Toko</h4>
        </div>
        <div class="card-body">
            {{-- Notifikasi sukses --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Form Update --}}
            <form action="{{ route('seller.setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- PROFIL --}}
                <h5 class="mt-3"><i class="fa fa-user"></i> Informasi Akun</h5>
                <div class="row mb-3">
                    <div class="col-md-3 text-center">
                        {{-- Foto Profil --}}
                        @if($user->profile_picture)
                            <img id="preview" src="{{ asset($user->profile_picture) }}" class="img-thumbnail rounded-circle" width="150">
                        @else
                            <img id="preview" src="{{ asset('default-avatar.png') }}" class="img-thumbnail rounded-circle" width="150">
                        @endif

                        <input type="file" name="profile_picture" class="form-control mt-2" accept="image/*" onchange="previewImage(event)">
                        @error('profile_picture')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>No. WhatsApp</label>
                            <input type="text" name="no_wa" value="{{ old('no_wa', $user->no_wa) }}" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- TOKO --}}
<h5 class="mt-4"><i class="fa fa-store"></i> Informasi Toko</h5>
<div class="mb-3">
    <label>Nama Toko</label>
    <input type="text" name="nama_toko" value="{{ old('nama_toko', $user->nama_toko) }}" class="form-control">
</div>
<div class="mb-3">
    <label>Alamat Toko</label>
    <textarea name="alamat_toko" class="form-control">{{ old('alamat_toko', $user->alamat_toko) }}</textarea>
</div>

{{-- Cover Toko --}}
<div class="mb-3">
    <label for="cover" class="form-label">Cover Toko</label>
    <input type="file" class="form-control" name="cover" id="cover">
    @if($user->cover)
        <img src="{{ asset($user->cover) }}" alt="Cover Toko" class="img-fluid mt-2" style="max-height:200px; object-fit:cover;">
    @endif
</div>


                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

{{-- Script Preview Foto --}}
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
