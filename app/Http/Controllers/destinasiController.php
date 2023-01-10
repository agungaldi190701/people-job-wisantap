<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class destinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = Destinasi::all();
        return view('content.destinasi',[
            'destinasi' => $destinasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jpg,png,jpeg',
        ];
        
        
        $this->validate($request, [

            'nama' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg',
        ], $pesan);


   
        if($request->file('gambar') == ""){
            Destinasi::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => 'default.jpg',

            ]);

        } else {
            $dokumen = $request->file('gambar');
            $nama_file = $dokumen->getClientOriginalName();

            $dokumen->move('images/', $nama_file);

            Destinasi::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => $nama_file,

            ]);
        }

        return redirect('/destinasi')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destinasi = Destinasi::select('*')->where('id', $id)->get();
        return view('content.detailDestinasi', [
            'destinasi' => $destinasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destinasi = Destinasi::select('*')->where('id', $id)->get();
        return view('content.editDestinasi', [
            'destinasi' => $destinasi,
        ]);
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
        $pesan = [
            'required' => 'attribute wajib diisi',
            'mimes' => 'File harus berupa file jpg,png,jpeg',
        ];
        
        
        $this->validate($request, [

            'nama' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg',
        ], $pesan);

        if($request->file('gambar')==""){
            Destinasi::where('id', $id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                // 'gambar' => $nama_file,
            ]);
        } else {

            $dokumen = $request->file('gambar');
            $nama_file = $dokumen->getClientOriginalName();

            $dokumen->move('images/', $nama_file);
            
            Destinasi::where('id', $id)->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => $nama_file,
            ]);
        }
        return back()->with(['success' => 'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Destinasi::findOrFail($id);
        $file_path = public_path('images/' . $file->file_pdf);
        File::delete($file_path);
        $file->delete();

        return redirect('/destinasi')->with(['success' => 'Data Berhasil Di Hapus']);
    }




    public function home()
    {
        // SELECT destinasis.id as id, destinasis.nama as nama , destinasis.gambar AS gambar,  AVG(rating) as rating FROM `tb_rating`  INNER JOIN `destinasis` ON destinasis.id = tb_rating.destinasis_id GROUP BY tb_rating.destinasis_id
        $destinasi = DB::table('tb_rating')->join('destinasis', 'tb_rating.destinasis_id','=','destinasis.id')->select([
            'destinasis.id as id',
            'destinasis.nama as nama',
            'destinasis.gambar as gambar',
            DB::raw('AVG(tb_rating.rating) as rating')
        ])->groupBy('tb_rating.destinasis_id')->orderByDesc('rating')->limit(3)->get();

        return view('home', [
            'destinasi' => $destinasi
        ]);
    }

    
}


