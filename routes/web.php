<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ParamedisController;
use App\Http\Controllers\EvakuasiController;
use App\Http\Controllers\NavigasiController;
use App\Http\Controllers\PoskoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InputPelController;
use App\Http\Controllers\InputPengController;
use App\Http\Controllers\InfoSARController;
use App\Http\Controllers\InputAspekController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KumpulGiatController;
use App\Http\Controllers\KomunikasiController;
use App\Http\Controllers\KerjaTimController;
use App\Http\Controllers\VeriUserController;
use App\Http\Controllers\HalVeriController;
use App\Http\Controllers\HalNilaiController;
use App\Http\Controllers\HalGiatController;
use App\Http\Controllers\HalPelController;
use App\Http\Controllers\HalPengController;
use App\Http\Controllers\HalAspekController;
use App\Http\Controllers\HalKriteriaController;
use App\Http\Controllers\KriSoalController;
use App\Http\Controllers\KriUserController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\ProfMatcController;
use App\Http\Controllers\RankUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.about');
Route::get('/course', [CourseController::class, 'index'])->name('course.course');
Route::get('/founders', [FounderController::class, 'index'])->name('founder.founder');
Route::get('/activity', [ActivityController::class, 'index'])->name('activity.activity');
Route::get('/paramedis', [ParamedisController::class, 'index'])->name('knowledge.paramedis');
Route::get('/evakuasi', [EvakuasiController::class, 'index'])->name('knowledge.evakuasi');
Route::get('/navigasi', [NavigasiController::class, 'index'])->name('knowledge.navigasi');
Route::get('/posko-bencana', [PoskoController::class, 'index'])->name('knowledge.posko');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.contact');
Route::get('/inputPel', [InputPelController::class, 'index'])->name('inputUser.inputPel');
Route::get('/inputPeng', [InputPengController::class, 'index'])->name('inputUser.inputPeng');
Route::get('/inputAspek', [InputAspekController::class, 'index'])->name('aspek.inputAspek');
Route::get('/infoSAR', [InfoSARController::class, 'index'])->name('infoSAR.infoSAR');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/kumpulGiat', [KumpulGiatController::class, 'index'])->name('kumpulGiat.kumpulGiat');
Route::get('/komunikasi/{id}', [KomunikasiController::class, 'index'])->name('nilaiKerja.komunikasi');
Route::get('/kerjaTim/{id}', [KerjaTimController::class, 'index'])->name('nilaiKerja.kerjaTim');
Route::get('/veriUser', [VeriUserController::class, 'index'])->name('veriUser.veriUser');
Route::get('/halVeri', [HalVeriController::class, 'index'])->name('veriUser.halVeri');
Route::get('/halNilai', [HalNilaiController::class, 'index'])->name('nilaiKerja.halNilai');
Route::get('/halGiat', [HalGiatController::class, 'index'])->name('kumpulGiat.halGiat');
Route::get('/halPel', [HalPelController::class, 'index'])->name('inputUser.halPel');
Route::get('/halPeng', [HalPengController::class, 'index'])->name('inputUser.halPeng');
Route::get('/halAspek', [HalAspekController::class, 'index'])->name('aspek.halAspek');

Route::get('/halKriteria', [HalKriteriaController::class, 'index'])->name('kriteria.halKriteria');
Route::get('/kriSoal', [KriSoalController::class, 'index'])->name('kriteria.kriSoal');
Route::get('/kriUser', [KriUserController::class, 'index'])->name('kriteria.kriUser');

Route::get('/hitung', [HitungController::class, 'index'])->name('profMatc.hitung');
Route::get('/profMatc', [ProfMatcController::class, 'index'])->name('profMatc.profMatc');
Route::get('/rankUser', [RankUserController::class, 'index'])->name('profMatc.rankUser');

Route::post('/inputPel/store', [InputPelController::class, 'store'])->name('inputPel.store');
Route::delete('/halPel/{id}', [HalPelController::class, 'destroy'])->name('inputPelUser.destroy');
Route::get('/halPel/edit/{id}', [HalPelController::class, 'edit'])->name('inputPelUser.edit');
Route::post('/halPel/update/{id}', [HalPelController::class, 'update'])->name('inputPelUser.update');

Route::post('/inputPeng/store', [InputPengController::class, 'store'])->name('inputPeng.store');
Route::delete('/halPeng/{id}', [HalPengController::class, 'destroy'])->name('inputPengUser.destroy');
Route::get('/halPeng/edit/{id}', [HalPengController::class, 'edit'])->name('inputPengUser.edit');
Route::post('/halPeng/update/{id}', [HalPengController::class, 'update'])->name('inputPengUser.update');

Route::post('/kumpulGiat/store', [KumpulGiatController::class, 'store'])->name('kumpulGiat.store');
Route::delete('/halGiat/{id}', [HalGiatController::class, 'destroy'])->name('kumpulGiat.destroy');
Route::get('/halGiat/edit/{id}', [HalGiatController::class, 'edit'])->name('kumpulGiat.edit');
Route::post('/halGiat/update/{id}', [HalGiatController::class, 'update'])->name('kumpulGiat.update');

Route::post('/komunikasi/store/{id}', [KomunikasiController::class, 'store'])->name('komunikasi.store');
Route::post('/komunikasi/update/{id}', [KomunikasiController::class, 'update'])->name('komunikasi.update');
Route::post('/kerjaTim/store/{id}', [KerjaTimController::class, 'store'])->name('kerjaTim.store');
Route::post('/kerjaTim/update/{id}', [KerjaTimController::class, 'update'])->name('kerjaTim.update');

Route::post('/veriUser/store', [VeriUserController::class, 'store'])->name('veriUser.store');
Route::delete('/halVeri/{id}', [HalVeriController::class, 'destroy'])->name('veriUser.destroy');
Route::get('/halVeri/edit/{id}', [HalVeriController::class, 'edit'])->name('veriUser.edit');
Route::post('/halVeri/update/{id}', [HalVeriController::class, 'update'])->name('veriUser.update');

Route::post('/aspek/store', [InputAspekController::class, 'store'])->name('aspek.store');
Route::delete('/halAspek/{id}', [HalAspekController::class, 'destroy'])->name('aspek.destroy');
Route::get('/halAspek/edit/{id}', [HalAspekController::class, 'edit'])->name('aspek.edit');
Route::post('/halAspek/update/{id}', [HalAspekController::class, 'update'])->name('aspek.update');

Route::get('/info', function () {
    return view('infoSAR.infoSAR');
});

Route::get('l', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Khusus halaman kosong yang tak punya akses
Route::get('/komunikasi', [KomunikasiController::class, 'kosong']);
Route::get('/kerjaTim', [KerjaTimController::class, 'kosong']);
