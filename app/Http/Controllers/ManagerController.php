<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ManagerController extends Controller
{
    public function indexAdmin()
    {
 
        $data  = User::role('admin')->get();
        return view('manager.user.admin', compact('data'))
            ->with('i');
 
    }
 
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data->assignRole('admin');
            return redirect()->route('manager.user.admin')
                ->with('success','Data berhasil ditambah');
    }
 
    public function destroyAdmin($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
 
    //Kasir
    public function indexKasir()
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data  = User::role('kasir')->get();
        return view('manager.user.kasir', compact('data'))
            ->with('i');
 
    }
 
    public function storeKasir(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data->assignRole('kasir');
            return redirect()->route('manager.user.kasir')
                ->with('success','Data berhasil ditambah');
    }
 
    public function destroyKasir($id)
    {
        $data = User::findorfail($id);
        $data->delete();
        return back()->with('', 'Data berhasil dihapus');
    }
}
