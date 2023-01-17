@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit New Post</h1>
            <a href="/dashboard/struktur" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/struktur/{{$struktur->id}}">
              @method('put')
                @csrf   
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{old('nama',$struktur->nama)}}">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" autofocus required value="{{old('jabatan', $struktur->jabatan)}}">
                  @error('jabatan')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Post</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')