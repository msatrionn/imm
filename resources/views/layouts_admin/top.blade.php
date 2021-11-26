<div class="az-header">
    <div class="container">
        <div class="az-header-left">
            <a href="#" class="az-logo"><span style="color: red; text-transform: capitalize">IMM</span>
            </a>
            @if (auth()->user() != null)
            <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            @endif
        </div><!-- az-header-left -->
        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="#" class="az-logo"><span>IMM</span> </a>
                <a href="" class="close">&times;</a>
            </div><!-- az-header-menu-header -->
            @if (auth()->user() != null)
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="typcn typcn-home"></i>
                        Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>
                        Dashboard</a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('user.index') }}" class="nav-link"><i class="typcn typcn-user"></i>
                        User</a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('calon.index') }}" class="nav-link"><i class="typcn typcn-document"></i>
                        Calon</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pemilihan.index') }}" class="nav-link"><i
                            class="typcn typcn-chart-bar-outline"></i>
                        Pemilih</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('chart') }}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>
                        Grafik</a>
                </li>

            </ul>
            @endif
        </div><!-- az-header-menu -->
        <div class="az-header-right">

            <div class="dropdown az-profile-menu">
                <a href="" class="az-img-user"><img src="{{ asset('img/user.png') }}" alt="gambar"></a>
                <div class="dropdown-menu">
                    <div class="az-dropdown-header d-sm-none">
                        <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                    </div>
                    <div class="az-header-profile">
                        <div class="az-img-user">
                            <img src="{{ asset('img/user.png') }}" alt="gambar">
                        </div>
                        @if (auth()->user() != null )
                        <h6>{{auth()->user()->username }}</h6>
                        @endif
                        @if (auth()->user() !=null and auth()->user()->level=='admin')
                        <span>Admin Website</span>
                        @elseif(auth()->user() !=null)
                        <span>Anggota</span>
                        @endif
                    </div><!-- az-header-profile -->

                    {{-- <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                    <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a> --}}
                    @if (auth()->user() !=null )

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="typcn typcn-power-outline"></i> Sign
                            Out</button>
                    </form>
                    @endif
                </div><!-- dropdown-menu -->
            </div>
        </div><!-- az-header-right -->
    </div><!-- container -->
</div><!-- az-header -->
