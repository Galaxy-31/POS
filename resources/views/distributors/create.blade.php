@extends('distributors.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class align="center">
<h2>Add New Distributor</h2>
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
<form action="{{ route('distributors.store') }}" method="POST">
@csrf


<!-- Nama -->
<!-- Pembimbing -->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Distributor:</strong>
<input class="form-control" name="nama_distributor" placeholder="Nama Distributor"></input>
</div>
</div>
<!-- Pembimbing -->
<!-- Alamat -->
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Alamat:</strong>
    <textarea class="form-control" style="height:150px" name="alamat" placeholder="Alamat"></textarea>
    </div>
    </div>
    <!-- /Alamat -->
<!-- no telepon-->
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>No Telepon:</strong>
<input min="0"type="number" name="no_telp" class="form-control" placeholder="No Telepon"> 
</div>
</div>
<!-- no telepon-->

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
