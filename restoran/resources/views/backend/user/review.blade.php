@extends('template.appReview')

@section('content')



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">User Profile</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-primary">User Profile</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('pelanggan.reviews') }} " method="POST">
            @csrf
            
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
            <input type="hidden" name="vendor_id" value="{{ $vendor->id }} ">
            <div class="form-group">
                <label for="vendor name" class="normal">Vendor <span class="text-danger">*</span></label>
                
                <input type="text" name="vendor_name"  class="form-control" value="{{$vendor->name}}" readonly> </input>
                
            </div>
    <!-- RATING -->  
            
            <!-- star rating -->
            <center><div class="rating-wrapper">
                
                <!-- star 5 -->
                <input type="radio" id="5-star-rating" name="rating" value="5">
                <label for="5-star-rating" class="star-rating">
                <i class="fas fa-star d-inline-block"></i>
                </label>
                
                <!-- star 4 -->
                <input type="radio" id="4-star-rating" name="rating" value="4">
                <label for="4-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
                </label>
                
                <!-- star 3 -->
                <input type="radio" id="3-star-rating" name="rating" value="3">
                <label for="3-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
                </label>
                
                <!-- star 2 -->
                <input type="radio" id="2-star-rating" name="rating" value="2">
                <label for="2-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
                </label>
                
                <!-- star 1 -->
                <input type="radio" id="1-star-rating" name="rating" value="1">
                <label for="1-star-rating" class="star-rating star">
                <i class="fas fa-star d-inline-block"></i>
                </label>
                
            </div> </center>
            



            

            <div class="form-group">
                <label for="alamat" class="normal">Review</label>
                <textarea name="review"  cols="20" rows="5" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection
