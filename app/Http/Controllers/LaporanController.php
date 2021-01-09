<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Distributor;
use App\Merek;
use App\Transaksi;
use PDF;

class LaporanController extends Controller
{

    public function index()
    {
        return view('manager.index');
    }

    public function barangIndex(){
        $barang = Barang::all();
        return view('manager.barang.index', compact('barang'))
        ->with('i');
    }

    public function cetakBarang()
    {
    	$barang = Barang::all();
 
    	$pdf = PDF::loadview('manager.barang.barang_pdf',compact('barang'));
    	return $pdf->download('laporan-barang.pdf');
    }

    public function distributorIndex(){
        $distributor = Distributor::all();
        return view('manager.distributor.index', compact('distributor'))
        ->with('i');
    }

    public function cetakDistributor()
    {
    	$distributor = Distributor::all();
 
    	$pdf = PDF::loadview('manager.distributor.distributor_pdf',compact('distributor'));
    	return $pdf->download('laporan-distributor.pdf');
    }

    public function merekIndex(){
        $merek = Merek::all();
        return view('manager.merek.index', compact('merek'))
        ->with('i');
    }

    public function cetakMerek()
    {
    	$merek = Merek::all();
 
    	$pdf = PDF::loadview('manager.merek.merek_pdf',compact('merek'));
    	return $pdf->download('laporan-merek.pdf');
    }

    public function transaksiIndex(){
        $transaksi = Transaksi::all();
        return view('manager.transaksi.index', compact('transaksi'))
        ->with('i');
    }

    public function cetakTransaksi()
    {
    	$transaksi = Transaksi::all();
 
    	$pdf = PDF::loadview('manager.transaksi.transaksi_pdf',compact('transaksi'));
    	return $pdf->download('laporan-transaksi.pdf');
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan Barang From: ".$from."To:".$to;
        $startDate = $from;
        $endDate = $to;
 
        $barangs= Barang::whereBetween('tanggal_masuk', [$startDate,$endDate])->latest()->paginate(25);
 
        return view('manager.barang.cari', compact('barangs', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

    public function cariTransaksi(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
            ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $title="Laporan Barang From: ".$from."To:".$to;
        $startDate = $from;
        $endDate = $to;
 
        $transaksis= Transaksi::whereBetween('tanggal_beli', [$startDate,$endDate])->latest()->paginate(25);
 
        return view('manager.transaksi.cari', compact('transaksis', 'startDate', 'endDate'))->with('i', (request()->input('page', 1) - 1) * 25);
    }

}
