@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit Kegiatan</h1>
            <a href="/dashboard/kegiatan" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/kegiatan/{{$kegiatan->id}}" enctype="multipart/form-data">
                @method('put')
                @csrf   
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"  autofocus required value="{{old('tanggal', $kegiatan->tanggal)}}">
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{old('nama', $kegiatan->nama)}}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kegiatan (max 2mb)</label>
                        <input type="hidden" name="oldImage" value="{{ $kegiatan->file_path }}">
                        <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                        @error('file_path')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Edit Kegiatan</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')