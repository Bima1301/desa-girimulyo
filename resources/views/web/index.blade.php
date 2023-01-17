<?php 

$berita = $posts;
$indexData = count($berita) - 1;
$increment = 0;

?>

@include('user/head')
@include('user/navbar')

<a href="#inform" id="arrow-nav">
  <div class="arrow bounce">
    <i class="fa fa-arrow-down fa-2x" id="arrow-icon"></i>
  </div>
</a>

{{-- SECTION PERTAMA --}}

<div class="swiper hero-swiper">
  <div class="swiper-wrapper">
    @php $a=0 @endphp
    @foreach ($backgroundhero as $back)
    <div class="swiper-slide position-relative" id="hero"  style="background-image: url('{{ asset('storage/'. $back ->file_path) }}')">
      <div id="hero-gradient">

        @php
          $a++;
        @endphp
        <div class="container h-100">
          <div class="row w-100 h-100 mx-0">
            @if ($a == 1)
            <div class="col d-flex justify-content-center align-items-center">
              <div  class=" flex-lg-column">
                <div class=" flex-lg-column">
                  <h1 class="title text-white text-center" id="typeit">Selamat datang di Portal <br> Desa Girimulyo</h1>
                </div>
                <div class="sub text-white text-center">
                  <p class="subtittle fs-5 mb-0">Kec. Gedangan, Kab. Malang, Jawa Timur. Kodepos : 65178</p>
                  <p class="mb-0">Kode Kemendagri : 35.07.29.2008</p>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  {{-- Kerjain --}}
  <div class="swiper-button-next me-4"></div>
  <div class="swiper-button-prev ms-4"></div>
  <div class="swiper-pagination"></div>
</div>

{{-- AKHIR SECTION PERTAMA --}}

{{-- SECTION KEDUA INFORMASI --}}
<section class="section-inform" id="inform">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="second-title text-center" data-aos="fade-left">
          <h3 class="title-kedua">Acara Desa</h3>
          <img class="underline" src="img/underline.svg" alt="">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="cards-container d-flex flex-md-row flex-column flex-lg-nowrap flex-wrap gap-md-4 gap-5 justify-content-lg-between justify-content-md-center align-items-center my-4">
          <!-- Card -->
          @foreach ($acara as $acar)
          <div class="card-item" data-aos="zoom-in">
            <div class="card border noBorder" style="background-image: linear-gradient(#f5e09900, #F5DF99), url('{{ asset('storage/'. $acar ->file_path) }}')">
              <div class="description text-white">
                <h5 class="card-title">{{ $acar->judul }}</h5>
                <p class="card-text">{{ $acar->konten }}</p>
                <p class="card-text">Date : {!! $acar->tanggal !!}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
</section>
{{-- AKHIR SECTION KEDUA INFORMASI --}}

{{-- SECTION KETIGA BERITA --}}
<section class="section-news">
  <div class="container">
    <div class="list-container row d-flex flex-lg-row flex-column gap-3 gap-lg-0 mt-5">
      
      <div class="col-lg-7 col-12">
        <div class="second-title text-start" data-aos="fade-right">
          <h3 class="title-ketiga ms-3">Berita</h3>
          <img class="underline" src="img/underline.svg" alt="">
        </div>
        <div class="list-item" data-aos="fade-right">
          <ul class="list-group list-group-flush">
              @for ($indexData; $indexData >= 0; $indexData--) 
                @if ($increment == 5)
                  @break
                @endif
                <?php $increment++;  ?>
                <a class="text-decoration-none border-bottom border-1 border-dark" href="/home/posts/{{ $berita[$indexData]->id }}">
                  <li class="list-group-item border-0">
                    {{ $berita[$indexData]->judul_berita }} 
                  </li>
                </a>
              @endfor
          </ul>
        </div>
      </div>

      {{-- <div class="col-lg-5 col-12 d-flex justify-content-lg-end px-lg-4" data-aos="fade-down">
      </div> --}}
      <div class="col" data-aos="fade-down">
        @include('user/news')

      </div>

  </div>
</section>
{{-- AKHIR SECTION KETIGA BERITA --}}

{{-- AWAL SECTION KEEMPAT PROFIL --}}
<section class="section-profile">
  <div class="container-fluid mt-4 px-0">
    <div class="background-desa"></div>
    @if (empty($image_post))
        <h3 class="null text-center text-white">Data harus diisi dahulu</h3>
    @else
    <div class="row d-flex flex-nowrap flex-lg-row flex-column justify-content-lg-evenly align-items-lg-start align-items-center py-lg-0 py-4 gap-lg-0 gap-4 m-0  ">
      <div class="col-5">
        <div data-aos="zoom-out-left" class="d-flex justify-content-center">
          <img class="profile-pic" src="{{ asset('storage/' . $image_post ->file_path) }}" alt="">
          {{-- {{$image_post->file_path}} --}}
        </div>
      </div>
      <div class="col-lg-7 col align-self-lg-end mb-lg-5 px-lg-0 px-5">
        <div class="description" data-aos="zoom-out-down">
          <figure>
            <blockquote class="blockquote">
              <h2 class="text-white mb-2 mb-lg-4">"{{$image_post->motto}}"</h2>
            </blockquote>
            <figcaption class="blockquote-footer fw-bold m-0">
              {{$image_post->nama}}, Kepala Desa Girimulyo
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>
{{-- AKHIR SECTION KEEMPAT PROFIL --}}

{{-- AWAL SECTION KELIMA STATISTIK --}}
<section class="section-statistic" id="data">
  <div class="fifth-title text-center my-5" data-aos="fade-down">
    <h3 class="title m-0">Statistik</h3>
    <img class="underline" src="img/underline.svg" alt="">
  </div>
  <div class="items row d-flex flex-md-row flex-column flex-lg-nowrap flex-md-wrap justify-content-lg-evenly justify-content-md-center align-items-center m-0 gap-lg-0 gap-5">
    <?php $id = 0 ?>
    <?php foreach($statistik as $stat) { ?>
      <div class="item col-lg-2 col-md-4 col-5 rounded-4 p-4" data-aos="fade-in" id="counter-box">
        <div class="description d-flex flex-column justify-content-between align-items-center">
          <h5 class="text-center">{{ $stat->judul }}</h5>
          <p class="text-center"><span id=<?php echo "counter-$id" ?> class="counter" data-progress="stop" data-target="{{ $stat->total}}">0</span><br>{{ $stat->subjudul}}</p>
        </div>
      </div>
      <?php $id++ ?>
    <?php } ?>
  </div>
  <div class="row mx-0 mt-5 justify-content-evenly flex-lg-wrap gap-4 mx-3" data-aos="fade-down">
    <div class="col">
      <a href="/statistik/pekerjaan">
        <div class="card-stat bg-card rounded-3 d-flex align-items-center justify-content-center">
          <img src="/icons/ic-job.png">
          <h5 class="text-center m-0 me-2">Data Pekerjaan</h5> 
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/statistik/pendidikan">
        <div class="card-stat bg-card rounded-3 d-flex align-items-center justify-content-center">
          <img src="/icons/ic-edu.png">
          <h5 class="text-center m-0 me-2">Data Pendidikan</h5> 
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/statistik/ternak">
        <div class="card-stat bg-card rounded-3 d-flex align-items-center justify-content-center">
          <img src="/icons/ic-cattle.png">
          <h5 class="text-center m-0 me-2">Data Ternak</h5> 
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/statistik/usia">
        <div class="card-stat bg-card rounded-3 d-flex align-items-center justify-content-center">
          <img src="/icons/ic-age.png">
          <h5 class="text-center m-0 me-2">Data Usia</h5> 
        </div>
      </a>
    </div>
    <div class="col">
      <a href="/statistik/vaksinisasi">
        <div class="card-stat bg-card rounded-3 d-flex align-items-center justify-content-center">
          <img src="/icons/ic-vac.png">
          <h5 class="text-center m-0 me-2">Data Vaksin</h5> 
        </div>
      </a>
    </div>
  </div>


</section>
{{-- AKHIR SECTION KELIMA STATISTIK --}}

@include('user/footer')
@include('user/foot')

<script>
    let swiper = new Swiper(".hero-swiper", {
      slidesPerView: 1,
      spaceBetween: 0,
      loop: true,
      centeredSlides: true,
      // autoplay: {
      //     delay: 7000,
      //     disableOnInteraction: false,
      // },
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  });
</script>

<script>
  new TypeIt("#typeit", {
    speed:50,
    strings: [""],
  }).go();
</script>