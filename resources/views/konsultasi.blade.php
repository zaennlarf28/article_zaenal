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
          <section id="blog-details" class="blog-details section">
            <div class="container">

            <section class="konsultasi-section py-4 px-3" style="background-color: #e6f4f2; border-radius: 10px;">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h5 style="color: #009688; font-weight: bold;">Konsultasi</h5>
            <h2 style="color: #009688; font-weight: bold;">Konsultasikan masalah Anda<br>secara gratis di sini</h2>
            
            <form id="formKonsultasi" method="POST" class="mt-3">
                @csrf
                <div class="form-group mb-2">
                    <textarea name="pertanyaan" class="form-control" rows="3" placeholder="Tulis pertanyaan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="btn btn-warning text-white fw-bold">
                    Kirim Pertanyaan <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <div id="daftarPertanyaan" class="mt-4">
                <!-- Pertanyaan akan muncul di sini -->
            </div>
        </div>
        <div class="col-md-5 text-center">
            <img src="{{ asset('storage/konsultasi/icondr.jpeg') }}" alt="Ilustrasi Dokter" class="img-fluid" style="max-height: 220px;">
        </div>
    </div>
</section>



            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comments Section -->
          <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
          <h2>Dokter</h2>
          <p>Tanya dokter disini</p>
        </div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          @foreach ($konsultasi as $data)
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><a href="">
                           @if ($data->gambar)
                                <img src="{{ asset('storage/konsultasi/' . $data->gambar) }}"
                                     alt="Gambar"
                                     class="img-fluid">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 200px; height: 150px;">
                                    Tidak ada gambar
                                </div>   
                            @endif
                </a>       </div>
              <div class="member-info">
                <h4>{{$data->judul}}</h4>
                <span>{{$data->deskripsi}}</span>
              </div>
            </div>
          </div><!-- End Team Member -->
          @endforeach
        </div>

      </div>

    </section><!-- /Blog Comments Section -->

          

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Blog Author Widget -->
            <!--/Blog Author Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

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