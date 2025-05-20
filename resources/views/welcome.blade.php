<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MariSehat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Aug 08 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
     @include('layouts.dashboard-user.nav')
  </header>

  <main class="main">

    <!-- Slider Section -->
    <section id="slider" class="slider section dark-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">

          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>

          <div class="swiper-wrapper">
          @foreach ($berita->take(3) as $data)
            <div class="swiper-slide" style="background-image: url('{{ asset('storage/berita/' . $data->gambar) }}');">
              <div class="content">
                <h2><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->judul, 40) }}</a></h2>
                <p><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->deskripsi, 200) }}</a></p>
              </div>
            </div>
          @endforeach
         </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Slider Section -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2 class="text-center mb-3">Artikel Kesehatan Terkini</h2>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        @foreach ($berita->take(10) as $data)
            <div>{{ $data->kategori->nama_kategori }}</div>
        @endforeach
    </div>
    </div>


    <!-- Trending Category Section -->
    <section id="trending-category" class="trending-category section">

        <div class="container" data-aos="fade-up">
          <div class="row g-5">
            <div class="col-lg-4">
            @foreach ($berita->skip(8)->take(2) as $data)
              <div class="post-entry lg">
                <a href="{{ route('berita.detail', $data->id) }}">
                @if ($data->gambar)
                                <img src="{{ asset('storage/berita/' . $data->gambar) }}"
                                     alt="Gambar"
                                     class="img-fluid">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 200px; height: 150px;">
                                    Tidak ada gambar
                                </div>   
                            @endif
                </a>            
                <div class="post-meta">{{ $data->created_at->format('M jS \'y') }}</div>
                <h2><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->judul, 40) }}</a></h2>
                <p class="mb-4 d-block"><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->deskripsi, 300) }}</a></p>

                <div class="d-flex align-items-center author">
                  <div class="name">
                    <h3 class="m-0 p-0">Penulis : {{ $data->penulis }}</h3>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="col-lg-8">
    <div class="row g-5">

        {{-- Kolom pertama --}}
        <div class="col-lg-4 border-start custom-border">
            <div class="row">
                @foreach ($berita->take(5) as $data)
                    <div class="col-12 mb-4">
                        <div class="d-flex flex-column flex-md-row gap-3 align-items-start border-bottom pb-3">
                            <a href="{{ route('berita.detail', $data->id) }}">
                            @if ($data->gambar)
                                <img src="{{ asset('storage/berita/' . $data->gambar) }}"
                                     alt="Gambar"
                                     class="img-fluid"
                                     style="width: 200px; height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 200px; height: 150px;">
                                    Tidak ada gambar
                                </div>
                            @endif
                            </a>
                            <div>
                                <div class="text-muted small mb-1">
                                  <a href="{{ route('berita.detail', $data->id) }}">
                                    {{ $data->created_at->format('M jS \'y') }}<br>{{ \Illuminate\Support\Str::limit($data->kategori->nama_kategori, 50) }}
                                  </a>
                                </div>
                                <h5 class="mb-1">
                                    <a href="{{ route('berita.detail', $data->id) }}" class="text-decoration-none text-dark">
                                    {{ \Illuminate\Support\Str::limit($data->judul, 30) }}
                                    </a>
                                </h5>
                                <p class="mb-0"><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->deskripsi, 60) }}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Kolom kedua --}}
        <div class="col-lg-4 border-start custom-border">
            <div class="row">
            @foreach ($berita->skip(5)->take(5) as $data)
                    <div class="col-12 mb-4">
                        <div class="d-flex flex-column flex-md-row gap-3 align-items-start border-bottom pb-3">
                            <a href="{{ route('berita.detail', $data->id) }}">
                            @if ($data->gambar)
                                <img src="{{ asset('storage/berita/' . $data->gambar) }}"
                                     alt="Gambar"
                                     class="img-fluid"
                                     style="width: 200px; height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center"
                                     style="width: 200px; height: 150px;">
                                    Tidak ada gambar
                                </div>
                            @endif
                            </a>
                            <div>
                                <div class="text-muted small mb-1">
                                  <a href="{{ route('berita.detail', $data->id) }}">
                                    {{ $data->created_at->format('M jS \'y') }}<br>{{ \Illuminate\Support\Str::limit($data->kategori->nama_kategori, 50) }}
                                  </a>
                                </div>
                                <h5 class="mb-1">
                                    <a href="{{ route('berita.detail', $data->id) }}" class="text-decoration-none text-dark">
                                    {{ \Illuminate\Support\Str::limit($data->judul, 40) }}
                                    </a>
                                </h5>
                                <p class="mb-0"><a href="{{ route('berita.detail', $data->id) }}">{{ \Illuminate\Support\Str::limit($data->deskripsi, 60) }}</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Trending Section -->
        <div class="col-lg-4">
          <div class="trending">
              <h3>Trending</h3>
              <ul class="trending-post">
              @foreach ($berita->take(8) as $index => $data)
                <li>
                    <a href="{{ route('berita.detail', $data->id) }}">
                        <span class="number">{{ $index + 1 }}</span>
                        <h3>{{ \Illuminate\Support\Str::limit($data->judul, 50) }}</h3>
                        <span class="author">Penulis : {{ $data->penulis }}</span>
                    </a>
                </li>
              @endforeach
              </ul>
          </div>
        </div>

                </div> <!-- End Trending Section -->
              </div>
            </div>

          </div> <!-- End .row -->
        </div>

      </div>

    </section><!-- /Trending Category Section -->

    <!-- Culture Category Section -->
    <section id="culture-category" class="culture-category section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <div class="section-title-container d-flex align-items-center justify-content-between">
          <h2>Culture</h2>
          <p><a href="categories.html">See All Culture</a></p>
        </div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-md-9">

            <div class="d-lg-flex post-entry">
              <a href="blog-details.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                <h3><a href="blog-details.html">What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente, laudantium dolorum itaque libero eos deleniti?</p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">Wade Warren</h3>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="post-list border-bottom">
                  <a href="blog-details.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="blog-details.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                  <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                </div>

                <div class="post-list">
                  <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="blog-details.html">5 Great Startup Tips for Female Founders</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="post-list">
                  <a href="blog-details.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
                  <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                  <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">The Best Homemade Masks for Face (keep the Pimples Away)</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>

            <div class="post-list border-bottom">
              <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">•</span> <span>Jul 5th '22</span></div>
              <h2 class="mb-2"><a href="blog-details.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
              <span class="author mb-3 d-block">Jenny Wilson</span>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Culture Category Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">ZenBlog</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">ZenBlog</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>