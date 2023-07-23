<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AppAbout,
    AppBeritaController,
    AppEduTipsController,
    AppEventController,
    AppWisataController,
    BeritaController,
    BukuTamuController,
    EventController,
    EventPenggunaController,
    HomeController,
    KategoriBeritaController,
    KategoriEventController,
    KategoriWisataController,
    PengaturanController,
    ProfileController,
    WisataController,
    ArtikelController,
    KategoriArtikelController,
    VirtualtourController,
    PenggunaController

};



// App/Guest
Route::get('/', [HomeController::class, 'index'])->name('app.index');


//pengguna
Route::post('/register-member', [PenggunaController::class,'storemember'])->name('register.member');
Route::post('/login-member', [PenggunaController::class,'loginmember'])->name('login.member');


// Blog
Route::get('/berita-media', [AppBeritaController::class, 'index'])->name('app-blog.index');
Route::get('/berita-media/detail/{hashids}', [AppBeritaController::class, 'show'])->name('app-blog.show');

// Wisata
Route::get('/destinasi-wisata', [AppWisataController::class, 'index'])->name('app-tour.index'); 
Route::get('/destinasi-wisata/detail/{hashids}', [AppWisataController::class, 'show'])->name('app-tour.show');


// virtual-view
Route::get('/virtual-view', [AppWisataController::class, 'virtualview'])->name('virtual-view.index'); 
Route::post('/get-rooms', [AppWisataController::class, 'getrooms'])->name('getrooms');


// Edukasi&Tips
Route::get('/artikel', [AppEduTipsController::class, 'index'])->name('app-edutips.index');
Route::get('/artikel/detail/{hashids}', [AppEduTipsController::class, 'show'])->name('app-edutips.show');

// Event
Route::get('/event', [AppEventController::class, 'index'])->name('app-event.index');
Route::get('/event/detail/{hashids}', [AppEventController::class, 'show'])->name('app-event.show');

// Tentang Kami
Route::get('/visi-misi', [AppAbout::class, 'vismis'])->name('vismis.index');
Route::get('/tugas-fungsi', [AppAbout::class, 'tupoksi'])->name('tupoksi.index');
Route::get('/struktur-organisasi', [AppAbout::class, 'struktur'])->name('struktur.index');
Route::get('/profil-pejabat', [AppAbout::class, 'profilPejabat'])->name('profilPejabat.index');

Route::resource('buku-tamu', BukuTamuController::class);







// Auth & Tamu
Route::middleware(['auth', 'can:tamu'])->group(function () {
    // Buku Tamu
    Route::post('/buku-tamu-older', [BukuTamuController::class, 'older'])->name('buku-tamu-older.store');
});

// Auth & Admin
Route::prefix('dashboard')->group(function () {
    Route::middleware(['auth', 'verified', 'can:admin'])->group(function () {
        Route::get('', [HomeController::class, 'dashboard'])->name('dashboard');
        // Menu Event & Pengunjung
        Route::resource('/acara', EventController::class);
        Route::resource('/kategori-acara', KategoriEventController::class);
        Route::resource('/pengunjung-acara', EventPenggunaController::class)->only('index');
        // Menu Berita
        Route::resource('/berita', BeritaController::class);
        Route::resource('/kategori-berita', KategoriBeritaController::class);
        // Menu Artikel
        Route::resource('/artikel', ArtikelController::class);
        Route::resource('/kategori-artikel', KategoriArtikelController::class);
        // Menu Wisata
        Route::resource('/wisata', WisataController::class);
        Route::resource('/kategori-wisata', KategoriWisataController::class);

        //virtual tour
         Route::get('/virtual-tour', [VirtualtourController::class, 'index'])->name('virtual.index');
         Route::get('/virtual-tour/create', [VirtualtourController::class, 'create'])->name('virtual.create');
         Route::post('/virtual-tour/save', [VirtualtourController::class, 'save'])->name('virtualroom.save');
         Route::post('/virtual-tour/room-image', [VirtualtourController::class, 'room_image'])->name('virtualroom.room_image');
         Route::post('/virtual-tour/first', [VirtualtourController::class, 'first'])->name('virtualroom.first');
        Route::post('/virtual-tour/simpan-marker', [VirtualtourController::class,'simpanmarker'])->name('virtualroom.simpanmarker');
        Route::post('/virtual-tour/list-marker', [VirtualtourController::class,'listmarker'])->name('virtualroom.listmarker');
        Route::post('/virtual-tour/hapus-marker', [VirtualtourController::class,'hapusmarker'])->name('virtualroom.hapusmarker');
        Route::post('/virtual-tour/get-data-vir', [VirtualtourController::class,'getdatavir'])->name('virtualroom.getdatavir');
        Route::post('/virtual-tour/get-data-game', [VirtualtourController::class,'getdatagame'])->name('virtualroom.getdatagame');
        Route::post('/virtual-tour/simpan-marker-edit', [VirtualtourController::class,'simpanmarkeredit'])->name('virtualroom.simpanmarkeredit');
        Route::post('/virtual-tour/delete-vir-roms', [VirtualtourController::class,'deletevr_rom'])->name('virtualroom.delete');
        Route::post('/virtual-tour/delete-marker-on-rooms', [VirtualtourController::class,'dlte_mar'])->name('virtualroom.dlte_mar');
        Route::post('/virtual-tour/from-def-long-lat', [VirtualtourController::class,'fromdeflonglat'])->name('virtualroom.fromdeflonglat');
        Route::get('/ajax-tbl-virtualtour',[VirtualtourController::class,'ajax_tbl_virtualtour'])->name('ajax_tbl_virtualtour');
          
        
        

        // Menu Pengaturan
        Route::resource('/pengaturan-website', PengaturanController::class);
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

require __DIR__ . '/auth.php';
