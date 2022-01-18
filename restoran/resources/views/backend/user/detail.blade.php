@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Booking Details</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">Booking Details</h6>
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf


            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">

            <div class="form-group">
                <label for="nomor_telp">Vendor <span class="text-danger">*</span></label>
                <select name="vendor_id"  class="form-control" disabled>
                    <option value=""> {{ $transaction->name_vendor }} </option>
                </select>
            </div>
            <!-- -->
            <div class="form-group">
                <label>Jam <span class="text-danger">*</span></label>
                <input type="text" name="jam" class="form-control" value="{{ $transaction->jam }}" disabled>
            </div>

            <div class="form-group">
                <label for="alamat">Deskripsi</label>
                <textarea name="deskripsi" disabled cols="20" rows="5" class="form-control">{{ $transaction->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Nama Rekening <span class="text-danger">*</span></label>
                <input type="text" name="table_number" class="form-control" value="{{ $transaction->nama_rekening }}" disabled>
            </div>
            <div class="form-group">
                <label>Silahkan Transfer ke Nomor Rekening <span class="text-danger">*</span></label>
                <input type="text" name="table_number" class="form-control" value="{{ $transaction->rekening }}" disabled>
            </div>

            

        </form>

    </div>
</div>

@endsection
