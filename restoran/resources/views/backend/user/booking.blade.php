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
    background-color: rgba(0, 0, 0, 0.6);
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
        <div class="layer" style="width:100%; height:250px; background-image:url({{URL::asset('images/aa2.jpg')}});background-repeat: no-repeat; background-size: 100% auto; background-position: center;">
        <div class="layer">
        <br>
        <br>
        <br>

        <h1 class="display-4" style="color:white; margin-left:2rem; "> <strong>QuiccDine</strong></h1>
        <p class="lead" style="color:white; margin-left:2rem; "><strong>Pick a Restaurant to your liking</strong></p>
    </div>
    </div>
    </div>
    <center><h4> List of Restaurants </h4><center>
    <hr>
    <a href="{{ route('pelanggan.create') }} " class="btn btn-primary float-right">Booking Tempat</a>
    <div class="row" style="margin-left:4rem; margin-right:4rem; margin-bottom:2rem;">
            <!-- for every restaurants in database, make : -->
            
            @foreach ($transaction as $item)
            <div class="col-sm-4">
                <div class="card">

                <img src="{{ URL::asset('images/'.$item->image)}}" height="250px"  class="card-img-top" alt="gambar">
                    <div class="card-body">

                    <form action="{{ route('pelanggan.restaurant', $item->id ) }}" method="GET"> <!-- Go to user.restaurant.blade with the ID value of each card-->
                        <h5 class="card-title">{{$item->name}}</h5>
                        <hr>
                        <h6>{{$item->address}}</h6>
                        <h6>Operational Hour : {{$item->operational_hour}} WIB</h6>

                        
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
            
            
    </div>



@endsection
