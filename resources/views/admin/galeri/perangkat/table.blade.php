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
        <h1 class="mt-4">Tabel Perangkat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Profil Page / Galeri / Perangkat</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                    <a href="/dashboard/perangkat/create" class="btn btn-primary mb-3">Creat new post</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perangkats as $per)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $per -> nama }} </td>
                                <td> {{ $per -> jabatan }} </td>
                                <td><img style="height: 14%; width:14%; " src="{{ asset('storage/' . $per ->file_path) }}" alt=""> </td>
                                <td class="gap-2">
                                    <a href="/dashboard/perangkat/{{ $per->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/perangkat/{{ $per->id }}" method="post" class="d-inline">
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