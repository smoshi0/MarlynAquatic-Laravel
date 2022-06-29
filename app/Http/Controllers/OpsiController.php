<?php

namespace App\Http\Controllers;

use App\Models\Akuarium;
use App\Models\Kategori;
use Illuminate\Http\Request;

class OpsiController extends Controller
{
    public function tambah(Akuarium $akuarium)
    {
        return view('dashboard.akuarium.opsi.tambah', [
            'akuarium' => $akuarium,
            'active' => 'akuarium'
        ]);
    }

    public function tambahHasil(Request $request, Akuarium $akuarium){
        $rules = [
            'jumlah_ikan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        Akuarium::where('id', $akuarium->id)->update($validatedData);
        return redirect('/dashboard/akuarium');
    }

    public function kurang(Akuarium $akuarium)
    {
        return view('dashboard.akuarium.opsi.kurang', [
            'akuarium' => $akuarium,
            'active' => 'akuarium'
        ]);
    }

    public function kurangHasil(Request $request, Akuarium $akuarium){
        $rules = [
            'jumlah_ikan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        Akuarium::where('id', $akuarium->id)->update($validatedData);
        return redirect('/dashboard/akuarium');
    }

}
