<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merek;

class MerekController extends Controller
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
        $mereks = Merek::orderBy('id','ASC')->paginate(25);
        return view('merek.index', compact('mereks'))
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
            'nama_merek'=>'required',
        ]);
        Merek::create($request->all());
 
        return redirect()->route('merek.index')
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
    public function edit(Merek $merek)
    {
        return view('merek.edit',compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merek $merek)
    {
        $request->validate([
            'nama_merek' => 'required',
        ]);
 
        $merek->update($request->all());
 
        return redirect()->route('merek.index')
                        ->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merek $merek)
    {
        $merek->delete();
 
        return redirect()->route('merek.index')
                        ->with('success','Data berhasil dihapus');
    }
}
