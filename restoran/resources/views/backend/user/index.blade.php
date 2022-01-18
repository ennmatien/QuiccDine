@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">User Profile</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">User Profile</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pelanggan.post') }} " method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">

            <div class="form-group">
                <label for="nomor_telp">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telp" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telp">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="nomor_telp" name="email" value="{{ $user->email }}" required readonly>
            </div>

            <div class="form-group">
                <label for="nomor_telp">Nomor Telepon <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="nomor_telp" name="phone" value="{{ isset($profile) ? $profile->phone: old('phone') }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <textarea name="address" id="alamat" cols="20" rows="10" class="form-control">{{ isset($profile) ? $profile->address: old('address') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Save</button>
            </div>
        </form>

        <div class="form-group">
            <form action="{{ route('pelanggan.delete',Auth::user()->id) }} " method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Delete Account?</button>
            </form>
            </div>

    </div>
</div>

@endsection
