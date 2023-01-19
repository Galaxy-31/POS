@extends('barangs.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New barang</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@php
    $mereks = App\Models\Merek::all();
    $distributors = App\Models\Distributor::all();
    $petugass = App\Models\Petugas::all();
   
@endphp
<form action="{{ route('barangs.store') }}" method="POST">
@csrf
<!-- Nama Barang -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<input  type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"> </input>
</div>
</div>
<!-- Nama Barang -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama merek:</strong>
    
    <select class="form-control" name="nama_merek" id="">
        <option disabled selected option>Pilih nama merek</option>
       @foreach ($mereks as $merek )
           
       <option value="{{$merek->nama_merek}}">{{$merek->nama_merek}}</option>
       @endforeach
       
    </select>
    </div>
    </div>
<!-- Nama Merek-->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama distributor:</strong>

<select class="form-control" name="nama_distributor" id="">
    <option disabled selected option>Pilih nama distributor</option>
   @foreach ($distributors as $distributor )
       
   <option value="{{$distributor->nama_distributor}}">{{$distributor->nama_distributor}}</option>
   @endforeach
   
</select>
</div>
</div>
<!-- Nama Merek-->

<!-- Nama Distributor -->

<!-- Nama Distributor -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Harga Barang:</strong>
    <input min="0" type="number" name="harga_barang" class="form-control" placeholder="Harga Barang"></textarea>
    </div>
    </div>

    <!-- Harga Beli -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Harga Beli:</strong>
    <input min="0"  type="number" name="harga_beli" class="form-control" placeholder="Harga Beli"></textarea>
    </div>
    </div>

    <!--Stok -->
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Stok:</strong>
        <input type="number" name="stok" class="form-control" placeholder="Stok"></textarea>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Tanggal Masuk:</strong>
            <input type="date" name="tgl_masuk"  class="form-control" placeholder="Tanggal Masuk"></textarea>
            </div>
            </div>

            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form">
                <strong>Petugas:</strong>   
                <input type="text" name="nama_petugas" class="form-control" placeholder="" readonly value="{{auth()->user()->name}} ">
                </div>
                </div>
                       
                  
               
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection

