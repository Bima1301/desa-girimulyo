@include('user.head')
@include('user.navbar')
<section class="section-blog">
    <div class="container">
        <div class="blogUser row">
            <div class="col mx-lg-5 mt-lg-5 mt-5">
                <h1 class="fw-bold mb-3">{{$posts['judul_berita']}}</h1>
                <p class="mb-3">{{$posts['tanggal']}}</p>
            </div>
            <div class="mt-1 ms-lg-5 ms-2">
                <a href="/" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to home</a>
            </div>
        </div>
        <div class="row px-lg-5 pb-lg-5 pt-3">
            <img class="p-0 m-0" src="{{ asset('storage/' . $posts ->file_path) }}" alt="Gambar Berita">
        </div>
        <div class="row">
            <div class="col mx-lg-5 mt-lg-5 mt-2">
                {!! $posts['konten'] !!}
            </div>
        </div>
    </div>
</section>
@include('user/footer')
@include('user/foot')