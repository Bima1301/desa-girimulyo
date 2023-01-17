@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')

<div class="container">
    <div class="row">
        <div class="col mt-3 mt-lg-5 ms-lg-5">
            <h1>Create Profil Kepala Desa</h1>
            <form action="/dashboard/profilKades" method="post" enctype="multipart/form-data">
                <!-- Add CSRF Token -->
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Kepala Desa</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                {{-- <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div> --}}
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto Kades (no background max 2mb)</label>
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

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Motto</label>
                        <input type="text" class="form-control" id="motto" name="motto" required>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@include('admin.footer')
@include('admin.foot')