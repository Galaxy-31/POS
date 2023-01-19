<?php

namespace App\Http\Controllers;

use App\Models\merek;
use Illuminate\Http\Request;

class merekController extends Controller
{
    public function index()
    {
    $mereks = merek::latest()->paginate(5);
    return view('mereks.index',compact('mereks'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create()
    {
    return view('mereks.create');
    }
    
    public function store(Request $request){
        $request->validate([
        'nama_merek' => 'required',

        ]);
        merek::create($request->all());
        return redirect()->route('mereks.index')
        ->with('success','merek created successfully.');
        }
        

        public function show(merek $merek)
        {
        return view('mereks.show',compact('merek'));
        } 
        

 
public function edit(merek $merek)
{
return view('mereks.edit',compact('merek'));
}


 
public function update(Request $request, merek $merek)
{
$request->validate([
'nama_merek' => 'required',

]);
$merek->update($request->all());
return redirect()->route('mereks.index')
->with('success','merek updated successfully');
}



public function destroy(merek $merek)
{
$merek->delete();
return redirect()->route('mereks.index')
->with('success','merek deleted successfully');
}

}
