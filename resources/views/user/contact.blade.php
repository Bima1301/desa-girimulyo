@include('user.head')
@include('user.navbar')

<section id="hero-profil">
    <section id="hero-gradient" class="section d-flex justify-content-center align-items-center mb-5">
      <div class="container">
        <div class="row">
          <div class="tittle col text-white mt-5">
            <p>Girimulyo > Kontak Kami</p>
            <h1 class="fw-bold">Galeri Desa Girimulyo</h1>
          </div>
        </div>
      </div>
    </section>
</section>  

<div class="container">
    <div class="col w-100 h-100 mt-5">
        <div class="row text-center">
            <h2> Hubungi Kami :</h2>
            <a class="btn d-flex btn-info d-warning justify-content-between align-items-center gap-3 rounded-pill text-center mx-auto mt-4 bg-transparent" href="mailto:bima.aji1380@gmail.com"
            style="
            width: fit-content;
            padding: 10px 70px;
            border: 4px solid #4c8674" >
                <img src="icons/ic-mail.svg" alt="">
                <p class="mb-0 text-dark fs-3 ">Email Desa</p>
            </a>
            <a class="btn d-flex btn-info d-warning justify-content-between align-items-center gap-3 rounded-pill text-center mx-auto mt-4 bg-transparent" href="mailto:bima.aji1380@gmail.com"
            style="
            width: fit-content;
            padding: 10px 70px;
            border: 4px solid #4c8674" >
                <img src="icons/ic-phone.svg" alt="">
                <p class="mb-0 text-dark fs-3 ">WhatsApp / Telp.</p>
            </a>
        </div>
    </div>
</div>

@include('user/footer')
@include('user/foot')