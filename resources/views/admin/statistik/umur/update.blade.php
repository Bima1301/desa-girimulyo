@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit Data Umur</h1>
            <a href="/dashboard/dataumur" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/dataumur/{{$dataumur->id}}">
                @method('put')
                @csrf   
                <div class="mb-3">
                  <label for="kelompok" class="form-label">Kelompok</label>
                  <input type="text" class="form-control @error('kelompok') is-invalid @enderror" id="kelompok" name="kelompok" autofocus required value="{{old('kelompok', $dataumur->kelompok)}}">
                  @error('kelompok')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jumlah" class="form-label">Jumlah</label>
                  <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" autofocus required value="{{old('jumlah',$dataumur->jumlah)}}">
                  @error('jumlah')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Data Umur</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')