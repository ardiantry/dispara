<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use Illuminate\Support\Facades\Validator;
use App\Models\KategoriArtikel;
use App\Models\Virtualtour; 
use App\Http\Requests\StoreKategoriArtikelRequest;
use App\Http\Requests\UpdateKategoriArtikelRequest;
use App\Models\KategoriBerita;
use App\Models\KatagoriVirtual;  
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Carbon\Carbon;
use Exception;
use Yajra\DataTables\Facades\DataTables; 
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class VirtualtourController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->Hashids = new \Hashids\Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }
   
    public function index(Request $request)
    {
          return view('dashboard.virtualtour.index');
    }

 public function ajax_tbl_virtualtour(Request $request)
    {
        
        $id_kat = $this->Hashids->decode($request->input('id_kat'))[0];
        $Virtualtour = Virtualtour::where('id_kat',$id_kat)->latest()->get();
        return DataTables::of($Virtualtour)
                ->editColumn('created_at', function ($created) {
                    return \Carbon\Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y');
                })
                 ->editColumn('action', function ($action) {
                return '<i class="dripicons-pencil btn btn-success btn-sm Edit_data"  data-id="'.@$action->id.'"></i>
                        <i class="dripicons-trash btn btn-danger btn-sm Hapus_data" data-id="'.@$action->id.'"  ></i>';
            })
                ->addIndexColumn()
                ->make(true); 
    }
public function deletevr_rom(Request $request)
    {
        $dec = $this->Hashids->decode($request->input('id_delete'))[0];
        Virtualtour::where('id',$dec)->delete();
        DB::table('tb_marker')->where('ruangan_id',$dec)->delete();
        print json_encode(array('error'=>false));
    }
public function dlte_mar(Request $request)
    {
        $dec = str_replace('marker_saving-', '', $request->input('id_delete'));
        DB::table('tb_marker')->where('id',$dec)->delete();
        print json_encode(array('error'=>false));
    }


public function create(Request $request)
{
  return view('dashboard.virtualtour.create');
}


public function save(Request $request)
    { 
        $alert=array();
        $error=true;
        $id='';
        $validator =   Validator::make($request->all(),[
                    'nama_ruangan'  => 'required',
                    'kode_ruangan'  => 'required', 
                    'deskripsi'     => 'required', 
            ]);


        if($validator->fails()) 
        {
            $alert      =   $validator->errors();
        } 
        else
        {
            if($request->input('id_vir'))
            { 
                 $dec = $this->Hashids->decode($request->input('id_vir'))[0];
                Virtualtour::where('id',$dec)->update([
                'nama'          => ucwords($request->input('nama_ruangan')), 
                'deskripsi'     => $request->input('deskripsi'),
                'kode_ruangan'  => $request->input('kode_ruangan'),
                'updated_at'    =>Carbon::now()
                ]);
                $id=$request->input('id_vir');
            }
            else
            {

              $data=  Virtualtour::create([
                'nama'              => ucwords($request->input('nama_ruangan')),
                'deskripsi'         => $request->input('deskripsi'),
                'kode_ruangan'      => $request->input('kode_ruangan'),
                'id_kat'            =>$this->Hashids->decode($request->input('id_kat'))[0],
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
                ]);
              $id=$data->id;

            }
            $error=false;


        }

        print json_encode(array('error'=>$error,'alert'=>$alert,'id_vr'=>$id));

            
    }

  
public function saveroom(Request $request)
    { 
        $alert=array();
        $error=true;
        $id='';
        $validator =   Validator::make($request->all(),[
                    'nama_ruangan'  => 'required',
                    'kode_ruangan'  => 'required', 
                    'deskripsi'     => 'required', 
            ]);


        if($validator->fails()) 
        {
            $alert      =   $validator->errors();
        } 
        else
        {
            if($request->input('id_vir'))
            { 
                 $dec = $this->Hashids->decode($request->input('id_vir'))[0];
                Virtualtour::where('id',$dec)->update([
                'nama'          => ucwords($request->input('nama_ruangan')),
                'deskripsi'     => $request->input('deskripsi'),
                'kode_ruangan'  => $request->input('kode_ruangan'),
                'updated_at'    =>Carbon::now()
                ]);
                $id=$request->input('id_vir');
            }
            else
            {

              $data=  Virtualtour::create([
                'nama'              => ucwords($request->input('nama_ruangan')),
                'deskripsi'         => $request->input('deskripsi'),
                'kode_ruangan'      => $request->input('kode_ruangan'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
                ]);
              $id=$data->id;

            }
            $error=false;


        }

        print json_encode(array('error'=>$error,'alert'=>$alert,'id_vr'=>$id));

            
    }
    public function room_image(Request $request)
    { 

        $alert      =array();
        $error      =true; 
        $messages   =[
                        'required'      => 'Kolom wajib diisi',
                        'numeric'       => 'Hanya angka yang diperbolehkan',
                        'mimes'         => 'Format yang diperbolehkan :values',
                        'image'         => 'Format harus gambar',
                        'gambar.max'    => 'Maksimal 30mb'
                     ];
        $validator =Validator::make($request->all(),
                    [
                    'file' => 'required|mimes:png,jpg,jpeg|image|max:30000',
                    ], $messages);

        if($validator->fails()) 
        {
            $alert      =   $validator->errors();
        } 
        else
        {


                $pict_rooms     = $request->file('file')->store('pict_rooms'); 
            //    $filenamae      = $request->file('file');
                $dec            = $this->Hashids->decode($request->input('id_vir'))[0];
                Virtualtour::where('id',$dec)->update([
                'gambar'=>$pict_rooms
                ]);
                $error=false;

        }
        print json_encode(array('error'=>$error,'alert'=>$alert));


    }
    
    public function first(Request $request)
    {
            $dec                = @$this->Hashids->decode($request->input('id_vir'))[0];
            $cek_typemarker     = array('AddPicture'); 
            $vir                = Virtualtour::where('id', $dec)->first(); 
            $tb_mar             = DB::table('tb_marker')->where('ruangan_id',$dec)->get();
            $i                  = 0;
            $data_marker=array();
            foreach ($tb_mar as $key) 
            {
               $value                =@unserialize(@$key->value)?@unserialize(@$key->value):array();

               $value['id']          ='marker_saving-'.@$key->id;
               if(in_array($value['typemarker'], $cek_typemarker))
               {
                    $value['link'] =  asset('storage/'.$value['link']);
               }
               else
               {
                    $type_link          =$value['typemarker']=='AddRooms'?'rooms':'games';
                    //$value['link']      =url($type_link,$value['link']);
                    
                    $value['link']      =$value['link'];
                    
               } 

               $data_marker[$i]=$value; 
               $i++;
            }
            print json_encode(array('vir'=>$vir,'marker'=>$data_marker));
    }
public function simpanmarker(Request $req)
    {

                $error         =true;
                $alert         ='file tidak di dukung'; 
                $file          =$req->file('filemarker');
                $extensi       =$file->getClientOriginalExtension();  
                $file_akses    =array('jpg','jpeg','png','gif');
                if(in_array(strtolower($extensi),$file_akses))
                {

                if( $extensi!='gif')
                {

                    $image_resize   = Image::make($file);         
                    $image_resize->resize(250, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                    });
                    $image_resize->stream();
                    $fileName =Carbon::now()->format('Ymdhis').'.'.$extensi;
                    Storage::disk('local')->put('public/marker_rooms/'.$fileName, $image_resize, 'public');
                    $data['icon']           = 'marker_rooms'.'/'.$fileName;
                }
                else
                {
                     $data['icon']= $req->file('filemarker')->store('marker_rooms'); 
                }
  
 
       
                    $data['created_at']      =  Carbon::now();  
                    $data['updated_at']      =  Carbon::now();   

                    DB::table('tb_icon')->insert($data);
                    $error                  =false;
                    $alert                  ='simpan suksess';

                } 
                print json_encode(array('error'=>$error,'alert'=>$alert));

    }
    public function listmarker(Request $req)
    {
          $tb_marker =DB::table('tb_icon')->get();
           $i=0;
          foreach ($tb_marker as $key) 
          {
            $tb_marker[$i]->url=@$key->icon;
             $i++;
          }
            print json_encode(array('tb_marker'=>$tb_marker));
    }
    public function hapusmarker(Request $req)
    {
           DB::table('tb_icon')->where('id',$req->input('id_hapus'))->delete();
          
            print json_encode(array('error'=>false));
    }
    public function getdatavir(Request $req)
    {

            $dec = $this->Hashids->decode($req->input('id_vir'))[0];
            $id_kat = $this->Hashids->decode($req->input('id_kat'))[0];
 
            $Virtualtour = Virtualtour::where('id','!=',$dec)->where('id_kat',$id_kat)->get();
            print json_encode(array('Virtualtour'=>$Virtualtour));
    }

    public function getdatagame(Request $req)
    {

        $Games = Games::get(); 
        // $i=0;
        // foreach ($Games as $key) {
        //     # code...
        //   // $Games[$i]->id= @$this->Hashids->encode($key->id);
        //     $i++;
        // }
        print json_encode(array('Games'=>$Games));
    }
  public function simpanmarkeredit(Request $req)
    { 

        ini_set('upload_max_filesize', '500M');
        ini_set('post_max_size', '550M');
        ini_set('memory_limit', '1024M');
        ini_set('max_input_time', 3000);
        ini_set('max_execution_time', 3000);
        $cek_form           =array('id_vir','_token','id','link','Link_save');
        $cek_typemarker     =array('AddPicture'); 
        $dec                =$this->Hashids->decode($req->input('id_vir'))[0];
        $array_marker       =array();
        foreach ($req->all() as $key =>$val) 
        { 
            if(!in_array($key, $cek_form))
            {
                 $array_marker[$key]=$val;  
            }

        } 
       if(in_array($req->input('typemarker'), $cek_typemarker))
       {
            if(@$req->file('link'))
            {

                 $array_marker['link']= $req->file('link')->store('gallery_rooms'); 
            }
            else
            {
                $array_marker['link']= str_replace(asset('storage').'/', '', $req->input('Link_save'));  
            }
            
       }
       else
       {
            $array_marker['link']=$req->input('link');
       }

        $data['value']      =serialize($array_marker);
        $data['ruangan_id'] =$dec;
        $data['updated_at'] =Carbon::now();  
        if(preg_match("/marker-/i", $req->input('id')))
        {

            $data['created_at'] =Carbon::now(); 
            $data['id_marker']  =str_replace('marker-', '', $req->input('id'));   
            DB::table('tb_marker')->insert($data);
        }
        else
        {
            $id=str_replace('marker_saving-', '', $req->input('id'));  
            DB::table('tb_marker')->where('id',$id)->update($data);
        }
          print json_encode(array('error'=>false));

        
    }

  public function fromdeflonglat(Request $req)
    {
         
            $dec = $this->Hashids->decode($req->input('id_vir'))[0];
            Virtualtour::where('id',$dec)->update([
            'long'=>$req->input('longitude'),
            'lat'=>$req->input('latitude'),
            'zoom'=>$req->input('zoom')
            ]);
                 print json_encode(array('error'=>false));
    }
 public function katagori_vrsave(Request $req)
    {
         
         if(@$req->input('id_kategori'))
         {
           
               $dec = $this->Hashids->decode(@$req->input('id_kategori'))[0];
                KatagoriVirtual::where('id',$dec)->update([ 
                'nama'=>$req->input('nama')
                ]); 
         }
         else
         {

           KatagoriVirtual::create([ 
            'nama'=>$req->input('nama')
            ]); 
         }
            print json_encode(array('error'=>false));
    }
 public function ajax_tbl_KatagoriVirtual(Request $req)
    {
         
         $KatagoriVirtual = KatagoriVirtual::get(); 
        return DataTables::of($KatagoriVirtual)
         ->editColumn('author', function ($data) 
         {
                return @$data->pengguna['nama']?@$data->pengguna['nama']:'admin';
        })
          ->editColumn('status', function ($data) 
         {
                return @$data->pengguna['nama']?@$data->status_public:'active';
        })
        ->editColumn('input_check', function ($data) 
         {
                return @$data->pengguna['nama']?'<input type="hidden" name="id[]" value="'.$data->id.'">
                                        <input type="checkbox" name="aksi['.$data->id.']" value="1">':'-';
        })
         ->editColumn('action', function ($action) {
        return '<i class="dripicons-pencil btn btn-warning btn-sm Edit_data_kat"  data-id="'.$action->id.'" data-name="'.$action->nama.'"></i>
                <i class="dripicons-to-do btn btn-success btn-sm detail_data_kat" data-id="'.$action->id.'"  data-name="'.$action->nama.'"></i>
                <i class="dripicons-trash btn btn-danger btn-sm Hapus_data_kat" data-id="'.$action->id.'"></i>
                ';
        })
         ->rawColumns(['input_check','action'])
        ->addIndexColumn()
        ->make(true); 
    }
 public function virtualroomkatdelete(Request $req)
    {
         
         if(@$req->input('id_delete'))
         {
           
               $dec = $this->Hashids->decode(@$req->input('id_delete'))[0];
                KatagoriVirtual::where('id',$dec)->delete(); 
         }
          
            print json_encode(array('error'=>false));
    }

 public function virtual_katupdatesave(Request $request)
    {
          
        if(@$request->input('id'))
        {
            foreach (@$request->input('id') as $key) 
            {
                  $id =  $this->Hashids->decode($key)[0];
                  if(@$request->input('aksi')[$key])
                  { 
                        KatagoriVirtual::where('id',$id)->update(['status_public'=>@$request->input('status')]);
                  }
            }

        }
        print json_encode(array('error'=>false)); 
    }


    
}
