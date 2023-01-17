@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Create New File</h1>
            <a href="/dashboard/filedesa" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/filedesa" enctype="multipart/form-data">
                @csrf   
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama File</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  autofocus required value="{{old('nama')}}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link File</label>
                        <input class="form-control @error('link') is-invalid @enderror" type="text" name="link" required>
                        @error('link')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Create Link File Desa</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')