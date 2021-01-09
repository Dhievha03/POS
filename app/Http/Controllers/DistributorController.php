<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;

class DistributorController extends Controller
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
        $distributors = Distributor::orderBy('nama_distributor','ASC')->paginate(25);
        return view('distributor.index', compact('distributors'))
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
            'nama_distributor'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
        ]);
        Distributor::create($request->all());
 
        return redirect()->route('distributor.index')
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
    public function edit(Distributor $distributor)
    {
        return view('distributor.edit',compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
        ]);
 
        $distributor->update($request->all());
 
        return redirect()->route('distributor.index')
                        ->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
 
        return redirect()->route('distributor.index')
                        ->with('success','Data berhasil dihapus');
    }
}
