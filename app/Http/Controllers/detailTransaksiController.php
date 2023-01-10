<?php

namespace App\Http\Controllers;

use App\Models\detailTransaksiModel;
use Illuminate\Http\Request;

class detailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [
            'id' => $id
        ];
        return view('content.pembelianTiket', $data);
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
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'destinasis_id' => 'required',
            'jumlah_pengunjung' => 'required',
            'nama_pengunjung' => 'required',
            'total' => 'required',
            'status' => 'required',
            'asal_daerah' => 'required',
            'payment' => 'required',
            'tanggal' => 'required',
        ]);

   
        $data = [
            'user_id' => $request->user_id,
            'destinasis_id' => $request->destinasis_id,
            'jumlah_pengunjung' => $request->jumlah_pengunjung,
            'nama_pengunjung' => $request->nama_pengunjung,
            'total' => $request->total,
            'status' => $request->status,
            'asal_daerah' => $request->asal_daerah,
            'payment_method' => $request->payment,
            'tanggal_berangkat' => $request->tanggal,

        ];
    detailTransaksiModel::create($data);
    return redirect('/')->with('success', 'Tiket Berhasil Dibooking');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tiketKu()
    {
      return view('content.tiketKu');
    }
    public function semuaTiket()
    {
      return view('content.semuaTiket');
    }
    public function updateStatus($id)
    {
        $status = detailTransaksiModel::findOrFail($id);
        $status->status = 'pending';
        $status->save();

        return redirect('/tiketKu')->with('success', 'Pembayaran Berhasil, tunggu ACC dari admin!!');
    }
    public function accStatus($id)
    {
        $status = detailTransaksiModel::findOrFail($id);
        $status->status = 'sudah dibayar';
        $status->save();

        return redirect('/semuaTiket')->with('success', 'Acc sudah berahasil!!');
    }
}
