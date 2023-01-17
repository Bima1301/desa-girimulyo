@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Create New Post Berita</h1>
            
            <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                @csrf   
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus required value="{{old('tanggal')}}">
                  @error('tanggal')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="judul_berita" class="form-label">Judul</label>
                  <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="judul_berita" name="judul_berita" autofocus required value="{{old('judul_berita')}}">
                  @error('judul_berita')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Konten Berita</label>
                    <textarea id="summernote" class="form-control @error('judul_berita') is-invalid @enderror" rows="3" name="konten" required value="{{old('konten')}}"></textarea>
                    @error('konten')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Foto Berita (max 2mb)</label>
                  <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                  @error('file_path')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                  @enderror
              </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')