<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Inventaris;
use Carbon\Carbon;

class InventarisController extends Controller
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

        $datas = inventaris::get();
        return view('inventaris.index', compact('datas')); 
    }

    public function create()
    {
        $halaman = 'inventaris';
        //$list_kategori = Kategori::pluck('nama_kategori','id_kategori');
        //return view('pages.create',compact('halaman'));
        return view('inventaris.create');

    }

    public function store(Request $request)
    {
        $forminput = $request->all();
        
        $inventaris = Inventaris::create($forminput);

        return redirect('inventaris');
    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Inventaris::findOrFail($id);

        return view('inventaris.show', compact('data'));
    }

    public function edit($id){
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
    }

    $data = Inventaris::findOrFail($id);
    return view('inventaris.edit', compact('data'));
    }

    public function update($id, Request $request){

        Inventaris::find($id)->update([
                'namabarang' => $request->get('namabarang'),
                'kategori' => $request->get('kategori'),
                'tglperolehan' => $request->get('tglperolehan'),
                'hargaperolehan' => $request->get('hargaperolehan')
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('inventaris.index');
    }

    public function destroy($id){
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
        return redirect('inventaris');
   }
}

