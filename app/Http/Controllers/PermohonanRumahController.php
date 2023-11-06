<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PermohonanRumah;
use Carbon\Carbon;

class PermohonanRumahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$gedung = DB::table('table_gedung')->get();
        //$inventaris = Inventaris::orderBy('id','asc')->paginate(10);  
       	//var_dump($inventaris);
        //return view('inventaris', ['inventaris' => $inventaris]);
        //return view('Rumah.index',compact('inventaris'));
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = permohonanrumah::get();
        return view('permohonanrumah.index', compact('datas')); 
    }

    public function create()
    {
        $halaman = 'permohonanrumah';
        //$list_kategori = Kategori::pluck('nama_kategori','id_kategori');
        //return view('pages.create',compact('halaman'));
        return view('permohonanrumah.create');

    }

    public function store(Request $request)
    {
        $forminput = $request->all();
        
        $permohonanrumah = PermohonanRumah::create($forminput);

        return redirect('permohonanrumah');
    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = PermohonanRumah::findOrFail($id);

        return view('permohonanrumah.show', compact('data'));
    }

    public function edit($id){
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
    }

    $data = PermohonanRumah::findOrFail($id);
    return view('permohonanrumah.edit', compact('data'));
    }

    public function update($id, Request $request){
        if($request->file('uploadsk')) {
            $file = $request->file('uploadsk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('uploadsk')->move("images/permohonanrumah", $fileName);
            $uploadsk = $fileName;
        } else {
            $uploadsk = NULL;
        }

        PermohonanRumah::find($id)->update([
                'notadinas' => $request->get('notadinas'),
                'namapemohon' => $request->get('namapemohon'),
                'personalnumber' => $request->get('personalnumber'),
                'jabatan' => $request->get('jabatan'),
                'tmtjabatan' => $request->get('tmtjabatan'),
                'unitkerja' => $request->get('unitkerja'),
                'uploadsk' => $uploadsk
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('permohonanrumah.index');
    }

    public function destroy($id){
        $permohonanrumah = permohonanrumah::findOrFail($id);
        $permohonanrumah->delete();
        return redirect('permohonanrumah');
   }
}

