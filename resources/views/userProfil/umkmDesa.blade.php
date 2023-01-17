@include('user.head')
@include('user.navbar')

{{-- SECTION TITTLE PROFIL --}}
<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white mt-5">
            <p>Girimulyo > UMKM</p>
            <h1 class="fw-bold">UMKM Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL TENTANG DESA --}}

<section class="section-umkm">
  <div class="container-custom mx-0 p-0 mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap m-0">
      <div class="col-lg-7 col-12 d-flex flex-column px-0 mx-0">
        
        <div class="row m-0 w-100 px-5">
          <h3 class="mb-4">Pengertian UMKM Menurut Undang - Undang</h3>
          <p>Usaha mikro, kecil, dan menengah <span class="fw-bold">(UMKM)</span> merupakan salah satu praktik usaha populer di kalangan masyarakat. Banyaknya pegiat UMKM menjadikan sektor bisnis ini sebagai salah satu roda penggerak perekonomian negara. UMKM adalah kegiatan usaha atau bisnis yang dijalankan oleh individu, rumah tangga, maupun badan usaha kecil. Penggolongannya berdasarkan besaran omzet per tahun, jumlah kekayaan atau aset, dan jumlah karyawan yang dipekerjakan. <br> <br> Tidak semua usaha bisa dikategorikan sebagai UMKM, beberapa usaha digolongkan sebagai usaha besar sebab jumlah kekayaan bersih atau omzet per tahunnya lebih besar dari usaha menengah. Usaha-usaha besar tersebut meliputi usaha patungan, nasional milik negara atau swasta, serta asing yang beroperasi di wilayah Indonesia. Pengertian serta aturan lengkap terkait UMKM telah dirumuskan dalam Undang-Undang Nomor 20 Tahun 2008 tentang usaha, mikro, kecil, dan menengah.</p>
          <h3 class="mb-4">Profil UMKM Desa Girimulyo</h3>
          <div class="col-12 swiper activity-swiper p-2 mb-4">
            <div class="swiper-wrapper">
              @foreach ($umkm as $um)
                <div class="swiper-slide">
                  <div class="card-umkm d-flex flex-md-row flex-column">
                    <img src="{{ asset('storage/'. $um ->file_path) }}" alt="Foto UMKM">
                    <div class="description d-flex flex-column justify-content-center">
                      <h4 class="fw-bold" >{{ $um -> nama }}</h4>
                      <p>{{$um->deskripsi}}</p>
                      <p>Alamat : {{$um->alamat}}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div class="news col-lg-5 col-12 section-news d-flex flex-column align-items-center">
        @include('user.news')
      </div>

    </div>
  </div>
</section>

{{-- AKHIR SECTION TENTANG DESA --}}

@include('user/footer')
@include('user/foot')

<script>
    let swiper = new Swiper(".activity-swiper", {
        slidesPerView: 1,
        spaceBetween: 50,
        loop: true,
        centeredSlides: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        effect: "coverflow",
        coverflowEffect: {
            rotate: 40,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
    });
  </script>