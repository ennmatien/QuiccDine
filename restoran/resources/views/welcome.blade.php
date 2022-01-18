
<!DOCTYPE html>
<html>
<head>
<title>QuiccDine</title>
<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>

<link href="{{ asset('css/styles.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css')}}" />
	

</head>
<body>
 <div class="header">
	<div class="container">
		<div class="logo">
			<h1><a href="">QuiccDine</a></h1>
		</div>
		<div class="nav-icon">
			<a href="#" class="navicon"></a>
				<div class="toggle">
					<ul class="toggle-menu">
						<li><a class="active" href="/">Home</a></li>
						<li><a  href="{{ route('login') }}">Login</a></li>
						<li><a  href="{{ route('register') }}">Register</a></li>
					</ul>
				</div>
			<script>
			$('.navicon').on('click', function (e) {
			  e.preventDefault();
			  $(this).toggleClass('navicon--active');
			  $('.toggle').toggleClass('toggle--active');
			});
			</script>
		</div>
	<div class="clearfix"></div>
	</div>
	<!-- start search-->
		<div class="banner">
			<p >QuiccDine, Quick Dining for Everyone!</p>
			<label></label>
			<h4 >Welcome To QuiccDine</h4>
			
		</div>
</div>
<!--content-->
<div class="p-5 mb-4 bg-light rounded-3">
        <h1 class="display-4" style="color:white; margin-left:2rem; "> <strong>QuiccDine</strong></h1>
        <p class="lead" style="color:white; margin-left:2rem; "><strong>Pick a Restaurant to your liking</strong></p>
    
    </div>
    <center><h1> List of Restaurants </h1><center>
    <hr>
	<div class="row" style="margin-left:4rem; margin-right:4rem; margin-bottom:2rem;">
            <!-- for every restaurants in database, make : -->
            
            @foreach ($transaction as $item)
            <div class="col-sm-4">
                <div class="card">

                <img src="{{ URL::asset('images/'.$item->image)}}" height="250px"  class="card-img-top" alt="gambar">
                    <div class="card-body">

                    <form action="{{ route('pelanggan.restaurant', $item->id ) }}" method="GET"> 
						<br>
                        <h3 class="card-title">{{$item->name}}</h3>
                        <hr>
						<h4>{{$item->address}}</h4>
                        <h4>Operational Hour : {{$item->operational_hour}} WIB</h4>
						<br>

                        <button type="submit" class="btn btn-primary btn-lg">Book Now</button>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
            
            
    </div>

<!--footer-->
<div class="footer">
		<div class="container">
			<div class="footer-head">
				<div class="col-md-4-center footer-bottom" >
					<h2>Follow Us</h2>
					<label><i class="glyphicon glyphicon-menu-up"></i></label>
					<p>Follow kami agar tidak ketinggalan info terupdate mengenai restoran disekitarmu</p>
					<ul class="social-ic">
						<li><a href="#"><i></i></a></li>
						<li><a href="#"><i class="ic"></i></a></li>
						<li><a href="#"><i class="ic1"></i></a></li>
						<li><a href="#"><i class="ic2"></i></a></li>
						<li><a href="#"><i class="ic3"></i></a></li>
					</ul>
					&nbsp
				</div>
			<div class="clearfix"> </div>

			</div>
			<p class="footer-class pt-3">Design by  <a href="#" target="_blank">Kelompok 8</a> </p>
		</div>
	</div>
	<!--//footer-->
</body>
</html>
