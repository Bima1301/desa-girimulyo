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
        <h1 class="mt-4">Table Struktur Desa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Profil Page / Tentang Desa</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <?php
                //     $dumb = 0;
                //     for ($x = 0; $x <= count($statistiks); $x++) {
                //     $dumb++;
                //     }
                // ?>
                     {{-- @if (count($statistiks) < 4) 
                        @endif --}}
                        <a href="/dashboard/struktur/create" class="btn btn-primary mb-3">Create new struktur</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($strukturs as $struk)
                            <tr>
                                <td> {{ $loop -> iteration }} </td>
                                <td> {{ $struk -> nama }} </td>
                                <td> {{ $struk -> jabatan }} </td>
                                <td class="gap-2">
                                    <a href="/dashboard/struktur/{{ $struk->id }}/edit  " class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/dashboard/struktur/{{ $struk->id }}" method="post" class="d-inline">
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
