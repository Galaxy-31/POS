@extends('transaksis.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit transaksi</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
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
<form action="{{ route('transaksis.update',$transaksi->id) }}" method="POST">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<input class="form-control" disabled name="nama_barang" value="{{ $transaksi->nama_barang }}" placeholder="Nama Barang"></input>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>harga Barang:</strong>
    <input class="form-control" disabled name="harga_barang" value="{{ $transaksi->harga_barang }}"placeholder="harga barang"></input>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>total harga:</strong>
        <input class="form-control" disabled name="total_harga" value="{{ $transaksi->total_harga }}" placeholder="Total Haarga"></input>
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Total Bayar:</strong>
            <input class="form-control" disabled name="total_bayar" value="{{ $transaksi->total_bayar }}"placeholder="Total BAYAR"></input>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Kembalian:</strong>
                <input class="form-control" disabled name="kembalian" value="{{ $transaksi->kembalian }}"placeholder="Kembalian"></input>
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Kembalian:</strong>
                    <input class="form-control" disabled name="tanggal_beli" value="{{ $transaksi->tanggal_beli }}"placeholder="Tanggal Kembalian"></input>
                    </div>
                    </div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
