@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')


                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Selamat Datang, {{ auth()->user()->name }} </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </main>

@include('admin.footer')
@include('admin.foot')
