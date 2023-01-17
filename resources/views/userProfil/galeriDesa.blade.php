@include('user.head')
@include('user.navbar')

{{-- SECTION TITTLE PROFIL --}}
<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white mt-5">
            <p>Girimulyo > Profil > Galeri</p>
            <h1 class="fw-bold">Galeri Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL TENTANG DESA --}}

<section class="section-galery">
  <div class="container mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap mx-0">
      <div class="col-lg-7 col-12 d-flex flex-column">

        <h3 class="mt-5">Kegiatan</h3>
        <div class="row">
          <div class="col swiper activity-swiper pb-5 mt-3">
              <div class="swiper-wrapper">
                @foreach ($kegiatan as $keg)
                <div class="swiper-slide rounded-3">
                  <img
                  style="
                    height : 300px;
                    object-fit : cover;
                    object-position : center;
                  " class="w-100" src="{{ asset('storage/'. $keg ->file_path) }}" alt="">
                </div>
                  
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
          </div>
        </div>

        <h3 class="mt-5">Foto Perangkat Desa</h3>
        <div class="row">
          <div class="col swiper activity-swiper mt-3 mx-lg-0 mx-5">
              <div class="swiper-wrapper">
                @foreach ($perangkat as $per)
                <div class="swiper-slide">
                  <div class="card-perangkat">
                    <img src="{{ asset('storage/'. $per ->file_path) }}" alt="Foto Perangkat Desa">
                    <div class="description text-center">
                      <h6 class="mt-2">Nama : {{ $per -> nama }}</h5>
                      <h6>Jabatan : {{ $per->jabatan}}</h5>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
          </div>
        </div>
        <h3 class="mt-5">Photo Desa Girimulyo</h3>

        <div class="row">
          <div class="col swiper activity-swiper pb-5 mt-3">
              <div class="swiper-wrapper">
                @foreach ($photodesa as $des)
                <div></div>
                {{-- <div class="swiper-slide rounded-3" style="background-image: url('{{ asset('storage/'. $des ->file_path) }}')"></div> --}}
                <div class="swiper-slide rounded-3">
                  <img
                  style="
                    height : 200px;
                    width : 800px;
                    object-fit : cover;
                    object-position : center;
                  " class="w-100" src="{{ asset('storage/'. $des ->file_path) }}" alt="">
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
        spaceBetween: 20,
        loop: true,
        centeredSlides: true,
        grabCursor: true,
        // autoplay: {
        //     delay: 3000,
        //     disableOnInteraction: false,
        // },
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

        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            }
        }
    });
</script>