<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class transaksiController extends Controller
{
    public function index()
            {
            $transaksis = transaksi::latest()->paginate(5);
            $barangs = barang::all();
            return view('transaksis.index',compact('transaksis','barangs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            

    public function create()
            {
            return view('transaksis.create');
            }


public function store(Request $request){
        // $request->validate([
    
        //     'nama_barang' => 'required',
        //     'harga_barang' => 'required',
        //     'total_harga' => 'required',
        //     'total_bayar' => 'required',
        //     'kembalian' => 'required',
        //     'tanggal_beli' => 'required',

        // ]);


        // transaksi::create([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'total_barang'=>$request->total_barang,
        //     'total_harga' => $request->harga_barang *$request->total_barang,
        //     'total_bayar' => $request->harga_bayar,
        //     'kembalian' => $request->harga_bayar -($request->harga_barang * $request->total_barang),
        //     'tanggal_beli' => date('y-m-d'),
        // ]);
        // transaksi::create($request->all());
        // return redirect()->route('transaksis.index')
        // ->with('success','transaksi created successfully.');


        $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
                $total_harga = $request->total_barang  * $find_barang->harga_barang;
                if ($request->total_barang <= $find_barang->stok) {
                    if ($request->total_bayar < $total_harga) {
                        return redirect()->back()->with('error', 'Uang anda tidak mencukupi!');
                    }else{
                        Transaksi::create([
                            'nama_barang' => $request ->nama_barang,
                            'harga_barang' => $find_barang ->harga_barang,
                            'total_barang' => $request ->total_barang,
                            'total_harga' => $request ->total_barang  * $find_barang->harga_barang, 
                            'total_bayar' => $request ->total_bayar,
                            'kembalian' => $request ->total_bayar  - $request ->total_barang  * $find_barang ->harga_barang, 
                            'tanggal_beli' => Carbon::now(),
                            
                        ]);
                        FacadesDB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->total_barang]);
                    }
                }else{
                    return redirect()->back()->with('error', 'stok habis !');
                }

            return redirect()->route('transaksis.index')
            
            ->with('success','Transaksi Berhasil Ditambahkan.');
    }
        
    

    public function show(transaksi $transaksi)
        {
        return view('transaksis.show',compact('transaksi'));
        } 
    

    public function edit(transaksi $transaksi)
        {
        return view('transaksis.edit',compact('transaksi'));
        }
    

    public function update(Request $request, transaksi $transaksi)
        {
        // $request->validate([
        //     'nama_barang' => 'required',
        //     'harga_barang' => 'required',
        //     'total_harga' => 'required',
        //     'total_bayar' => 'required',
        //     'kembalian' => 'required',
        //     'tanggal_beli' => 'required',
        // ]);
        // transaksi::create([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'total_barang'=>$request->total_barang,
        //     'total_harga' => $request->harga_barang *$request->total_barang,
        //     'total_bayar' => $request->harga_bayar,
        //     'kembalian' => $request->harga_bayar -($request->harga_barang * $request->total_barang),
        //     'tanggal_beli' => date('y-m-d'),
        // ]);

        // $transaksi->update($request->all());
        // return redirect()->route('transaksis.index')
        // ->with('success','transaksi updated successfully');




        $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
        $total_harga = $request->total_barang  * $find_barang->harga_barang;
        if ($request->total_barang <= $find_barang->stok) {
            if ($request->total_bayar < $total_harga) {
                return redirect()->back()->with('error', 'Uang anda tidak mencukupi!');
            }else{
                Transaksi::create([
                    'nama_barang' => $request ->nama_barang,
                    'harga_barang' => $find_barang ->harga_barang,
                    'total_barang' => $request ->total_barang,
                    'total_harga' => $request ->total_barang  * $find_barang->harga_barang, 
                    'total_bayar' => $request ->total_bayar,
                    'kembalian' => $request ->total_bayar  - $request ->total_barang  * $find_barang ->harga_barang, 
                    'tanggal_beli' => Carbon::now(),
                    
                ]);
                FacadesDB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->total_barang]);
            }
        }else{
            return redirect()->back()->with('error', 'stok habis !');
        }

    return redirect()->route('transaksis.index')
    
    ->with('success','Transaksi Berhasil Ditambahkan.');
}





        
        
         public function destroy(transaksi $transaksi)
        {
        $transaksi->delete();
        return redirect()->route('transaksis.index')
        ->with('success','transaksi deleted successfully');
        }

        public function getHarga(Request $request)
          {
        $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)
                                ->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
    

}