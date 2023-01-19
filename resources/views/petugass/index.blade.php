@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class align="center">
<h2>Data Petugass</h2>
</div>
<pre>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('petugass.create') }}"> Create New petugas</a>
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
<th>Nama petugas</th>
<th width="280px">Action</th>
</tr>
@foreach ($petugass as $petugas)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $petugas->nama_petugas }}</td>
<td>
<form action="{{ route('petugass.destroy',$petugas->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('petugass.show',$petugas->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('petugass.edit',$petugas->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger"  onclick="return confirm('apakah anda yakin menghapus? {{ $petugas->nama_petugas }}')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $petugass->links() !!}
@endsection
