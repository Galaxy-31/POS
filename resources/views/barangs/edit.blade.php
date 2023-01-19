@extends('barangs.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit barang</h2>
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
<form action="{{ route('barangs.update',$barang->id) }}" method="POST">
@csrf
@method('PUT')
<!-- Nama -->

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<input class="form-control"  name="nama_barang" value="{{$barang->nama_barang}}" placeholder="Nama Barang">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Merek:</strong>
<input  type="text" class="form-control"  name="nama_merek" value="{{$barang->nama_merek}}"placeholder="Nama Merek">
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Distributor:</strong>
<input class="form-control" style="height:70px" name="nama_distributor"value="{{ $barang->nama_distributor}}" placeholder="Nama Distributor"></input>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Harga Barang:</strong>
    <input min="0"type="number" class="form-control" name="harga_barang" value="{{ $barang->harga_barang }}"placeholder="Harga Barang"></input>
    </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Harga Beli:</strong>
        <input min="0"type="number" class="form-control" name="harga_beli" value="{{ $barang->harga_beli }}" placeholder="Harga Beli"></input>
        </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Stok:</strong>
            <input min="0"type="number"class="-form-control"value="{{ $barang->stok}}" name="stok" placeholder="Stok"></input>
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Tanggal Masuk:</strong>
                <input class="form-control"  name="tgl_masuk"value="{{ $barang->tgl_masuk}}" placeholder="Tanggal Masuk"></input>
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
