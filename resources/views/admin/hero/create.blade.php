@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<div class="container">
    <div class="row">
        <div class="col mx-lg-5 mt-lg-5">
            <h1>Create New Background</h1>
            <a href="/dashboard/backgroundhero" class="btn btn-info text-decoration-none"><span data-feather="arrow-left"></span>Back to table</a>
            <form method="post" action="/dashboard/backgroundhero" enctype="multipart/form-data">
                @csrf   
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  autofocus required value="{{old('nama')}}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Background (max 10mb)</label>
                        <input class="form-control @error('file_path') is-invalid @enderror" type="file" name="file_path" required>
                        @error('file_path')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Create Background</button>
              </form>

        </div>
    </div>
</div>
@include('admin.footer')
@include('admin.foot')