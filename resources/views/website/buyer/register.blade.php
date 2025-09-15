@extends('website.master')

@section('title', 'Register Buyer')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-center">
                    <h4>Daftar sebagai Pembeli</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('buyer.register.store') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                   id="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password Confirmation --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   id="password_confirmation" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/') }}" class="btn btn-link">← Kembali</a>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-user-plus"></i> Daftar
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            Sudah punya akun? <a href="{{ route('buyer.login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
