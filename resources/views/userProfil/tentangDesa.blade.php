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
          <div class="tittle col text-white  mt-5">
            <p>Girimulyo > Profil > Tentang</p>
            <h1 class="fw-bold">Tentang Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  
{{-- AKHIR SECTION TITTLE PROFIL --}}

{{-- SECTION AWAL TENTANG DESA --}}

<section class="section-about">
  <div class="container mt-5">
    <div class="list-container row d-flex flex-lg-row flex-column flex-lg-nowrap">
      
      <div class="col-lg-7 col-12 d-flex flex-column">
        <div class="about">
          <div class="second-tittle text-start">
            <h3 class="tittle-kedua ms-1">Tentang Desa Girimulyo</h3>
            <img class="underline" src="/img/underline.svg" alt="">
          </div>
          <div class="paragraph">
            <p>Girimulyo adalah sebuah desa di wilayah Kecamatan Gedangan, Kabupaten Malang, Provinsi Jawa Timur. Girimulyo adalah sebuah yang merupakan pemekaran dari Desa Gedangan. Pemekaran Desa ini diprakarsai oleh Suliadi yang saat itu menjabat sebagai sekretaris Desa Gedangan. Sebagai Desa yang baru berdiri, kepemimpinan Desa Girimulyo dipegang oleh Pejabat Sementara, Sutinggal. Pilkades yang dilakukan pada tahun 2003 menetapkan Suliadi sebagai Kepala Desa pertama hingga 2013. Pada Pemli kedua yang diikuti oleh tiga calon kepala desa, yakni Misdi (Sumber Pucung), Senimin (Krajan) dan Kasiadi (Ciptomulyo), dimenangkan oleh Senimin. (src:wikipedia)</p>
          </div>
        </div>

        <div class="second-tittle text-start mt-4">
          <h3 class="tittle-kedua ms-1">Struktur Desa Girimulyo</h3>
          <img class="underline" src="/img/underline.svg" alt="">
        </div>

        <div style="background-image: url('{{ asset('storage/'. $last_img ->file_path) }}')" class="structure-img my-4"></div>
        <div class="structure-table my-3">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($struktur as $struk)
                <tr>
                  <th>{{ $loop -> iteration }}</th>
                  <td>{{ $struk->nama }}</td>
                  <td>{{ $struk->jabatan }}</td>
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