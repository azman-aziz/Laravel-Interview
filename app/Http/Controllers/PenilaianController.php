<?php

namespace App\Http\Controllers;
use App\Models\Penilaian;
use App\Models\KeteranganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }
        
        $blogs = Penilaian::latest()->paginate(5);
        $ket = KeteranganModel::get();

        $stat = "Rekap Data Penilaian";
         
        return view('penilaian.index', compact('blogs','ket','stat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( ! Auth::check()) {
            return redirect('/login');
        }
        return view('penilaian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'email'     => 'required',
            'nilai_x'   => 'required|integer|between:1,33',
            'nilai_y'   => 'required|integer|between:1,23',
            'nilai_z'   => 'required|integer|between:1,18',
            'nilai_w'   => 'required|integer|between:1,13'

        ]);
    
        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/blogs', $image->hashName());

        // Intelegensi cari nilai x kemudian ambil 40% dari x dan 60% dari nilai y 
        $nilaiX = ($request->nilai_x/33)*100;
        $nilaiY = ($request->nilai_y/23)*100;
        $intelegensi = (40 / 100 * $nilaiX + 60 / 100 * $nilaiY) / 2;


        // Numerical 
        $nilaiZ = ($request->nilai_z/18)*100;
        $nilaiW = ($request->nilai_w/13)*100;
        $numerical = (30 / 100 * $nilaiZ + 70 / 100 * $nilaiW) / 2; 
        

        // dd(round($numerical));
        
        $blog = Penilaian::create([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'nilai_x'   => $request->nilai_x,
            'nilai_y'   => $request->nilai_y,
            'nilai_z'   => $request->nilai_z,
            'nilai_w'   => $request->nilai_w
        ]);

        $blog = KeteranganModel::create([
            'id' => $blog->id,
            'nama'     => $request->nama,
            'intelegensi'   => $intelegensi,
            'numerical'   => $numerical
        ]);




    
        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('penilaian.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penilaian.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Penilaian::findOrFail($id);

        //$intelegensi = 40% * $blog->nilai_x;
        //dd($intelegensi);
        return view('penilaian.laporan', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        {
            if ( ! Auth::check()) {
                return redirect('/login');
            }
            $blog = Penilaian::findOrFail($id);
            $stat = "Menu Edit Data";

            return view('penilaian.edit', compact('blog', 'stat'));
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //get data Blog by ID
       
         
        $this->validate($request, [
            'nama'     => 'required',
            'email'     => 'required',
            'nilai_x'   => 'required|integer|between:1,33',
            'nilai_y'   => 'required|integer|between:1,23',
            'nilai_z'   => 'required|integer|between:1,18',
            'nilai_w'   => 'required|integer|between:1,13'
        ]);
    
        
        $blog = Penilaian::findOrFail($id);
        $blog1 = KeteranganModel::findOrFail($id);

        $blog->update([
            'nama'     => $request->nama,
            'email'     => $request->email,
            'nilai_x'   => $request->nilai_x,
            'nilai_y'   => $request->nilai_y,
            'nilai_z'   => $request->nilai_z,
            'nilai_w'   => $request->nilai_w
        ]);

        // Intelegensi cari nilai x kemudian ambil 40% dari x dan 60% dari nilai y 
        $nilaiX = ($request->nilai_x/33)*100;
        $nilaiY = ($request->nilai_y/23)*100;
        $intelegensi = (40 / 100 * $nilaiX + 60 / 100 * $nilaiY) / 2;


        // Numerical 
        $nilaiZ = ($request->nilai_z/18)*100;
        $nilaiW = ($request->nilai_w/13)*100;
        $numerical = (30 / 100 * $nilaiZ + 70 / 100 * $nilaiW) / 2; 
        

        // dd(round($numerical));

        $blog1->update([
            'id' => $blog->id,
            'nama'     => $request->nama,
            'intelegensi'   => $intelegensi,
            'numerical'   => $numerical
        ]);
    
    
        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('penilaian.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penilaian.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Penilaian::findOrFail($id);
        $blog1 = KeteranganModel::findOrFail($id);
        $blog->delete();
        $blog1->delete();

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('penilaian.index')->with(['success' => 'Data Berhasil Hapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('penilaian.index')->with(['error' => 'Data Gagal Hapus!']);
        }
    }
}
