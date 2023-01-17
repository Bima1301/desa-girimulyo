@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')

<main>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
    @endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Table Berita</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Home Page / Berita</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Creat new post</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Judul Berita</th>
                            <th>Konten</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $post -> tanggal }} </td>
                                <td> {{ $post -> judul_berita }} </td>
                                <td> 
                                    <?php 
                                    $str = htmlspecialchars(strip_tags($post -> konten)) ;
                                    // echo "<script> console.log($str); </script>";
                                    // echo "$str";

                                    if (strlen($str) > 50) 
                                           $str = substr($str, 0, 50) . '...';
                                    // echo "!! $str !!";
                                    ?>
                                    {!! $str !!}
                                </td>
                                <td class="gap-2">
                                    <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                    <a href="/dashboard/posts/{{ $post->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge btn-danger border-0" onclick="return confirm('Apakah yakin akan menghapus data?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@include('admin.footer')
@include('admin.foot')