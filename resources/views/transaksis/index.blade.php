@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
    <div class align="center">
        <h2>Data Transaksis</h2>
        </div>
        <pre>
        <div class="pull-right">
        <a class="btn btn-success" href="{{ route('transaksis.create') }}"> Create New transaksi</a>
        </div>
        </div>
        </div>
        </pre>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>nama barang</th>
<th>harga barang</th>
<th>total barang</th>
<th>total harga</th>
<th>total bayar</th>
<th>kembalian</th>
<th>tanggal beli</th>
<th width="280px">Action</th>
</tr>

@foreach ($transaksis as $transaksi)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $transaksi->nama_barang }}</td>
<td>{{ $transaksi->harga_barang}}</td>
<td>{{ $transaksi->total_barang }}</td>
<td>{{ $transaksi->total_harga }}</td>
<td>{{ $transaksi->total_bayar }}</td>
<td>{{ $transaksi->kembalian}}</td>
<td>{{ $transaksi->tanggal_beli }}</td>
<td>
<form action="{{ route('transaksis.destroy',$transaksi->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('transaksis.show',$transaksi->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('transaksis.edit',$transaksi->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger"  onclick="return confirm('apakah anda yakin menghapus? {{ $transaksi->nama_barang}}')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $transaksis->links() !!}
@endsection


