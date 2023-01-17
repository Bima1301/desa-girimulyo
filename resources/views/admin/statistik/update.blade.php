@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Edit New Post</h1>
            <a href="/dashboard/statistik" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/statistik/{{$statistik->id}}">
              @method('put')
                @csrf   
                <div class="mb-3">
                  <label for="judul" class="form-label">Judul</label>
                  <input type="text" class="form-control @error('tanggal') is-invalid @enderror" id="judul" name="judul" autofocus required value="{{old('judul',$statistik->judul)}}">
                  @error('judul')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="total" class="form-label">Total</label>
                  <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="total" autofocus required value="{{old('total', $statistik->total)}}">
                  @error('total')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="subjudul" class="form-label">Subjudul</label>
                    <textarea class="form-control @error('subjudul') is-invalid @enderror" id="subjudul"  name="subjudul" required value="{{old('subjudul')}}">{{($statistik->subjudul)}}</textarea>
                    @error('subjudul')
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