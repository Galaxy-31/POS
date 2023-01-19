@extends('layouts.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class align="center">
<h2>Data mereks</h2>
</div>
<pre>
<div class="pull-right">
<a class="btn btn-success" href="{{ route('mereks.create') }}"> Create New merek</a>
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
<th>Nama Merek</th>
<th width="280px">Action</th>
</tr>
@foreach ($mereks as $merek)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $merek->nama_merek }}</td>
<td>
<form action="{{ route('mereks.destroy',$merek->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('mereks.show',$merek->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('mereks.edit',$merek->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger"  onclick="return confirm('apakah anda yakin menghapus? {{ $merek->nama_merek }}')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $mereks->links() !!}
@endsection
