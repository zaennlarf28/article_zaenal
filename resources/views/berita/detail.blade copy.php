@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Konten Utama -->
        <div class="col-lg-8">
            <img src="{{ asset('storage/berita/' . $data->gambar) }}" class="img-fluid rounded mb-4" style="max-height: 400px; object-fit: cover;">
            <h2 class="fw-bold">{{ $data->judul }}</h2>
            <div class="text-muted mb-3">
                <i class="bi bi-person"></i> Admin
                &nbsp;•&nbsp; <i class="bi bi-calendar"></i> {{ $data->created_at->format('M d, Y') }}
                &nbsp;•&nbsp; <i class="bi bi-chat-dots"></i> 12 Comments
            </div>
            <p style="text-align: justify;">{{ $data->deskripsi }}</p>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Profil Penulis -->
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://i.pravatar.cc/100?img=5" class="rounded-circle mb-2" width="80">
                    <h5 class="fw-bold mb-0">Jane Smith</h5>
                    <div class="text-muted small mb-2">
                        <i class="bi bi-facebook me-1"></i>
                        <i class="bi bi-instagram me-1"></i>
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <p class="small fst-italic">Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium.</p>
                </div>
            </div>

            <!-- Search -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-bold">Search</h5>
                    <form>
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>

            <!-- Recent Posts -->
            
        </div>
    </div>
</div>
@endsection
