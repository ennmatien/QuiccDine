@extends('template.app')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Items</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">Add Items</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('vendor.addBill', $t_id) }} " method="POST">
            @csrf
            
            <div class="form-group">
                <label>Item <span class="text-danger"></span></label>
                <input type="text" name="item" class="form-control">
            </div>

            <div class="form-group">
                <label>Price <span class="text-danger"></span></label>
                <input type="number" name="price" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection