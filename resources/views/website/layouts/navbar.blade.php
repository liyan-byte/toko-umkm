<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Toko <span class="text-success">UMKMku</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk Populer</a>
                </li>
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control form-control-sm mr-sm-2" 
                           type="text" placeholder="Cari Produk" aria-label="Cari">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </ul>

            <ul class="navbar-nav ml-auto">
                {{-- Jika belum login sebagai buyer maupun seller --}}
                @guest('buyer')
                @guest('seller')
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user-plus fa-sm"></i> Daftar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-sign-in-alt"></i> Masuk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{ route('buyer.login') }}">Pembeli</a>
                            <a class="dropdown-item" href="{{ route('seller.login') }}">Penjual</a>
                        </div>
                    </li>
                @endguest
                @endguest

                {{-- Seller Login --}}
                @auth('seller')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('seller.dashboard') }}"><i class="fa fa-th"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('seller.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="fa fa-sign-out-alt"></i> Keluar
                            </button>
                        </form>
                    </li>
                @endauth

                {{-- Buyer Login --}}
                @auth('buyer')
                    <li class="nav-item">
                        <form action="{{ route('buyer.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">
                                <i class="fa fa-sign-out-alt"></i> Keluar
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
