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
        <h1 class="mt-4">Tabel Acara</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Home Page / Acara</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <?php
                    $dumb = 0;
                    for ($x = 0; $x <= count($acaras); $x++) {
                    $dumb++;
                    }
                ?>
                    @if (count($acaras) < 3) 
                        <a href="/dashboard/acara/create" class="btn btn-primary mb-3">Creat new post</a>
                    @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Konten</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acaras as $acar)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $acar -> tanggal }} </td>
                                <td> {{ $acar -> judul }} </td>
                                <td> {{ $acar -> konten }} </td>
                                <td class="gap-2">
                                    <a href="/dashboard/acara/{{ $acar->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/acara/{{ $acar->id }}" method="post" class="d-inline">
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