<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @if(Auth::user()->is_admin === 1)
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url ('/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="{{ route('kategori.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kategori Berita
                            </a>
                            <a class="nav-link" href="{{ route('berita.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Berita
                            </a>
                            <a class="nav-link" href="{{ route('sehat.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Berita Sehat
                            </a>
                            <a class="nav-link" href="{{ route('diet.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Wellness & Diet
                            </a>
                            <a class="nav-link" href="{{ route('konsultasi.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Konsultasi
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>