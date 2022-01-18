<h1>vendor : {{$vendor}}</h1>
<h1>vendor 2 : {{$vendor2}}</h1>
<h1>{{$vendor2->name}}</h1>

@foreach ($vendor as $key => $x)
    <h1>{{$x->review}}</h1>
@endforeach