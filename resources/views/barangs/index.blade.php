@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">

</div><div class align="center">
    <h2>Data Barang</h2>
    </div>
    <pre>
    <div class="pull-right">
    <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create New barang</a>
    </div>
    </div>

<div class="pull-right">
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama barang</th>
<th>Nama Merek</th>
<th>Nama Distributor</th>
<th>Harga Barang</th>
<th>harga beli</th>
<th>stok</th>
<th>Tanggal Masuk</th>
<th>Nama Petugas</th>
<th width="250px">Action</th>
</tr>

@foreach ($barangs as $barang)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $barang->nama_barang }}</td>
<td>{{ $barang->nama_merek }}</td>
<td>{{ $barang->nama_distributor }}</td>
<td>{{ $barang->harga_barang }}</td>
<td>{{ $barang->harga_beli}}</td>
<td>{{ $barang->stok }}</td>
<td>{{ $barang->tgl_masuk }}</td>
<td>{{ $barang->nama_petugas }}</td>
<td>
<form action="{{ route('barangs.destroy',$barang->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('barangs.show',$barang->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('barangs.edit',$barang->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger"  onclick="return confirm('apakah anda yakin menghapus? {{ $barang->nama_barang }}')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $barangs->links() !!}
@endsection


