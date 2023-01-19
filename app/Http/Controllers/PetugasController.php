<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    public function index()
    {
    $petugass = petugas::latest()->paginate(5);
    return view('petugass.index',compact('petugass'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create()
    {
    return view('petugass.create');
    }
    
    public function store(Request $request){
        $request->validate([
        'nama_petugas' => 'required',

        ]);
        petugas::create($request->all());
        return redirect()->route('petugass.index')
        ->with('success','petugas created successfully.');
        }
        

        public function show(petugas $petugas)
        {
        return view('petugass.show',compact('petugas'));
        } 
        

 
public function edit(petugas $petugas)
{
return view('petugass.edit',compact('petugas'));
}


 
public function update(Request $request, petugas $petugas)
{
$request->validate([
'nama_petugas' => 'required',

]);
$petugas->update($request->all());
return redirect()->route('petugass.index')
->with('success','petugas updated successfully');
}



public function destroy(petugas $petugas)
{
$petugas->delete();
return redirect()->route('petugass.index')
->with('success','petugas deleted successfully');
}

}
