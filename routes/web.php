<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KhususController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AnamnesaController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\KesadaranController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\ManualBookController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TpermohonanController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\StatusPulangController;
use App\Http\Controllers\DaftarLayananController;


Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadmin')) {
            return redirect('superadmin');
        } elseif (Auth::user()->hasRole('pemohon')) {
            return redirect('pemohon');
        }
    }
    return redirect('/login');
});

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin', [HomeController::class, 'superadmin']);
    Route::get('superadmin/data/status-pulang', [StatusPulangController::class, 'index']);
    Route::get('superadmin/data/status-pulang/get', [StatusPulangController::class, 'getStatusPulang']);

    Route::get('superadmin/data/diagnosa', [DiagnosaController::class, 'index']);
    Route::get('superadmin/data/diagnosa/get', [DiagnosaController::class, 'getDiagnosa']);
    Route::get('superadmin/data/diagnosa/cari', [DiagnosaController::class, 'cari']);

    Route::get('superadmin/data/poli', [PoliController::class, 'index']);
    Route::get('superadmin/data/poli/get', [PoliController::class, 'getPoli']);
    Route::get('superadmin/data/dokter', [DokterController::class, 'index']);
    Route::get('superadmin/data/dokter/get', [DokterController::class, 'getDokter']);
    Route::get('superadmin/data/kesadaran', [KesadaranController::class, 'index']);
    Route::get('superadmin/data/kesadaran/get', [KesadaranController::class, 'getKesadaran']);
    Route::get('superadmin/data/provider', [ProviderController::class, 'index']);
    Route::get('superadmin/data/provider/get', [ProviderController::class, 'getProvider']);

    Route::get('superadmin/data/spesialis', [SpesialisController::class, 'index']);
    Route::get('superadmin/data/sarana', [SaranaController::class, 'index']);
    Route::get('superadmin/data/khusus', [KhususController::class, 'index']);
    Route::get('superadmin/data/tindakan', [TindakanController::class, 'index']);

    Route::get('superadmin/setting/akun-bridging', [SettingController::class, 'akunbridging']);
    Route::post('superadmin/setting/akun-bridging/development', [SettingController::class, 'development']);
    Route::get('superadmin/setting/akun-bridging/development/testing', [SettingController::class, 'developmentTesting']);
    Route::post('superadmin/setting/akun-bridging/production', [SettingController::class, 'production']);
    Route::get('superadmin/setting/gantipassword', [SettingController::class, 'gantipassword']);
    Route::get('superadmin/pasien', [PasienController::class, 'index']);
    Route::get('superadmin/pasien/add', [PasienController::class, 'add']);
    Route::post('superadmin/pasien/add', [PasienController::class, 'store']);
    Route::get('superadmin/pasien/cari', [PasienController::class, 'cari']);
    Route::get('superadmin/pasien/edit/{id}', [PasienController::class, 'edit']);
    Route::post('superadmin/pasien/edit/{id}', [PasienController::class, 'update']);
    Route::get('superadmin/pasien/delete/{id}', [PasienController::class, 'delete']);
    Route::get('superadmin/pasien/daftar/umum/{id}', [PasienController::class, 'daftarUmum']);
    Route::get('superadmin/pasien/daftar/bpjs/{id}', [PasienController::class, 'daftarBpjs']);

    Route::post('superadmin/pasien/daftar/umum/{id}', [PasienController::class, 'storeDaftarUmum']);
    Route::post('superadmin/pasien/daftar/bpjs/{id}', [PasienController::class, 'storeDaftarBpjs']);

    Route::get('superadmin/pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('superadmin/pendaftaran/filter', [PendaftaranController::class, 'filter']);
    Route::get('superadmin/pendaftaran/kepoli/{id}', [PendaftaranController::class, 'kepoli']);
    Route::get('superadmin/pendaftaran/delete/{id}', [PendaftaranController::class, 'delete']);

    Route::get('superadmin/pelayanan', [PelayananController::class, 'index']);
    Route::post('superadmin/pelayanan/getDiagnosa', [PelayananController::class, 'getDiagnosa']);
    Route::get('superadmin/pelayanan/filter', [PelayananController::class, 'filter']);
    Route::get('superadmin/pelayanan/periksa/{id}', [PelayananController::class, 'periksa']);
    Route::post('superadmin/pelayanan/periksa/{id}', [PelayananController::class, 'updateStatusPulang']);

    Route::get('superadmin/pelayanan/periksa/{id}/anamnesa', [AnamnesaController::class, 'index']);
    Route::post('superadmin/pelayanan/periksa/{id}/anamnesa', [AnamnesaController::class, 'store']);
    Route::post('superadmin/pelayanan/periksa/{id}/anamnesa/{id_anamnesa}/update', [AnamnesaController::class, 'update']);

    Route::get('superadmin/pelayanan/periksa/{id}/diagnosa', [DiagnosaController::class, 'indexD']);
    Route::post('superadmin/pelayanan/periksa/{id}/diagnosa', [DiagnosaController::class, 'storeD']);
    Route::get('superadmin/pelayanan/periksa/{id}/diagnosa/{id_diagnosa}/delete', [DiagnosaController::class, 'delete']);
    Route::get('superadmin/pelayanan/periksa/{id}/resep', [ResepController::class, 'index']);
    Route::post('superadmin/pelayanan/periksa/{id}/resep', [ResepController::class, 'store']);
    Route::get('superadmin/pelayanan/periksa/{id}/resep/{id_resep}/delete', [ResepController::class, 'delete']);
    Route::get('superadmin/pelayanan/periksa/{id}/tindakan', [TindakanController::class, 'indexD']);
    Route::post('superadmin/pelayanan/periksa/{id}/tindakan', [TindakanController::class, 'storeD']);
    Route::get('superadmin/pelayanan/periksa/{id}/tindakan/{id_tindakan}/delete', [TindakanController::class, 'deleteD']);
    Route::get('superadmin/pelayanan/periksa/{id}/laboratorium', [LaboratoriumController::class, 'index']);

    Route::get('superadmin/laporan/lb1', [LaporanController::class, 'lb1']);
    Route::get('superadmin/laporan/lb2', [LaporanController::class, 'lb2']);
    Route::get('superadmin/laporan/lb3', [LaporanController::class, 'lb3']);
    Route::get('superadmin/laporan/lb4', [LaporanController::class, 'lb4']);

    Route::get('superadmin/manajemen-obat/obat', [ObatController::class, 'index']);
    Route::get('superadmin/manajemen-obat/masuk', [ObatController::class, 'index']);
    Route::get('superadmin/manajemen-obat/keluar', [ObatController::class, 'index']);

    Route::get('superadmin/rekam-medis', [RekamMedisController::class, 'index']);
    Route::get('superadmin/rekam-medis/cari', [RekamMedisController::class, 'cari']);

    Route::get('superadmin/manualbook', [ManualBookController::class, 'index']);
    Route::get('superadmin/manualbook/create', [ManualBookController::class, 'create']);
    Route::post('superadmin/manualbook/create', [ManualBookController::class, 'store']);
    Route::get('superadmin/manualbook/edit/{id}', [ManualBookController::class, 'edit']);
    Route::post('superadmin/manualbook/edit/{id}', [ManualBookController::class, 'update']);
});
