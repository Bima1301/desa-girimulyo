@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit Data Ternak</h1>
            <a href="/dashboard/dataternak" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/dataternak/{{$dataternak->id}}">
                @method('put')
                @csrf   
                <div class="mb-3 mt-3">
                  <label for="jenis_ternak" class="form-label">Jenis Ternak</label>
                  <input type="text" class="form-control @error('jenis_ternak') is-invalid @enderror" id="jenis_ternak" name="jenis_ternak" autofocus required value="{{old('jenis_ternak',$dataternak->jenis_ternak)}}">
                  @error('jenis_ternak')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="jantan" class="form-label">Jantan</label>
                  <input type="text" class="form-control @error('jantan') is-invalid @enderror" id="jantan" name="jantan" autofocus required value="{{old('jantan',$dataternak->jantan)}}">
                  @error('jantan')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="betina" class="form-label">Betina</label>
                  <input type="text" class="form-control @error('betina') is-invalid @enderror" id="betina" name="betina" autofocus required value="{{old('betina',$dataternak->betina)}}">
                  @error('betina')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="total" class="form-label">Total</label>
                  <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="total" autofocus required value="{{old('total',$dataternak->total)}}">
                  @error('total')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit Data Ternak</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')