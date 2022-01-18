@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">My Restaurant</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">Restaurant's Profile</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('vendor.post') }} " method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">

            <div class="form-group">
                <label for="nama">Nama Restoran<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama" name="name" value="{{ isset($vendor) ? $vendor->name : old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi Restoran<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nama" name="descr" value="{{ isset($vendor) ? $vendor->descr : old('descr') }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telp">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="nomor_telp" name="phone" value="{{ isset($vendor) ? $vendor->phone: old('phone') }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telp">Nomor Rekening <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="nomor_telp" name="rekening" value="{{ isset($vendor) ? $vendor->rekening: old('rekening') }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telp">Nama Rekening <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telp" name="nama_rekening" value="{{ isset($vendor) ? $vendor->nama_rekening: old('nama_rekening') }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telp">Jam Operasional <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telp" name="operational_hour" value="{{ isset($vendor) ? $vendor->operational_hour: old('operational_hour') }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <textarea name="address" id="alamat" cols="20" rows="6" class="form-control">{{ isset($vendor) ? $vendor->address: old('address') }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama">Gambar Restoran<span class="text-danger"></span></label>
                <input type="file" class="form-control" id="nama" name="images">
            </div>
            @if (isset($vendor))
            <div class="container float-left" style="height:250px; width:250px;">
            <img src="{{ URL::asset('images/'.$vendor->image)}}"   class="card-img-top" alt="gambar">
            @endif

            <div class="form-group" style="margin-top:2rem;">
                <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>
        <div class="form-group" style="margin-top:1rem; width:100%">
            <form action="{{ route('vendor.delete',Auth::user()->id) }} " method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger float-left">Delete Account?</button>
            </form>
            </div>
    </div>
</div>

@endsection
