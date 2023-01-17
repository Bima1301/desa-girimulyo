@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit Acara</h1>
            <a href="/dashboard/acara" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/acara/{{$acara->id}}" enctype="multipart/form-data">
              @method('put')
                @csrf   
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus required value="{{old('tanggal',$acara->tanggal)}}">
                  @error('tanggal')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" autofocus required value="{{old('judul', $acara->judul)}}">
                  @error('judul')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Acara (max 2mb)</label>
                  <input type="hidden" name="oldImage" value="{{ $acara->file_path }}">
                  <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                  @error('file_path')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">konten</label>
                    <textarea class="form-control @error('konten') is-invalid @enderror" id="konten"  name="konten" required value="{{old('konten')}}">{{($acara->konten)}}</textarea>
                    @error('konten')
                        <p>{{ $message }}</p>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Edit Post</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')