@extends('transaksis.layout')
@section('content')
<div class="row">
    @if ($message = Session::get('error'))
<div class="alert alert-error">
<p>{{ $message }}</p>
</div>
@endif
<div class="col-lg-12 margin-tb">
<div class align="center">
<h2>Add New transaksi</h2>
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
@php
    $barangs = App\Models\Barang::all();
   
@endphp
<form action="{{ route('transaksis.store') }}" method="POST">
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Nama Barang:</strong>
    
    <select class="form-control" name="nama_barang" id="nama_barang">
        <option disabled selected option>Pilih nama barang</option>
       @foreach ($barangs as $barang )
       
           
       <option value="{{$barang->nama_barang}}">{{$barang->nama_barang}} {{$barang->stok}}</option>
       @endforeach
       
    </select>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Harga Barang:</strong>
        <div id="harga">
            <input type="number" name="harga_barang" class="form-control" placeholder="harga barang">
        </div>
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Total Barang:</strong>
            <input min="0" type="number" id="total_barang" name="total_barang" class="form-control" placeholder="total Barang">
            </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Total Harga:</strong>
                <input type="number" id="total_harga" disabled name="total_harga" class="form-control" placeholder="total harga">
                </div>
                </div>
                

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Total Bayar:</strong>
                    <input type="number" name="total_bayar" class="form-control" placeholder="total bayar">
                    </div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Kembalian:</strong>
                        <input type="number" name="kembalian" class="form-control" placeholder="kembalian">
                        </div>
                        </div> --}}

                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Tanggal Beli:</strong>
                            <input type="date" name="tanggal_beli" class="form-control" placeholder="Tanggal Beli">
                            </div>
                            </div> --}}

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nama_barang').on('change', function() {
            var namaBarang = $(this).val();
            $.ajax({
                type: 'GET',
                url: '{{ route('getHarga') }}?nama_barang=' + namaBarang,
                dataType: 'json',
                success: function (response) {
                    $.each(response.hargas, function (key, item) {
                        $('#harga').empty();
                        $('#harga').append('<input class="form-control" disabled id="harga_barang" name="harga_barang" value="'+ item.harga_barang +'" style="cursor: not-allowed;">')
                    });
                }
            });
        })
        $('#total_barang').on('keyup', function() {
            let price = $('#harga_barang').val();
            let qty = $(this).val();
            let total = price * qty;
            $('#total_harga').val(total);
        })
        $('#total_barang').on('keyup', function() {
            let bayar = $(this).val();

            $('#total_harga').html("uang tidak cukup");
        })
 
    });


</script>
@endsection
