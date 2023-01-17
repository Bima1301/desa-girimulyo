@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Create New Struktur</h1>
            <a href="/dashboard/struktur" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/struktur">
                @csrf   
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus required value="{{old('nama')}}">
                  @error('nama')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jabatan" class="form-label">Jabatan</label>
                  <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" autofocus required value="{{old('jabatan')}}">
                  @error('jabatan')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Struktur</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')