<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merek;
use App\Distributor;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $mereks = Merek::all();
        $distributors = Distributor::all();
        $barangs = Barang::orderBy('nama_barang','ASC')->paginate(25);
        return view('barang.index', compact('barangs','mereks','distributors'))
            ->with ('i',(request()->input('page',1)-1)*25);
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
        $request->validate([
            'nama_barang'=>'required',
            'id_merek'=>'required',
            'id_distributor'=>'required',
            'tanggal_masuk'=>'required',
            'harga_barang'=>'required',
            'stok_barang'=>'required',
            'keterangan'=>'required',
        ]);
        Barang::create($request->all());
 
        return redirect()->route('barang.index')
                        ->with('success','Data berhasil ditambahkan');
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
    public function edit(Barang $barang)
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        return view('barang.edit',compact('barang','merek','distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang'=>'required',
            'id_merek'=>'required',
            'id_distributor'=>'required',
            'tanggal_masuk'=>'required',
            'harga_barang'=>'required',
            'stok_barang'=>'required',
            'keterangan'=>'required',
        ]);
 
        $barang->update($request->all());
 
        return redirect()->route('barang.index')
                        ->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
 
        return redirect()->route('barang.index')
                        ->with('success','Data berhasil dihapus');
    }
}
