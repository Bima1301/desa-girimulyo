@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
    <div class="container">
        <div class="row">
            <div class="col mx-lg-5 mt-lg-5 mt-3">
                <h1>{{$post->judul_berita}}</h1>
            </div>
            <div class="mt-1 ms-lg-5 ms-2">
                <a href="/dashboard/posts" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
                <a href="/dashboard/posts/{{ $post->id }}/edit  " class="btn btn-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Apakah yakin akan menghapus data?')">
                        <span data-feather="x-circle">Delete</span>
                    </button>
                    </form>
            </div>
        </div>
        <div>
            <img src="{{ asset('storage/' . $post ->file_path) }}" alt="">
        </div>
        <div class="row">
            <div class="col mx-lg-5 mt-lg-5 mt-3    ">
                {!! $post->konten !!}
            </div>
        </div>
    </div>
@include('admin.footer')
@include('admin.foot')