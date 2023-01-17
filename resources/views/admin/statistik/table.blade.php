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
        <h1 class="mt-4">Table Statistik</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Home Page / Statistik</li>
        </ol>
        <div class="d-flex justify-content-start gap-3">
            <a href="/dashboard/datapekerjaan" class="btn btn-warning mb-3">Tambah Data Pekerjaan</a>
            <a href="/dashboard/datapendidikan" class="btn btn-info mb-3">Tambah Data Pendidikan</a>
            <a href="/dashboard/dataumur" class="btn btn-warning mb-3">Tambah Data Umur</a>
            <a href="/dashboard/dataternak" class="btn btn-info mb-3">Tambah Data Ternak</a>
            <a href="/dashboard/datavaksin" class="btn btn-warning mb-3">Tambah Data Vaksin</a>

        </div>
        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Data Statistik Umum
            </div>
            <div class="card-body">
                <?php
                    $dumb = 0;
                    for ($x = 0; $x <= count($statistiks); $x++) {
                    $dumb++;
                    }
                ?>
                    @if (count($statistiks) < 4) 
                        <a href="/dashboard/statistik/create" class="btn btn-primary mb-3">Creat new statistik</a>
                    @endif

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Total</th>
                            <th>Subjudul</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statistiks as $stat)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $stat -> judul }} </td>
                                <td> {{ $stat -> total }} </td>
                                <td> {{ $stat -> subjudul }} </td>
                                <td> 
                                </td>
                                <td class="gap-2">
                                    <a href="/dashboard/statistik/{{ $stat->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
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
