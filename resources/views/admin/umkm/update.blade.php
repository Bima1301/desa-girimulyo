@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit UMKM</h1>
            <a href="/dashboard/umkm" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/umkm/{{$umkm->id}}" enctype="multipart/form-data">
              @method('put')
              @csrf   
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama Usaha</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  autofocus required value="{{old('nama',$umkm->nama )}}">
                  @error('nama')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus required value="{{old('alamat', $umkm->alamat)}}">
                      @error('alamat')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                      @enderror
              </div>
              <div class="mb-3">
                  <label for="formFile" class="form-label">Foto UMKM (max 2mb)</label>
                  <input type="hidden" name="oldImage" value="{{ $umkm->file_path }}">
                  <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                  @error('file_path')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"  name="deskripsi" required value="{{old('deskripsi', $umkm->deskripsi)}}"></textarea>
                  @error('deskripsi')
                    <p>{{ $message }}</p>
                  @enderror
              </div>
                <button type="submit" class="btn btn-primary">Edit UMKM</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')