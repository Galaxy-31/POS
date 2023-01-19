<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\merek;
use App\Models\barang;
use App\Models\distributor;
use App\Models\Transaksi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $mereks = merek::latest()->paginate(5);
        $barangs = barang::all();
        $transaksis = transaksi::all();
        $distributors = distributor::all();
return view('dashboard', compact('barangs', 'mereks', 'transaksis','distributors'));
    }
}