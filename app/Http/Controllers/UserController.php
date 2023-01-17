<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Backgroundhero;
use App\Models\Bagandesa;
use App\Models\Datapekerjaan;
use App\Models\Datapendidikan;
use App\Models\Dataternak;
use App\Models\Dataumur;
use App\Models\Datavaksin;
use App\Models\Filedesa;
use App\Models\Kegiatan;
use App\Models\Perangkat;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Photodesa;
use App\Models\Statistik;
use App\Models\Struktur;
use App\Models\Umkm;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'posts' => Post::all(),
            'photos' => Photo::all(),
            'statistik' => Statistik::all(),
            'acara' => Acara::all(),
            'struktur' => Struktur::all(),
            'backgroundhero' => Backgroundhero::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'latest_post' => Post::all()->last(),
            'image_post' => Photo::all()->last()
        ];
        // dd($data);
        return view('web.index', $data);
    }
    public function tentang()
    {
        $data = [
            'posts' => Post::all(),
            'struktur' => Struktur::all(),
            'bagandesa' => Bagandesa::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'latest_post' => Post::all()->last(),
            'last_img' => Bagandesa::all()->last()
        ];
        // dd($data);
        return view('userProfil.tentangDesa', $data);
    }
    public function tampil($id)
    {
        $data = [
            'posts' => Post::find($id)
        ];
        // dd(Post::find($id)['judul_berita']);
        return view('user.blog', $data);
        
    }   
    public function lokasi()
    {
        $data = [
            'posts' => Post::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.lokasiDesa', $data);
    }

    public function galeri()
    {
        $data = [
            'posts' => Post::all(),
            'kegiatan' => Kegiatan::all(),
            'perangkat' => Perangkat::all(),
            'photodesa' => Photodesa::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.galeriDesa', $data);
    }
    public function umkm()
    {
        $data = [
            'posts' => Post::all(),
            'umkm' => Umkm::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.umkmDesa', $data);
    }
    public function pekerjaan()
    {
        
        $dumb = Datapekerjaan::all();
        $kerja = [];
        foreach ($dumb as $key) {
            array_push($kerja,$key['kelompok']);
        }
        $jumlah = [];
        foreach ($dumb as $key) {
            array_push($jumlah,$key['jumlah']);
        }
        $data = [
            'datapekerjaan' => Datapekerjaan::all(),
            'latest_post' => Post::all()->last(),
            'data_kerja' => $kerja,
            'data_jumlah' => $jumlah
        ];
        

        // dd($data);
        return view('userProfil.pekerjaanDesa', $data);
    }
    public function vaksinisasi()
    {
        $data = [
            'datavaksin' => Datavaksin::all(),
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.vaksinisasiDesa', $data);
    }
    public function usia()
    {
        $data = [
            'dataumur' => Dataumur::all(),
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.usiaDesa', $data);
    }
    public function pendidikan()
    {
        $data = [
            'datapendidikan' => Datapendidikan::all(),
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.pendidikanDesa', $data);
    }
    public function ternak()
    {
        $data = [
            'dataternak' => Dataternak::all(),
            'latest_post' => Post::all()->last()
        ];
        // dd($data);
        return view('userProfil.ternakDesa', $data);
    }
    public function profil()
    {
        $data = [
            'photos' => Photo::all(),
            // 'latest_post' => Post::latest()->first()->get()
            'image_post' => Photo::all()->last()
        ];
        // dd($data);
        return view('web.index', $data);
    }
    public function administrasi()
    {
        $data = [
            'photos' => Photo::all(),
            'filedesa' => Filedesa::all(),
            'latest_post' => Post::all()->last()
            // 'image_post' => Photo::all()->last()
        ];
        // dd($data);
        return view('userProfil.administrasi', $data);
    }
    public function contact()
    {
        return view('user.contact');
    }

    
}
