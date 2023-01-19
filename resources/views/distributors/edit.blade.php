@extends('distributors.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit distributor</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('distributors.index') }}"> Back</a>
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
<form action="{{ route('distributors.update',$distributor->id) }}" method="POST">
@csrf
@method('PUT')
<div class="row">
{{-- <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ID:</strong>
<input type="number" name="id" value="{{ $distributor->name }}" class="form-control" placeholder="ID">
</div>
</div> --}}
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Distributor:</strong>
<textarea class="form-control" style="height:150px" name="nama_distributor" placeholder="Nama Distributor">{{ $distributor->nama_distributor }}</textarea>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Alamat:</strong>
    <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat">{{ $distributor->alamat }}</textarea>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>no telepon:</strong>
        <input min="0"  type="number" class="form-control" value="{{ $distributor->no_telp }}" name="no_telp" placeholder="no telepon">
        </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
