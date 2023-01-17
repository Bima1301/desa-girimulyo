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
        <h1 class="mt-4">Table Data Pekerjaan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Home Page / <a href="/dashboard/statistik">Statistik</a>  / Data Pekerjaan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Data Pekerjaan
            </div>
            <div class="card-body">
                <a href="/dashboard/datapekerjaan/create" class="btn btn-primary mb-3">Creat new pekerjaan</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kelompok</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapekerjaans as $kerja)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $kerja -> kelompok }} </td>
                                <td> {{ $kerja -> jumlah }} </td>
                                <td class="gap-2">
                                    <a href="/dashboard/datapekerjaan/{{ $kerja->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/datapekerjaan/{{ $kerja->id }}" method="post" class="d-inline">
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
