<?php

namespace App\Http\Controllers;

use App\Models\Akuarium;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengiriman.index', [
            'pengirimans' => Pengiriman::latest()->get(),
            'active' => 'pengiriman'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengiriman.create', [
            'akuariums' => Akuarium::all(),
            'active' => 'pengiriman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'akuarium_id' => 'required',
            'jumlah_ikan' => 'required',
            'alamat_tujuan' => 'required',
            'tanggal_pengiriman' => 'required',
            'namaIkan' => 'required',
        ]);


        Pengiriman::create($validatedData);

        $akuarium_id = $request->input('akuarium_id'); //akuarium id yang diinputkan

        $jumlah_akuarium = Akuarium::Where('id', '=', $akuarium_id)->first(['jumlah_ikan'])->jumlah_ikan; //jumlah di tabel akuarium
        $jumlah_pengiriman = $request->input('jumlah_ikan'); //jumlah ikan yang diinputkan

        $kurang = ($jumlah_akuarium)-($jumlah_pengiriman);

        Akuarium::find($request->akuarium_id)->update([
            'jumlah_ikan' => $kurang,
        ]);

        return redirect('/dashboard/pengiriman')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        return view('dashboard.pengiriman.edit', [
            'pengiriman' => $pengiriman,
            'akuariums' => Akuarium::all(),
            'active' => 'pengiriman'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $rules = [
            'alamat_tujuan' => 'required',
            'tanggal_pengiriman' => 'required'
        ];

        $a = Pengiriman::Where('id', '=', $pengiriman->id)->first(['jumlah_ikan'])->jumlah_ikan; //jumlah di tabel pengiriman
        $b = $request->input('jumlah_ikan');
        $c = Akuarium::Where('id', '=', $pengiriman->akuarium_id)->first(['jumlah_ikan'])->jumlah_ikan; //jumlah di tabel akuarium

        if ($a<$b) {
            $x = $a+$c;
            Akuarium::find($request->akuarium_id)->update([
                'jumlah_ikan' => $x,
            ]);

            $y = Akuarium::Where('id', '=', $pengiriman->akuarium_id)->first(['jumlah_ikan'])->jumlah_ikan;
            $z = $y-$b;

            Akuarium::find($request->akuarium_id)->update([
                'jumlah_ikan' => $z,
            ]);

            $rules['jumlah_ikan'] = 'required';
        }

        if ($a>$b) {
            $x = $a+$c;
            Akuarium::find($request->akuarium_id)->update([
                'jumlah_ikan' => $x,
            ]);

            $y = Akuarium::Where('id', '=', $pengiriman->akuarium_id)->first(['jumlah_ikan'])->jumlah_ikan;
            $z = $y-$b;

            Akuarium::find($request->akuarium_id)->update([
                'jumlah_ikan' => $z,
            ]);

            $rules['jumlah_ikan'] = 'required';
        }

        $validatedData = $request->validate($rules);
        Pengiriman::where('id', $pengiriman->id)->update($validatedData);

        return redirect('/dashboard/pengiriman')->with('edit', 'Data Pengiriman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        Pengiriman::destroy($pengiriman->id);

        return redirect('/dashboard/pengiriman')->with('hapus', 'Data Berhasil Dihapus');
    }


    Public function batal(Pengiriman $pengiriman)
    {
        $a = Pengiriman::Where('id', '=', $pengiriman->id)->first(['jumlah_ikan'])->jumlah_ikan; //jumlah di tabel pengiriman
        $c = Akuarium::Where('id', '=', $pengiriman->akuarium_id)->first(['jumlah_ikan'])->jumlah_ikan; //jumlah di tabel akuarium
        $b = $a+$c;

        Akuarium::find($pengiriman->akuarium_id)->update([
            'jumlah_ikan' => $b,
        ]);

        Pengiriman::destroy($pengiriman->id);

        return redirect('/dashboard/pengiriman')->with('hapus', 'Pengiriman Berhasil Dibatalkan');
    }

    public function cetak_pdf(){    
        $a = Pengiriman::latest()->get();

        $pdf = PDF::loadview('dashboard.pengiriman.pdf', [
            'pengirimans' => $a,
            'tanggal' => Carbon::now(),
            'active' => 'pengiriman'
        ]);
	return $pdf->stream();
    }
    
    public function download_pdf(){    
        $a = Pengiriman::latest()->get();

        $pdf = PDF::loadview('dashboard.pengiriman.pdf', [
            'pengirimans' => $a,
            'tanggal' => Carbon::now(),
            'active' => 'pengiriman'
        ]);
        return $pdf->download('laporan-pengiriman.pdf');
    }
}
