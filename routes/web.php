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
Route::get('/profile/member', [PenggunaController::class,'profilemember'])->name('profile.member');
Route::post('/upload/member', [PenggunaController::class,'uploadmember'])->name('upload.member');
Route::post('/member/Logout', [PenggunaController::class,'memberLogout'])->name('member.Logout');
Route::post('/edit/member', [PenggunaController::class,'editmember'])->name('edit.member');
Route::get('ajax-tbl-Eventr', [PenggunaController::class,'ajax_tbl_Event'])->name('ajax_tbl_Event');
Route::post('/proses-event', [EventPenggunaController::class,'prosesevent'])->name('proses.event');
Route::get('ajax-tbl-wisata', [PenggunaController::class,'ajax_tbl_wisata'])->name('ajax_tbl_wisata');
Route::post('proses-simpan-wisata', [PenggunaController::class,'prosessimpanwisata'])->name('proses.simpan.wisata');
Route::post('proses-hapus-wisata', [PenggunaController::class,'proseshapuswisata'])->name('proses.hapus.wisata');
Route::get('/ajax-tbl-KatagoriVirtual-memer', [PenggunaController::class,'ajax_tbl_KatagoriVirtual_memer'])->name('ajax_tbl_KatagoriVirtual_memer');
Route::post('/katagori_vr-member-save', [PenggunaController::class,'katagori_vrmembersave'])->name('katagori_vr.member.save');
Route::post('/virtualroomkat-member-delete', [PenggunaController::class,'virtualroomkat_memberdelete'])->name('virtualroomkat_member.delete');
Route::get('/ajax-tbl-virtualtour',[PenggunaController::class,'ajax_tbl_virtualtour_member'])->name('ajax_tbl_virtualtour_member');
Route::post('/image-vrmember-save', [PenggunaController::class,'image_vrmembersave'])->name('image_vr.member.save');
Route::post('/virtualroom-member-delete', [PenggunaController::class,'virtualroommemberdelete'])->name('virtualroommember.delete');







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
Route::post('/event/join', [AppEventController::class, 'joinevent'])->name('join.event');





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
        Route::post('/hpus-acara', [EventController::class, 'hapusacara'])->name('hapusacara');


        Route::get('/ajax_tbl_event', [EventController::class,'ajax_tbl_event'])->name('ajax_tbl_event');
        
        
        Route::resource('/kategori-acara', KategoriEventController::class);
        Route::resource('/pengunjung-acara', EventPenggunaController::class)->only('index');
        Route::get('/ajax_tbl_pengguna_event', [EventPenggunaController::class,'ajax_tbl_pengguna_event'])->name('ajax_tbl_pengguna_event');
        



        
        // Menu Berita
        Route::resource('/berita', BeritaController::class);
        Route::resource('/kategori-berita', KategoriBeritaController::class);
        // Menu Artikel
        Route::resource('/artikel', ArtikelController::class);
        Route::resource('/kategori-artikel', KategoriArtikelController::class);
        // Menu Wisata
        Route::resource('/wisata', WisataController::class);
        Route::post('/wisata-update-save', [WisataController::class,'wisataupdatesave'])->name('wisata.update.save');

        
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


        Route::post('/katagori_vr-save', [VirtualtourController::class,'katagori_vrsave'])->name('katagori_vr.save');
        Route::get('/ajax-tbl-KatagoriVirtual', [VirtualtourController::class,'ajax_tbl_KatagoriVirtual'])->name('ajax_tbl_KatagoriVirtual');
        Route::post('/virtualroomkat-delete', [VirtualtourController::class,'virtualroomkatdelete'])->name('virtualroomkat.delete');
Route::post('/virtual_kat-update-save', [VirtualtourController::class,'virtual_katupdatesave'])->name('virtual_kat.update.save');




        // Route::get('katagori_ruangan',[VirtualtourController::class,'ajax_tbl_virtualtour'])->name('ajax_tbl_virtualtour');
          
        
        

        // Menu Pengaturan
        Route::resource('/pengaturan-website', PengaturanController::class);
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

require __DIR__ . '/auth.php';
