<?php

namespace App\Http\Controllers;

use PDF;
use Exception;
use Session;
use App\Models\User;
use Hashids\Hashids;
use App\Models\Pengguna;
use App\Helpers\Activity;
use App\Models\Pengaturan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerifyPenggunaEmail;
use App\Exports\MemberExportExcel;
use App\Imports\MemberImportExcel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use Illuminate\Support\Carbon;


class PenggunaController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function getUsername()
    {
        $userId = User::find(auth()->user()->id);
        $user = explode(' ', $userId->name, 3);
        if (!isset($user[1])) {
            $user[1] = '';
        }
        $username = $user[0] . ' ' . $user[1];
        return $username;
    }

    public function getUserRegis($nama)
    {
        $user = explode(' ', $nama, 3);
        if (!isset($user[1])) {
            $user[1] = '';
        }
        $username = $user[0] . ' ' . $user[1];
        return $username;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cAll = Pengguna::get()->count();
        $cAct = Pengguna::where('status', 'Aktif')->count();
        $cNoAct = Pengguna::where('status', 'Tidak Aktif')->count();
        $member = Pengguna::get();
        $result = Pengaturan::first();
        return view('dashboard.pengguna.index', [
            'title' => 'Manajemen Member',
            'users' => $member,
            'result' => $result,
            'cAll' => $cAll,
            'cAct' => $cAct,
            'cNoAct' => $cNoAct
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Member';
        $result = Pengaturan::first();
        return view('dashboard.pengguna.create', compact('title', 'result'));
    }

    public function storemember(Request $request)
    {
 

        $validator = Validator::make($request->all(), [
                    'nama' => "required|min:3|max:255",
                    'email' => 'required',
                    'password' => 'required|min:8',
                    'no_hp' => 'required|min:11|max:17',
                    'instansi' => 'required|min:3|max:255|string',
        ],
        [
        'regex' => ":attribute membutuhkan karakter nomor",
        'required' => ":attribute wajib diisikan",
        'no_hp.min' => ":attribute minimal 11 karakter",
        ]
    );
        $alert=''; 
        $error=true;
        if($validator->fails()) 
        {
            $messages=$validator->messages(); 
            
             foreach($messages->all() as $msg) 
             {
               $alert .='<li>'.$msg.'</li>';
             }

        }
        $alert .=$request->input('password')!=$request->input('repassword')?'<li>Password harus sama</li>':'';
        if($alert=='')
        { 

                try {
                    $data = new Pengguna;
                    $data->nama      = ucwords($request->input('nama'));
                    $data->email     = strtolower($request->input('email'));
                    $data->no_hp     = $request->input('no_hp');
                    $data->instansi  = $request->input('instansi');
                    $data->password  = Hash::make($request->input('password'));
                    $data->poin      = 0;
                    $data->status    = 'Aktif';
                    $data->save();

                    if($data->save()) 
                    {
                         $request->session()->put('session_pengguna', $data); 
                    }
                    $alert='<li>Data berhasil Disimpan</li>';
                    $error = false;

                } catch (Exception $error) {
                    $error = true;
                   
                }
        }
          print json_encode(array('error'=>$error,'alert'=>$alert));
    }
   public function loginmember(Request $request)
    {

        $pengguna = Pengguna::where('email',$request->input('email'))->first();
        $alert=''; 
        $error=true;
        if($pengguna)
        {

            if(Hash::check($request->input('password'),@$pengguna->password))
            {
                $request->session()->put('session_pengguna', $pengguna); 
                $error=false;
                $alert='<li>Login berhasil</li>';
            }
            else
            {
                 $alert='<li>Password tidak sesuai</li>'; 
            }
        }
        else
        {
            $alert='<li>Pengguna tidak terdaftar</li>'; 
        }
        print json_encode(array('error'=>$error,'alert'=>$alert));
    }
    public function edit($id)
    {
        $decrypted = Crypt::decryptString($id);
        $pengguna = Pengguna::findOrFail($decrypted);
        $title = 'Ubah Member';
        $result = Pengaturan::first();
        return view('dashboard.pengguna.create', compact('title', 'pengguna', 'result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaRequest $request, $data)
    {
        $decrypted = Crypt::decryptString($data);
        $pengguna = Pengguna::findOrFail($decrypted);
        // Mengambil password lama
        $oldPassword = $pengguna->password;
        // Validasi
        $validated = $request->validated();
        // validasi password
        if ($request->password) {
            $message = array(
                'password.min' => 'Minimal :min karakter',
                'password.regex' => 'Panjang minimal 8 karakter, bermuat 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter spesial'
            );
            $request->validate([
                'password' => 'min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
            ], $message);
        }
        // validasi email
        if ($request->email != $pengguna->email) {
            $message = array(
                'email.min' => 'Minimal :min karakter',
                'email.max' => 'Maksimal :max karakter',
                'email.regex' => 'Masukkan format yang benar',
                'email.email' => 'Format bukan email',
                'email.required' => 'Kolom wajib diisi',
                'email.unique' => 'Email telah terdaftar',
            );
            $request->validate([
                'email' => 'email|required|regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/|min:6|max:30|unique:tb_pengguna'
            ], $message);
        }
        DB::beginTransaction();
        try {
            if ($request->file('gambar')) {
                if ($request->oldGambar) {
                    Storage::delete($request->oldGambar);
                }
                $validated['gambar'] = $request->file('gambar')->store('pengguna-profile');
            } elseif ($request->file('gambar') == NULL) {
                $validated['gambar'] = $request->oldGambar;
            }

            if ($request->password == NULL) {
                $pw = $oldPassword;
            } elseif ($request->password != NULL) {
                $pw = Hash::make($validated['password']);
            }
            $validated['nama'] = ucwords($validated['nama']);
            $validated['email'] = strtolower($validated['email']);

            $pengguna->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'password' => $pw,
                'gambar' => $validated['gambar'],
                'no_hp' => $validated['no_hp'],
                'instansi' => $validated['instansi']
            ]);
            Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> merubah member');
            DB::commit();
            $response = 'sucUpdate';
        } catch (Exception $e) {
            DB::rollBack();
            $response = 'error';
        }
        return redirect()->route('member.index')->with($response, 'Messages');
    }

    public function del_pictMember($hash)
    {
        $decrypted = Crypt::decryptString($hash);
        $pengguna = Pengguna::findOrFail($decrypted);

        if ($pengguna->gambar) {
            Storage::delete($pengguna->gambar);
            $pengguna->update(['gambar' => NULL]);
            Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> menghapus foto member ' . $pengguna->nama);
            return back()->with('sucUpdate', 'Messages');
        } else {
            return back();
        }
    }
    public function active_member($data)
    {
        $decrypted = Crypt::decryptString($data);
        Pengguna::findOrFail($decrypted)->update([
            'status' => 'Aktif'
        ]);
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> merubah status aktif member');
        return back()->with('sucUpdate', 'Berhasil');
    }
    public function nonactive_member($data)
    {
        $decrypted = Crypt::decryptString($data);
        Pengguna::findOrFail($decrypted)->update([
            'status' => 'Tidak Aktif'
        ]);
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> merubah status tidak aktif member');
        return back()->with('sucUpdate', 'Berhasil');
    }

    // Cetak All PDF
    public function cetakAllPDF()
    {
        $users = Pengguna::get();
        $pdf = PDF::loadView('dashboard.pengguna.cetakAllPDF', compact('users'));
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> export PDF member');
        return $pdf->download(date('dmYHms-a') . 'Tabel Member.pdf');
    }

    // Cetak All Excel
    public function cetakAllExcel()
    {
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> export Excel member');
        return Excel::download(new MemberExportExcel, date('dmYHms-a') . 'Tabel Member.xlsx');
    }

    // show Import All Excel
    public function showImportAllExcel()
    {
        $title = "Import Excel Pengguna";
        $result = Pengaturan::first();
        $data = Pengguna::all();
        return view('dashboard.pengguna.createImportExcel', compact('title', 'result', 'data'));
    }

    // Import All Excel
    public function ImportAllExcel(Request $request)
    {
        $messages = [
            'mimes' => 'Format yang diperbolehkan :values',
            'max' => 'Ukuran maksimal 5mb',
            'required' => 'Kolom wajib diisi',
            'file' => 'Format bukan file'

        ];
        $request->validate([
            'importMember' => 'required|mimes:xlsx,csv|max:5000|file',
        ], $messages);
        DB::beginTransaction();
        try {
            $file = $request->file('importMember');
            $import = new MemberImportExcel;
            $import->import($file);
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> import Excel member');
            DB::commit();
            $response = 'success';
        } catch (ValidationException $error) {
            DB::rollBack();
            $response = 'error';
        }

        return back()->with($response, 'Messages');
    }

    // verified_account
    public function verified_account($id)
    {
        $decrypted = Crypt::decryptString($id);
        Pengguna::whereId($decrypted)->update([
            'email_verified_at' => now()
        ]);
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> verifikasi member');
        return back()->with('sucUpdate', 'Perubahan berhasil');
    }

    // verify pengguna with SMPT GMAIL
    public function verify_pengguna($id)
    {
        $decrypted = Crypt::decryptString($id);
        $pengguna = Pengguna::findOrFail($decrypted);
        if (!$pengguna->email_verified_at) {
            $pengguna->update([
                'email_verified_at' => now()
            ]);
            Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUserRegis($pengguna->nama)) . '</b> verifikasi akun');
            return redirect('/member')->with('sucUpdate', 'Messages');
        } else {
            return redirect('/member');
        }
    }

    // Send Verify using Gmail SMTP
    public function VerifyPenggunaEmail($email)
    {
        $pengguna = Pengguna::where('email', $email)->first();
        $data = array(
            'nama' => $pengguna->nama,
            'email' => $email,
            'id' => Crypt::encryptString($pengguna->id)
        );

        $tujuan = $email;

        Mail::to($tujuan)->send(new VerifyPenggunaEmail($data));
    }

    public function nonaktifCheckedPengguna(Request $request)
    {
        $ids = $request->ids;
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> merubah status tidak aktif member');
        foreach ($ids as $id) {
            Pengguna::findOrFail($id)->update([
                'status' => 'Tidak Aktif'
            ]);
        }
    }

    public function aktifCheckedPengguna(Request $request)
    {
        $idact = $request->idact;
        Activity::store_act('<i class="fa fa-users"></i> <b>' . ucwords($this->getUsername()) . '</b> merubah status aktif member');
        foreach ($idact as $id) {
            Pengguna::findOrFail($id)->update([
                'status' => 'Aktif'
            ]);
        }
    }

    // Ajax Datatable
    public function ajax_tableMember()
    {
        $data = Pengguna::latest()->get();
        return DataTables::of($data)
            ->editColumn('nama', function ($nama) {
                return '
                    <div class="d-flex flex-row">
                        <span class="text-wrap d-block" style="max-width: 8rem;">' . $nama->nama . '</span>
                    </div>';
            })
            ->editColumn('gambar', function ($gambar) {
                if ($gambar->gambar) {
                    $img = $gambar->gambar;
                } else {
                    $img = asset('assets/images/noimage.jpg');
                }
                return $img;
            })
            ->editColumn('email', function ($email) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $email->email . '</span>';
            })
            ->editColumn('instansi', function ($instansi) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $instansi->instansi . '</span>';
            })
            ->editColumn('email_verified_at', function ($verified) {
                $urlVerif = route('member.verified-account', Crypt::encryptString($verified->id));
                if ($verified->email_verified_at) {
                    $info = '<small class="text-success">Verifikasi</small>';
                } else {
                    $info = '<a href="' . $urlVerif . '" class="text-wrap d-block" id="btn-verifikasi" style="max-width: 3rem;"><strong class="badge bg-danger text-light">verifikasi sekarng</strong></a>';
                }
                return $info;
            })
            ->editColumn('created_at', function ($created) {
                return Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->editColumn('updated_at', function ($updated) {
                return Carbon::parse($updated->updated_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->addColumn('action', function ($action) {
                $url_edit = route('member.edit', Crypt::encryptString($action->id));
                $url_nonaktif = route('member.nonactive', Crypt::encryptString($action->id));
                $url_aktif = route('member.active', Crypt::encryptString($action->id));
                if ($action->status != 'Aktif') {
                    $btn = '
                <div class="d-flex flex-row">
                    <a href="' . $url_edit . '" class="mr-1" title="Edit Member">
                        <i class="mdi mdi-pencil btn btn-primary btn-sm font-20"></i></a>
                    <a href="' . $url_aktif . '" id="btn-aktif" title="Aktifkan Member">
                        <i class="mdi mdi-check-circle-outline btn btn-success btn-sm font-20"></i></a>
                </div>
                ';
                } else {
                    $btn = '
                <div class="d-flex flex-row">
                    <a href="' . $url_edit . '" class="mr-1" title="Edit Member">
                        <i class="mdi mdi-pencil btn btn-primary btn-sm font-20"></i></a>
                    <a href="' . $url_nonaktif . '" id="btn-nonaktif" title="Nonaktifkan Member">
                        <i class="mdi mdi-minus-circle-outline btn btn-danger btn-sm font-20"></i></a>
                </div>
                ';
                }
                return $btn;
            })
            ->rawColumns(['gambar', 'email_verified_at', 'action', 'checkbox', 'nama', 'email', 'instansi'])
            ->addIndexColumn()
            ->make(true);
    }


    public function ajax_tableMember_act()
    {
        $data = Pengguna::where('status', 'Aktif')->orderBy('updated_at', 'DESC')->get();
        return DataTables::of($data)
            ->editColumn('nama', function ($nama) {
                return '
            <div class="d-flex flex-row">
            <span class="text-wrap d-block" style="max-width: 8rem;">' . $nama->nama . '</span>
            </div>';
            })
            ->editColumn('gambar', function ($gambar) {
                if ($gambar->gambar) {
                    $img = $gambar->gambar;
                } else {
                    $img = asset('assets/images/noimage.jpg');
                }
                return $img;
            })
            ->editColumn('email', function ($email) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $email->email . '</span>';
            })
            ->editColumn('instansi', function ($instansi) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $instansi->instansi . '</span>';
            })
            ->editColumn('email_verified_at', function ($verified) {
                $urlVerif = route('member.verified-account', Crypt::encryptString($verified->id));
                if ($verified->email_verified_at) {
                    $info = '<small class="text-success">Verifikasi</small>';
                } else {
                    $info = '<a href="' . $urlVerif . '" id="btn-verifikasi" class="text-wrap d-block" style="max-width: 3rem;"><strong class="badge bg-danger text-light">verifikasi sekarang</strong></a>';
                }
                return $info;
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="member_checkbox-nonaktif" data-id="' . $row['id'] . '"><label></label>';
            })
            ->editColumn('created_at', function ($created) {
                return Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->editColumn('updated_at', function ($updated) {
                return Carbon::parse($updated->updated_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->addColumn('action', function ($action) {
                $url_edit = route('member.edit', Crypt::encryptString($action->id));
                $url_nonaktif = route('member.nonactive', Crypt::encryptString($action->id));
                if ($action->status == 'Aktif') {
                    $btn = '
                <div class="d-flex flex-row">
                    <a href="' . $url_edit . '" class="mr-1" title="Edit Member">
                        <i class="mdi mdi-pencil btn btn-primary btn-sm font-20"></i></a>
                    <a href="' . $url_nonaktif . '" id="btn-nonaktif" title="Nonaktifkan Member">
                        <i class="mdi mdi-minus-circle-outline btn btn-danger btn-sm font-20"></i></a>
                </div>
                ';
                }
                return $btn;
            })
            ->rawColumns(['email_verified_at', 'action', 'checkbox', 'nama', 'email', 'instansi'])
            ->addIndexColumn()
            ->make(true);
    }


    public function ajax_tableMember_noact()
    {
        $data = Pengguna::where('status', 'Tidak Aktif')->orderBy('updated_at', 'DESC');
        return DataTables::of($data)
            ->editColumn('nama', function ($nama) {
                return '
                <div class="d-flex flex-row">
                    <span class="text-wrap d-block" style="max-width: 8rem;">' . $nama->nama . '</span>
                </div>';
            })
            ->editColumn('gambar', function ($gambar) {
                if ($gambar->gambar) {
                    $img = $gambar->gambar;
                } else {
                    $img = asset('assets/images/noimage.jpg');
                }
                return $img;
            })
            ->editColumn('email', function ($email) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $email->email . '</span>';
            })
            ->editColumn('instansi', function ($instansi) {
                return '<span class="text-wrap d-block" style="max-width: 8rem;">' . $instansi->instansi . '</span>';
            })
            ->editColumn('email_verified_at', function ($verified) {
                $urlVerif = route('member.verified-account', Crypt::encryptString($verified->id));
                if ($verified->email_verified_at) {
                    $info = '<small class="text-success">Verifikasi</small>';
                } else {
                    $info = '<a href="' . $urlVerif . '" id="btn-verifikasi" class="text-wrap d-block" style="max-width: 3rem;"><strong class="badge bg-danger text-light">verifikasi sekarang</strong></a>';
                }
                return $info;
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="member_checkbox-aktif" data-id="' . $row['id'] . '"><label></label>';
            })
            ->editColumn('created_at', function ($created) {
                return Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->editColumn('updated_at', function ($updated) {
                return Carbon::parse($updated->updated_at)->isoFormat('dddd, DD MMMM Y HH:mm a');
            })
            ->addColumn('action', function ($action) {
                $url_edit = route('member.edit', Crypt::encryptString($action->id));
                $url_aktif = route('member.active', Crypt::encryptString($action->id));
                if ($action->status != 'Aktif') {
                    $btn = '
                <div class="d-flex flex-row">
                <a href="' . $url_edit . '" class="mr-1" title="Edit Member">
                <i class="mdi mdi-pencil btn btn-primary btn-sm font-20"></i></a>
                <a href="' . $url_aktif . '" id="btn-aktif" title="Aktifkan Member">
                <i class="mdi mdi-check-circle-outline btn btn-success btn-sm font-20"></i></a>
                </div>
                ';
                }
                return $btn;
            })
            ->rawColumns(['email_verified_at', 'action', 'checkbox', 'nama', 'email', 'instansi'])
            ->addIndexColumn()
            ->make(true);
    }
}
