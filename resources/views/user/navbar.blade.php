<nav class="navbar navbar-expand-lg" id="navbar">
  <div class="container d-flex">
    <div class="navbar-brand">
      <img class="logoimg" src="/img/LogoKabMalang.svg" alt="">
      <a class="logo" href="/">Desa Girimulyo</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto d-flex gap-lg-3">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        <li class="nav-item dropdown">
          <a class="nav-link {{ Request::is('profil/tentang','profil/lokasi', 'profil/galeri') ? 'active' : '' }} dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu dropdown-menu-danger">
            <li><a class="dropdown-item" href="/profil/tentang">Tentang Desa</a></li>
            <li><a class="dropdown-item" href="/profil/lokasi">Lokasi</a></li>
            <li><a class="dropdown-item" href="/profil/galeri">Galeri</a></li>
          </ul>
        </li>
        <a class="nav-link {{ Request::is('profil/umkm') ? 'active' : '' }}" href="/profil/umkm">UMKM</a>
        <a class="nav-link {{ Request::is('administrasi') ? 'active' : '' }}" href="/administrasi">Administrasi</a>
        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Kontak Kami</a>
      </div>
    </div>
  </div>
</nav> 