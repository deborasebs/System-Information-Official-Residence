<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rumah;
use Carbon\Carbon;

class RumahController extends Controller
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

        $datas = rumah::get();
        return view('rumah.index', compact('datas')); 
    }

    public function create()
    {
        $halaman = 'rumah';
        //$list_kategori = Kategori::pluck('nama_kategori','id_kategori');
        //return view('pages.create',compact('halaman'));
        return view('rumah.create');

    }

    public function store(Request $request)
    {
        $forminput = $request->all();
        // dd($forminput);
        $rumah = Rumah::create($forminput);

        return redirect('rumah');
    }

    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Rumah::findOrFail($id);

        return view('rumah.show', compact('data'));
    }

    public function edit($id){
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
    }

    $data = Rumah::findOrFail($id);
    return view('rumah.edit', compact('data'));
    }

    public function update($id, Request $request){
        if($request->file('layout')) {
            $file = $request->file('layout');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('layout')->move("images/rumah", $fileName);
            $layout = $fileName;
        } else {
            $layout = NULL;
        }

        Rumah::find($id)->update([
                'koderumah' => $request->get('koderumah'),
                'komplek' => $request->get('komplek'),
                'alamat' => $request->get('alamat'),
                'luastanahbangunan' => $request->get('luastanahbangunan'),
                'status' => $request->get('status'),
                'tipe' => $request->get('tipe'),
                'layout' => $layout
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('rumah.index');
    }

    public function destroy($id){
        $rumah = rumah::findOrFail($id);
        $rumah->delete();
        return redirect('rumah');
   }
}

