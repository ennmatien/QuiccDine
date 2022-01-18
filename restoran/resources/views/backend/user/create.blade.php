@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Bookings</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">Add Bookings</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pelanggan.pesan') }} " method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
            <div class="form-group">
                <label for="nomor_telp">Vendor <span class="text-danger">*</span></label>
                    @php
                    if ($vendorCount == 1){
                    @endphp
                    <select name="vendor_id" readonly class="form-control">
                    
                    <option value="{{ $vendor->id }} " >{{ $vendor->name }} </option>
                    @php
                    } else {
                    @endphp
                        <select name="vendor_id" class="form-control">
                        @foreach ($vendor as $item)
                            <option value="{{ $item->id }} ">{{ $item->name }} </option>
                        @endforeach
                    @php
                    }
                    @endphp
                </select>
            </div>
            <!-- <div class="form-group">
                <label>Nomor Meja <span class="text-danger">*</span></label>
                <input type="number" name="table_number" class="form-control" min="0">
            </div> -->
            <div class="form-group">
                <label>Jam <span class="text-danger">*</span></label>
                <input type="time" name="jam" class="form-control">
            </div>
            <div class="form-group">
                <label>Hari <span class="text-danger">*</span></label>
                <input type="date" name="hari" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat">Deskripsi</label>
                <textarea name="deskripsi"  cols="20" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                    <button type="reset" class="btn btn-sm btn-outline-secondary">Reset</button>
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection
