<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<link href='//fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
<link href="{{ asset('css/styles.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/component.css')}}" />
	<!-- animation-effect -->
<link href="{{ asset('css/animate.min.css')}}" rel="stylesheet">
<script src="{{ asset('js/wow.min.js')}}"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->

</head>
<body>
 <div class="header">
	<div class="container">
		<div class="logo animated wow pulse" data-wow-duration="1000ms" data-wow-delay="500ms">
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
			<p class="animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">QuiccDine, Quick Dining for Everyone!</p>
			<label></label>
			<h4 class="animated wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="500ms">Welcome To QuiccDine</h4>
			
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
				<div class="col-md-8 footer-top animated wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
					
						<span>There are many variations of passages</span>
				</div>
				<div class="col-md-4 footer-bottom  animated wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
					<h2>Follow Us</h2>
					<label><i class="glyphicon glyphicon-menu-up"></i></label>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis.</p>
					<ul class="social-ic">
						<li><a href="#"><i></i></a></li>
						<li><a href="#"><i class="ic"></i></a></li>
						<li><a href="#"><i class="ic1"></i></a></li>
						<li><a href="#"><i class="ic2"></i></a></li>
						<li><a href="#"><i class="ic3"></i></a></li>
					</ul>

				</div>
			<div class="clearfix"> </div>

			</div>
			<p class="footer-class animated wow bounce" data-wow-duration="1000ms" data-wow-delay="500ms">&copy; 2016 Cookery . All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		</div>
	</div>
	<!--//footer-->
</body>
</html>
