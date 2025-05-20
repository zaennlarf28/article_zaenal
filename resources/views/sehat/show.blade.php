<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset ('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @include('layouts.dashboard.nav')
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.dashboard.sidebar')
            </div>
            <div id="layoutSidenav_content">
            <main>
    <div class="container mt-5">
        <h2 class="text-center mb-4 fs-3">Detail Berita</h2>

        <div class="d-flex justify-content-center">
            <div class="col-lg-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th class="w-25">Judul Berita</th>
                                    <td>{{ $sehat->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $sehat->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td>{{ $sehat->penulis }}</td>
                                </tr>
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        @if ($sehat->gambar)
                                            <img src="{{ Storage::url('sehat/' . $sehat->gambar) }}" alt="Gambar Berita" 
                                                 class="img-thumbnail" style="width: 150px; height: auto;">
                                        @else
                                            <p class="text-muted">Tidak ada gambar</p>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <div class="text-end">
                                <a href="{{ route('sehat.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.panel-body -->
                </div> <!-- /.panel -->
            </div> <!-- /.col-lg-11 -->
        </div> <!-- /.d-flex -->
    </div> <!-- /.container -->
</main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset ('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset ('admin/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
