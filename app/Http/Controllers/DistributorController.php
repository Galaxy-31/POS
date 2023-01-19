<?php

namespace App\Http\Controllers;

use App\Models\distributor;
use Illuminate\Http\Request;

class distributorController extends Controller
{
    public function index()
            {
            $distributors = distributor::latest()->paginate(5);
            return view('distributors.index',compact('distributors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            

    public function create()
            {
            return view('distributors.create');
            }


public function store(Request $request){
        $request->validate([
       
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',

        ]);
        distributor::create($request->all());
        return redirect()->route('distributors.index')
        ->with('success','distributor created successfully.');
        }
    

    public function show(distributor $distributor)
        {
        return view('distributors.show',compact('distributor'));
        } 
    

    public function edit(distributor $distributor)
        {
        return view('distributors.edit',compact('distributor'));
        }
    

    public function update(Request $request, distributor $distributor)
        {
        $request->validate([
            
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        
        ]);
        $distributor->update($request->all());
        return redirect()->route('distributors.index')
        ->with('success','distributor updated successfully');
        }


        public function destroy(distributor $distributor)
        {
        $distributor->delete();
        return redirect()->route('distributors.index')
        ->with('success','distributor deleted successfully');
        }

}
