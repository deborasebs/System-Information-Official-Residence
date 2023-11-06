<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PermohonanInventaris;
use Carbon\Carbon;

class PermohonanInventarisController extends Controller
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

        $datas = permohonaninventaris::get();
        return view('permohonaninventaris.index', compact('datas')); 
    }

    public function create()
    {
        $halaman = 'permohonaninventaris';
        //$list_kategori = Kategori::pluck('nama_kategori','id_kategori');
        //return view('pages.create',compact('halaman'));
        return view('permohonaninventaris.create');

    }

    public function store(Request $request)
    {
        $forminput = $request->all();
        
        $permohonaninventaris = PermohonanInventaris::create($forminput);

        return redirect('permohonaninventaris');
    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = PermohonanInventaris::findOrFail($id);

        return view('permohonaninventaris.show', compact('data'));
    }

    public function edit($id){
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
    }

    $data = PermohonanInventaris::findOrFail($id);
    return view('permohonaninventaris.edit', compact('data'));
    }

    public function update($id, Request $request){
        
        PermohonanInventaris::find($id)->update([
                'rumah_id' => $request->get('rumah_id'),
                'notadinas' => $request->get('notadinas'),
                'namapemohon' => $request->get('namapemohon'),
                'personalnumber' => $request->get('personalnumber'),
                'jabatan' => $request->get('jabatan'),
                'alamat' => $request->get('alamat'),
                'permintaanbarang' => $request->get('permintaanbarang')
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('permohonaninventaris.index');
    }

    public function destroy($id){
        $permohonaninventaris = permohonaninventaris::findOrFail($id);
        $permohonaninventaris->delete();
        return redirect('permohonaninventaris');
   }
}

