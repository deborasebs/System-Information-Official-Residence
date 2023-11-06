<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Penghuni;
use Carbon\Carbon;

class PenghuniController extends Controller
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

        $datas = penghuni::get();
        return view('penghuni.index', compact('datas')); 
    }

    public function create()
    {
        $halaman = 'penghuni';
        //$list_kategori = Kategori::pluck('nama_kategori','id_kategori');
        //return view('pages.create',compact('halaman'));
        return view('penghuni.create');

    }

    public function store(Request $request)
    {
        $forminput = $request->all();
        
        $penghuni = Penghuni::create($forminput);

        return redirect('penghuni');
    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Penghuni::findOrFail($id);

        return view('penghuni.show', compact('data'));
    }

    public function edit($id){
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
    }

    $data = Penghuni::findOrFail($id);
    return view('penghuni.edit', compact('data'));
    }

    public function update($id, Request $request){
        
        Penghuni::find($id)->update([
                'namapemohon' => $request->get('namapemohon'),
                'personalnumber' => $request->get('personalmember'),
                'jabatan' => $request->get('jabatan'),
                'unitkerja' => $request->get('unitkerja'),
                'plotting' => $request->get('plotting')
                
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('penghuni.index');
    }

    public function destroy($id){
        $penghuni = penghuni::findOrFail($id);
        $penghuni->delete();
        return redirect('penghuni');
   }
}

