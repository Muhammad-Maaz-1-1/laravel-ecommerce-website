<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('visitors') }}/assets/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/themify-icons.css">
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/jquery-ui.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/reset.css">
	<link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('visitors') }}/assets/css/responsive.css">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
		
		<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-12 col-12">
							<!-- Top Left -->
							<div class="top-left">
								<ul class="list-main">
									<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
									<li><i class="ti-email"></i> support@shophub.com</li>
								</ul>
							</div>
							<!--/ End Top Left -->
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<!-- Top Right -->
							<div class="right-content">
								<ul class="list-main">
									<li><i class="ti-location-pin"></i> Store location</li>
									<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
							   @if (auth()->check())
                                    <li><i class="ti-user"></i> <a href="#">{{ auth()->user()->name }}</a></li>
                                @else
                                    <li><i class="ti-user"></i> <a href="#">My account</a></li>
                                    <li><i class="ti-power-off"></i><a href="{{ route('register') }}">Login</a></li>
                                @endif
																	<li><i class="ti-power-off"></i><a href="{{ route('register') }}">Login</a></li>
								</ul>
							</div>
							<!-- End Top Right -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="{{ route('home') }}"><img src="{{ asset('visitors') }}/assets/images/logo.png" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
									<select>
										<option selected="selected">All Category</option>
										<option>watch</option>
										<option>mobile</option>
										<option>kid’s item</option>
									</select>
									<form method="get" action="{{ route('search') }}">
										@csrf
										<input name="search" placeholder="Search Products Here....." type="search"value="">
										<button type="submit" class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
									<a href="{{ route('register') }}" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
									<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $cartItemCount }}</span></a>
									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span>{{ $cartItemCount }} Item</span>
											<a href="{{ route('cart') }}">View Cart</a>
										</div>
										<ul class="shopping-list">
										@foreach ($cartModel as $value )
											
											<li>
												<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
												<a class="cart-img" href="{{ route('cart') }}"><img src="{{ asset('uploads/'.$value->product->image) }}" alt="#"></a>
												<h4><a href="{{ route('cart') }}">{{ $value->name }}</a></h4>
												<p class="quantity"><span class="amount">{{ $value->price }}</span></p>
											</li>
										@endforeach
											
										</ul>
										<div class="bottom">
											<div class="total">
												<span>Total</span>
												<span class="total-amount">{{ $cartItemCount }}</span>
											</div>
											<a href="checkout.html" class="btn animate">Checkout</a>
										</div>
									</div>
									<!--/ End Shopping Item -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-lg-3">
								<div class="all-category">
									<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
									
									<ul class="main-category">
										@foreach($categoryModel as $key => $value)
													
										<li><a href="{{ route('shop_category',$value->id) }}">{{ $value->categoryName }}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-lg-9 col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="{{ asset('/') }}">Home</a></li>
													<li><a href="{{ asset('shop') }}">Shop<span class="new">New</span></a>
													</li>
													<li><a href="{{ asset('cart') }}">Cart</a></li>									
													<li><a href="{{ asset('blog') }}">Blog</a>
													</li>
													<li><a href="{{ asset('contact') }}">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->