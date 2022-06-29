<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akuarium;
use App\Models\Kategori;

class AkuariumController extends Controller
{
    public function index(){ 

        $title = '';

        if (request('kategori')) {
            $kategori = Kategori::firstWhere('slug', request('kategori'));
            $title = ' dengan kategori ' . $kategori->nama_kategori;
        }

        return view('akuarium', [
            "title" => "Semua Ikan Akuarium" . $title,
            "active" => "akuarium",
            // "ikans" => Akuarium::all()
            "ikans" => Akuarium::latest()->filter(request(['search', 'kategori']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Akuarium $ikan){
        return view('single-akuarium', [
            "title" => "Detail Akuarium",
            "active" => "akuarium",
            "ikan" => $ikan,
            "logo" => "img/logo.jpeg"
        ]);
    }

}
