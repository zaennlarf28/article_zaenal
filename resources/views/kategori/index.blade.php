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
            <div class="container mt-5">
    <h1 class="text-center mb-4 fs-3">Admin Jenis Berita</h1>

    <div class="d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center fs-5">
                            <thead class="table-light">
                                <tr>
                                    <th colspan="3" class="text-start">
                                        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">+ Tambah</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th>Jenis Berita</th>
                                    <th style="width: 30%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($kategori as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_kategori }}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $data->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('kategori.show', $data->id) }}" class="btn btn-warning btn-sm">Show</a>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.panel-body -->
            </div> <!-- /.panel -->
        </div> <!-- /.col-lg-10 -->
    </div> <!-- /.d-flex -->
</div> <!-- /.container -->

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
