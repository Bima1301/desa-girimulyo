{{-- <?php 

$berita = $posts;
$indexData = count($berita) - 1;

?> --}}
@include('user.head')
@include('user.navbar')

{{-- SECTION TITTLE PROFIL --}}
<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white mt-5">
            <p>Girimulyo > Administrasi</p>
            <h1 class="fw-bold">Administrasi Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL ADMINISTRASI DESA --}}

<section class="section-about">
  <div class="container mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap">
      
      <div class="col-lg-7 col-12 d-flex flex-column">
        <div class="about">
          <div class="second-tittle text-start">
            <h3 class="tittle-kedua ms-1">Administrasi Desa Girimulyo</h3>
            <img class="underline" src="/img/underline.svg" alt="">
          </div>
          <div class="paragraph">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut blanditiis mollitia sapiente, animi totam expedita, sunt distinctio commodi itaque a ipsa repudiandae optio, provident eligendi laborum temporibus quod facere quam saepe reiciendis rem harum? Odio mollitia natus similique eius pariatur assumenda facere saepe, cumque velit in optio? Asperiores, ipsum ducimus?</p>
          </div>
        </div>

        <div class="structure-table my-3">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama file</th>
                <th scope="col">Link Download</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($filedesa as $des)
                <tr>
                  <th>{{ $loop -> iteration }}</th>
                  <td>{{ $des->nama }}</td>
                  <td> <a href="{{ $des->link }}"> Klik Disini</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="news col-lg-5 col-12 section-news d-flex flex-column">
        @include('user.news')
        @include('user.info')
      </div>

    </div>
  </div>
</section>

{{-- AKHIR SECTION TENTANG DESA --}}

@include('user/footer')
@include('user/foot')