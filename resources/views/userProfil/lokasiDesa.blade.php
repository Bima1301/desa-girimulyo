@include('user.head')
@include('user.navbar')

{{-- SECTION TITTLE PROFIL --}}
<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white mt-5">
            <p>Girimulyo > Profil > Lokasi</p>
            <h1 class="fw-bold">Lokasi Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL TENTANG DESA --}}

<section class="section-location">
  <div class="container mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap">
      
      <div class="col-lg-7 col-12 d-flex flex-column">
        <div class="location-img">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31364.772894372945!2d112.61419377603404!3d-8.31606345339584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd61d5b2a98facf%3A0xbff2e909e902efaf!2sGirimulyo%2C%20Gedangan%2C%20Kabupaten%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1659415137259!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="about my-4">
          <div class="description ms-3">
            <p>Desa Girimulyo terdiri dari 4 dusun yaitu :</p>
            <ol>
              <li>Dusun Krajan</li>
              <li>Dusun Paguta</li>
              <li>Dusun Sumber Pucung</li>
              <li>Dusun Ciptomulyo</li>
            </ol>
            <p>Batas-batas Desa Girimulyo terdiri dari :</p>
            <ul>
              <li><span class="fw-bold">Utara: </span> Dusun Krajan Kidul, Desa Gedangan</li>
              <li><span class="fw-bold">Barat: </span>Dudun Sumber Prekul, Desa Gedangan</li>
              <li><span class="fw-bold">Selatan: </span>Dusun Krajan, Desa Sindurejo</li>
              <li><span class="fw-bold">Timur: </span>Dusun Krajan Kidul, Desa Gedangan</li>
            </ul>
          </div>
        </div>

      </div>

      <div class="news col-lg-5 col-12 section-news d-flex flex-column align-items-center">
        @include('user.news')
        @include('user.info')
      </div>

    </div>
  </div>
</section>

{{-- AKHIR SECTION TENTANG DESA --}}

@include('user/footer')
@include('user/foot')