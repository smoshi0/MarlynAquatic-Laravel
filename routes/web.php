<?php

use App\Models\Akuarium;
use App\Models\Kategori;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpsiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AkuariumController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DashboardAkuariumController;

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

Route::get('/', function () {
    return view('home', [
        'nama' => 'Marlyn Aquatic',
        'email' => 'marlynaquatic@gmail.com',
        'image' => '3.jpg',
        'title' => 'Home',
        'active' => 'home',
        'akuariums' => Akuarium::latest()->get()
    ]);
});



Route::get('/akuarium', [AkuariumController::class, 'index']);

Route::get('/akuarium/{ikan:slug}', [AkuariumController::class, 'show']);

Route::get('/kategoris', function(){
    return view('kategoris', [
        'title' => 'Kategori Ikan',
        'active' => 'kategori',
        'kategoris' => Kategori::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'active' => 'dashboard',
        'small' => Akuarium::Where('kategori_id', '=', 1)->count(),
        'medium' => Akuarium::Where('kategori_id', '=', 2)->count(),
        'big' => Akuarium::Where('kategori_id', '=', 3)->count(),
        'pengirimans' => Pengiriman::orderBy('tanggal_pengiriman', 'asc')->get()
    ]);
})->middleware('auth');

Route::get('/dashboard/akuarium/checkSlug', [DashboardAkuariumController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/akuarium', DashboardAkuariumController::class)->middleware('auth');


Route::get('/dashboard/akuarium/{akuarium:slug}/edit/tambahjumlah', [OpsiController::class, 'tambah'])->middleware('is_fish_manajer');
Route::patch('/dashboard/akuarium/{akuarium:slug}', [OpsiController::class, 'tambahHasil'])->middleware('is_fish_manajer');


Route::get('/dashboard/akuarium/{akuarium:slug}/edit/kurangjumlah', [OpsiController::class, 'kurang'])->middleware('is_fish_manajer');
Route::patch('/dashboard/akuarium/{akuarium:slug}', [OpsiController::class, 'kurangHasil'])->middleware('is_fish_manajer');

Route::get('/dashboard/pdf_akuarium', [DashboardAkuariumController::class, 'cetak_pdf'])->middleware('is_fish_manajer');
Route::get('/dashboard/download_akuarium', [DashboardAkuariumController::class, 'download_pdf'])->middleware('is_fish_manajer');


Route::resource('/dashboard/pengiriman', PengirimanController::class)->except('show')->middleware('is_courier');
Route::patch('/dashboard/pengiriman/{pengiriman:id}/edit/batal', [PengirimanController::class, 'batal'])->middleware('is_courier');

Route::get('/dashboard/pdf_pengiriman', [PengirimanController::class, 'cetak_pdf'])->middleware('is_courier');
Route::get('/dashboard/download_pengiriman', [PengirimanController::class, 'download_pdf'])->middleware('is_courier');


Route::resource('/dashboard/user', UserController::class)->except('show')->middleware('is_admin');