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
        <h1 class="mt-4">Tabel UMKM</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">UMKM</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                    <a href="/dashboard/umkm/create" class="btn btn-primary mb-3">Creat new umkm</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Usaha</th>
                            <th>Deskripsi</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umkms as $umkm)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $umkm -> nama }} </td>
                                <td> {{ $umkm -> deskripsi }} </td>
                                <td> {{ $umkm -> alamat }} </td>
                                <td class="gap-2">
                                    <a href="/dashboard/umkm/{{ $umkm->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/umkm/{{ $umkm->id }}" method="post" class="d-inline">
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