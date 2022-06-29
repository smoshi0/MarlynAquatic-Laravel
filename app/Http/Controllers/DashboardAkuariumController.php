<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Akuarium;
use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class DashboardAkuariumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.akuarium.index', [
            'akuariums' => Akuarium::latest()->get(),
            'active' => 'akuarium',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.akuarium.create', [
            'kategoris' => Kategori::all(),
            'active' => 'akuarium'
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
            'nama_ikan' => 'required|max:255',
            'slug' => 'required|unique:akuaria',
            'kode_akuarium' => 'required|unique:akuaria',
            'jumlah_ikan' => 'required',
            'harga_ikan' => 'required',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gambar-ikan');
        }

        Akuarium::create($validatedData);

        return redirect('/dashboard/akuarium')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akuarium  $akuarium
     * @return \Illuminate\Http\Response
     */
    public function show(Akuarium $akuarium)
    {
        return view('dashboard.akuarium.show', [
            'akuarium' => $akuarium,
            'active' => 'akuarium'
        ]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akuarium  $akuarium
     * @return \Illuminate\Http\Response
     */
    public function edit(Akuarium $akuarium)
    {
        return view('dashboard.akuarium.edit', [
            'akuarium' => $akuarium,
            'kategoris' => Kategori::all(),
            'active' => 'akuarium'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akuarium  $akuarium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akuarium $akuarium)
    {
        $rules = [
            'nama_ikan' => 'required|max:255',
            'jumlah_ikan' => 'required',
            'harga_ikan' => 'required',
            'kategori_id' => 'required',
            'image' => 'image|file|max:1024'
        ];

        if($request->slug != $akuarium->slug){
            $rules['slug'] = 'required|unique:akuaria';
        }
        
        if($request->kode_akuarium != $akuarium->kode_akuarium){
            $rules['kode_akuarium'] = 'required|unique:akuaria';
        }
        
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('gambar-ikan');
        }

        Akuarium::where('id', $akuarium->id)->update($validatedData);

        return redirect('/dashboard/akuarium')->with('edit', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akuarium  $akuarium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akuarium $akuarium)
    {
        if($akuarium->image){
            Storage::delete($akuarium->image);
        }

        Akuarium::destroy($akuarium->id);

        return redirect('/dashboard/akuarium')->with('hapus', 'Data Berhasil Dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Akuarium::class, 'slug', $request->nama_ikan);
        return response()->json(['slug' => $slug]);
    }


    
    public function cetak_pdf(){    
        $a = Akuarium::all();
        $pdf = PDF::loadview('dashboard.akuarium.pdf', [
            'akuariums' => $a,
            'tanggal' => Carbon::now(),
            'active' => 'akuarium'
        ]);
        return $pdf->stream();
        }


    public function download_pdf(){    
        $a = Akuarium::all();
        $pdf = PDF::loadview('dashboard.akuarium.pdf', [
            'akuariums' => $a,
            'tanggal' => Carbon::now(),
            'active' => 'akuarium'
        ]);
        return $pdf->download('laporan-akuarium.pdf');
    }


}
