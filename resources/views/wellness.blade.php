@extends('layouts.user')

@section('content')

    <!-- Page Title -->
    <div class="page-title">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
  <h3 class="mb-4">Kalkulator BMI (Body Mass Index)</h3>

  <!-- Gender -->
  <!-- Gender Pilihan -->
<div class="d-flex justify-content-center mb-3">
  <div class="form-check me-4 text-center">
    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
    <label class="form-check-label" for="male">
      <img src="https://img.icons8.com/ios-filled/100/000000/user-male-circle.png" width="60" /><br>
      <span class="fw-bold">Laki-laki</span>
    </label>
  </div>
  <div class="form-check text-center">
    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
    <label class="form-check-label" for="female">
      <img src="https://img.icons8.com/ios-filled/100/000000/user-female-circle.png" width="60" /><br>
      <span class="fw-bold">Perempuan</span>
    </label>
  </div>
</div>


  <!-- Form -->
  <form id="bmiForm" class="p-3 border rounded bg-light">
    <div class="mb-3">
      <label for="usia" class="form-label">Usia</label>
      <div class="input-group">
        <input type="number" id="usia" class="form-control" required>
        <span class="input-group-text">thn</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="berat" class="form-label">Berat Badan</label>
      <div class="input-group">
        <input type="number" id="berat" class="form-control" required>
        <span class="input-group-text">kg</span>
      </div>
    </div>
    <div class="mb-3">
      <label for="tinggi" class="form-label">Tinggi Badan</label>
      <div class="input-group">
        <input type="number" id="tinggi" class="form-control" required>
        <span class="input-group-text">cm</span>
      </div>
    </div>

    <div class="d-flex justify-content-between">
      <button type="reset" class="btn btn-outline-secondary w-50 me-2">Reset</button>
      <button type="submit" class="btn btn-success w-50">Hitung</button>
    </div>
  </form>

  <!-- Hasil -->
  <div id="hasilBmi" class="mt-4 p-4 border rounded" style="display:none; background-color:#f9f9f9;">
    <h4 class="fw-bold">Hasil BMI Anda</h4>
    <p class="fs-3 fw-bold" id="bmiValue" style="color: #2ecc71;"></p>
    <p id="kategoriBmi" class="mb-2 fw-semibold"></p>
    <div class="mb-3">
      <div class="d-flex justify-content-between small">
        <span><strong>BMI</strong></span><span><strong>Klasifikasi</strong></span>
      </div>
      <ul class="list-group list-group-flush small">
        <li class="list-group-item d-flex justify-content-between px-1"><span>< 18.5</span><span>Kurus</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>18.5 – 24.9</span><span>Normal</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>25 – 29.9</span><span>Gemuk</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>30 – 34.9</span><span>Obesitas 1</span></li>
        <li class="list-group-item d-flex justify-content-between px-1"><span>>= 35</span><span>Obesitas 2</span></li>
      </ul>
    </div>
    <div id="saranBmi" class="fw-semibold"></div>
  </div>
</div>
        
          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              @foreach ($diet->take(6) as $data)
                <div class="col-lg-6 col-md-6">
                  @if ($data->gambar)
                  <img src="{{ asset('storage/diet/' . $data->gambar) }}" alt="Gambar" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;">
                  @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 100%; height: 150px;">
                  Tidak ada gambar
                </div>
                @endif

          {{-- Judul dan deskripsi --}}
              <div class="mt-2">
                <h5 class="mb-1">{{ $data->judul }}</h5>
                  <p class="mb-0 text-muted" style="font-size: 14px;">
                    {{ Str::limit($data->deskripsi, 100) }}
                  </p>
                </div>
              </div>
            @endforeach
            </div>
          </div>

      </div>
    </section><!-- /About Section -->

    <!-- Team Section -->
    <!-- /Team Section -->
@endsection