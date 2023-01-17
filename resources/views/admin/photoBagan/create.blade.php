@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')

<div class="container">
    <div class="row">
        <div class="col mt-3 mt-lg-5 ms-lg-5">
            <h1>Create Profil Kepala Desa</h1>
            <form action="/dashboard/bagandesa" method="post" enctype="multipart/form-data">
                <!-- Add CSRF Token -->
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"  autofocus required value="{{old('tanggal')}}">
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div> --}}
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Bagan (max 2mb)</label>
                    <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                    @error('file_path')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                    {{-- <div class="form-group">
                    <input type="file" name="file" required>
                    </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')
@include('admin.foot')