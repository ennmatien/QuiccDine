@extends('template.app')


@section('head')
    <style>
        .image {
    display: block;
    position: relative;
    background-repeat: no-repeat;
    background-color: blue;
    background-position: center;

    width:100% ;
    height: 300px;
}
#foo{
    
    background-color:#2060ff;
    border: 1px solid #000;
    width:50px;
    height:50px;
    
}
.layer {
    background-color: rgba(0, 0, 0, 0.45);
    position: relative;
    height:250px;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
}   
        </style>


@endsection

@section('content')


<div class="p-5 mb-4 bg-light rounded-3">
      <div class="layer" style="width:100%; height:250px; background-image:url({{URL::asset('images/'.$vendor->image)}});background-repeat: no-repeat; background-size: 100% auto; background-position: center;">
            <div class="layer">
                </br>
                </br>
                </br>
                <h1 class="display-5 fw-bold" style="color:white; margin-left:2rem; ">{{$vendor->name}}</h1>
                <p class="col-md-8 fs-4" style="color:white; margin-left:2rem; ">{{$vendor->address}}</p> 
            </div>
      </div>
    </div>
    <div class="container" style="margin-top:-3%">
        <div class="container">
        <form action="{{ route('pelanggan.create', $vendor->id ) }}" method="GET"> 
            <button type="submit" class="btn btn-primary float-right btn-lg">Book Now</button>
        </form>
        <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Overview</button>
            </li>
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Menu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Reviews</button>
            </li> -->
        </ul>

        


        </div>


            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>    
                <h3><strong>Descriptions</strong></h3>
                <p>{{$vendor->descr}}</p>
                <br>
                <h3><strong>Operational Hours</strong></h3>
                <p>{{$vendor->operational_hour}} WIB</p>
                <br>
                <h3><strong>Address</strong></h3>
                <p>{{$vendor->address}}</p>
                <br>
                <h3><strong>Reviews</strong></h3>
                
                
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">ABC</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">wowowo</div>
            </div>
            

            <!-- Reviews -->
    @if ($reviews->isempty())
    <form action="{{ route('pelanggan.review',$vendor->id) }}" method="GET"> 
        <!-- @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
            <input type="hidden" name="user_id" value="{{ $vendor->id }} "> -->
            <button type="submit" class="btn btn-primary float-right">Review this Restaurant</button>
        </form>
    @else
    <form action="{{ route('pelanggan.review', $vendor->id) }}" method="GET"> 
        <!-- @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }} ">
            <input type="hidden" name="user_id" value="{{ $vendor->id }} "> -->
            <button type="submit" class="btn btn-primary float-left">Review this Restaurant</button>
        </form>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                @foreach ($reviews as $key => $value)
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <i class="bi bi-person-circle fa-2x" style="margin-right:1rem"></i>
                        <span><small class="font-weight-bold text-primary">{{$value->name_user}}</small> </br>
                        <small class="font-weight-bold">{{$value->review}}</small></span> </div> <small>2 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> </div>
                        <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> {{$value->rating}}/5<i class="fa fa-check-circle-o check-icon"></i> </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
    @endif


    </div>
    
    
    <br>
    <br>
    <br>


@endsection