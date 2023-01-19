<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Merek;
use App\Models\distributor;
use App\Models\petugas;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
            {
                $barangs = Barang::latest()->paginate(5);
                $mereks = Merek::all();
                $distributors = Distributor::all();
                $petugass = Petugas::all();
                return view('barangs.index',compact('barangs','mereks','distributors','petugass'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            

    public function create()
            {
            return view('barangs.create');
            }


public function store(Request $request){
        $request->validate([
        'nama_barang' => 'required',
        'nama_merek' => 'required',
        'harga_barang' => 'required',
        'harga_beli' => 'required',
        'stok' => 'required',
        'tgl_masuk' => 'required',
        'nama_petugas' => 'required',
        
        ]);
        barang::create($request->all());
        return redirect()->route('barangs.index')
        ->with('success','barang created successfully.');
        }
    

    public function show(barang $barang)
        {
        return view('barangs.show',compact('barang'));
        } 
    

        public function edit(barang $barang)
        {
           $mereks = merek::all();
           $distributors = distributor::all();
        return view('barangs.edit',compact('barang','mereks','distributors'));
        }
    

    public function update(Request $request, barang $barang)
        {
        $request->validate([
            
            'nama_barang' => 'required',
            'nama_merek' => 'required',
            'harga_barang' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'tgl_masuk' => 'required',
            'nama_petugas' => 'required',
        
        ]);
        $barang->update($request->all());
        return redirect()->route('barangs.index')
        ->with('success','barang updated successfully');
        }


        public function destroy(barang $barang)
        {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success','barang deleted successfully');
        }

}
