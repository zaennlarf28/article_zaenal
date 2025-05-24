@extends('layouts.user')

@section('content')

    <!-- Page Title -->
    <div class="page-title">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Single Post</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">Single Post</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
           <section class="konsultasi-section py-4 px-3" style="background-color: #e6f4f2; border-radius: 10px;">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h5 style="color: #009688; font-weight: bold;">Konsultasi</h5>
                <h2 style="color: #009688; font-weight: bold;">Konsultasikan masalah Anda<br>secara gratis di sini</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('pertanyaan.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <textarea name="pertanyaan" class="form-control" rows="3" placeholder="Tulis pertanyaan Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning text-white fw-bold">
                        Kirim Pertanyaan <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/konsultasi/icondr.jpeg') }}" alt="Ilustrasi Dokter" class="img-fluid" style="max-height: 220px;">
            </div>
        </div>
    </section>

    {{-- DAFTAR PERTANYAAN --}}
    <h2 class="mt-5">Daftar Pertanyaan</h2>

    @foreach ($pertanyaan as $data)
        <div class="card my-3">
            <div class="card-body">
                <h5>Pertanyaan dari: {{ $data->user_name ?? 'User' }}</h5>
                <data>{{ $data->pertanyaan }}</data>

                @if ($data->jawaban)
                    <div class="alert alert-success">
                        <strong>Jawaban:</strong> {{ $data->jawaban }}
                    </div>
                @else
                    {{-- Form Jawaban Admin --}}
                    @if(auth()->user() && auth()->user()->is_admin)
                        <form action="{{ route('pertanyaan.jawab', $data->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="jawaban" class="form-control" placeholder="Tulis jawaban..." required></textarea>
                            </div>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
          <!-- /Blog Details Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Blog Author Widget -->
            <!--/Blog Author Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">
               
              <h3 class="widget-title">Dokter</h3>
              @foreach ($konsultasi as $data)
              <div class="post-item">
                <a href="{{ route('konsultasi.detail', $data->id) }}">
                  @if ($data->gambar)
                  <img src="{{ asset('storage/konsultasi/' . $data->gambar) }}"
                                     alt="Gambar"
                                     class="flex-shrink-0">
                  @else
                  <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 200px; height: 150px;">
                                    Tidak ada gambar
                  </div>   
                  @endif
                </a>
                <div>
                  <h4><a href="">{{$data->judul}}</a></h4>
                  <time datetime="2020-01-01">{{$data->deskripsi}}</time>
                  <p><a href="https://instagram.com/{{ $data->penulis }}" target="_blank">Contact : <i class="fab fa-instagram"></i></a></p>
                </div>
              </div><!-- End recent post item-->
              @endforeach
            </div><!--/Recent Posts Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>

@endsection