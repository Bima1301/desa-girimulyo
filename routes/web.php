<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\BackgroundheroController;
use App\Http\Controllers\BagandesaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DatapekerjaanController;
use App\Http\Controllers\DatapendidikanController;
use App\Http\Controllers\DataumurController;
use App\Http\Controllers\DataternakController;
use App\Http\Controllers\DatavaksinController;
use App\Http\Controllers\FiledesaController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\PhotodesaController;
use App\Models\Backgroundhero;
use App\Models\Photodesa;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* User */

Route::get('/generate', function (){

    \Illuminate\Support\Facades\Artisan::call('storage:link');

    echo 'ok';
});

Route::get('/', function () {
    return view('web.index');
});



// Route::get('/dashboardAdmin', function () {
//     return view('web.loginAdmin');
// });

// Route::get('/dashboard', function () {
//     return view('web.indexAdmin');
// });



// Route::get('/registerAdmin', function () {
//     return view('web.registerAdmin');
// });

// DASHBOARD ROUTE
Route::get('/login', [LoginController::class, 'indexLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/logoutreg', [LoginController::class, 'logoutreg']);

Route::get('/registerAdminGirimulyoKKN34', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registerAdminGirimulyoKKN34', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('web.indexAdmin');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/profilKades', PhotoController::class)->middleware('auth');
Route::resource('/dashboard/statistik',StatistikController::class)->middleware('auth');
Route::resource('/dashboard/acara',AcaraController::class)->middleware('auth');
Route::resource('/dashboard/struktur',StrukturController::class)->middleware('auth');
Route::resource('/dashboard/kegiatan',KegiatanController::class)->middleware('auth');
Route::resource('/dashboard/umkm',UmkmController::class)->middleware('auth');
Route::resource('/dashboard/datapekerjaan',DatapekerjaanController::class)->middleware('auth');
Route::resource('/dashboard/datapendidikan',DatapendidikanController::class)->middleware('auth');
Route::resource('/dashboard/dataumur',DataumurController::class)->middleware('auth');
Route::resource('/dashboard/dataternak',DataternakController::class)->middleware('auth');
Route::resource('/dashboard/datavaksin',DatavaksinController::class)->middleware('auth');
Route::resource('/dashboard/perangkat',PerangkatController::class)->middleware('auth');
Route::resource('/dashboard/photodesa',PhotodesaController::class)->middleware('auth');
Route::resource('/dashboard/filedesa',FiledesaController::class)->middleware('auth');
Route::resource('/dashboard/backgroundhero',BackgroundheroController::class)->middleware('auth');
Route::resource('/dashboard/bagandesa',BagandesaController::class)->middleware('auth');
// Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('auth');

// Route::get('/dashboard/filedesas/{uuid}/download', 'FiledesaController@download')->name('filedesas.download');

Route::get('/', [UserController::class, 'index']);
// AKHIR DASHBOARD ROUTE

// USER ROUTE
// Route::get('/profil/tentang', function () {
//     return view('userProfil.tentangDesa');
// });

Route::get('/profil/tentang', [UserController::class, 'tentang']);

Route::get('/profil/lokasi', [UserController::class, 'lokasi']);

Route::get('/profil/galeri', [UserController::class, 'galeri']);

Route::get('/profil/umkm', [UserController::class, 'umkm']);

Route::get('/administrasi', [UserController::class, 'administrasi']);

Route::get('/contact', [UserController::class, 'contact']);

Route::get('/statistik/pekerjaan', [UserController::class, 'pekerjaan']);

Route::get('/statistik/vaksinisasi', [UserController::class, 'vaksinisasi']);

Route::get('/statistik/usia', [UserController::class, 'usia']);

Route::get('/statistik/pendidikan', [UserController::class, 'pendidikan']);

Route::get('/statistik/ternak', [UserController::class, 'ternak']);

Route::get('/home/posts/{id}', [UserController::class, 'tampil']);


Route::get('/home/profilKades', [UserController::class, 'profil']);



Route::resource('/photo/kades', PhotoController::class);

// Route::get('/profil/lokasi', function () {
//     return view('userProfil.lokasiDesa');
// });



// AKHIR USER ROUTE

// Route::post('/dashboard', function () {
//     return view('admin.dashboard', ["id" => 'Admin']);
// });

