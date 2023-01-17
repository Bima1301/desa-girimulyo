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
        <h1 class="mt-4">Table Data Umur</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Home Page / <a href="/dashboard/statistik">Statistik</a>  / Data Umur</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Data umur
            </div>
            <div class="card-body">
                <a href="/dashboard/dataumur/create" class="btn btn-primary mb-3">Creat new Umur</a>
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
                        @foreach ($dataumurs as $umur)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $umur -> kelompok }} </td>
                                <td> {{ $umur -> jumlah }} </td>
                                <td class="gap-2">
                                    <a href="/dashboard/dataumur/{{ $umur->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/dataumur/{{ $umur->id }}" method="post" class="d-inline">
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
