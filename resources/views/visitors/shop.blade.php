
@include('visitors.layouts.header');

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
@foreach($categoryModel as $key => $value)
<li><a href="{{ route('shop_category',$value->id) }}">{{ $value->categoryName }}</a></li>
	
@endforeach									</ul>
								</div>
								<!--/ End Single Widget -->
								<!-- Shop By Price -->
									<div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										{{-- <div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span>
														<form action="" method="POST"
														></form>
														<input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div> --}}
										<div class="wrapper">
          
											<div class="price-input">
												
												<div class="field">
													<span>Min</span>
													<input type="number" class="input-min" value="2500">
												</div>
												<div class="separator">-</div>
												<div class="field">
													<span>Max</span>
													<input type="number" class="input-max" value="7500">
												</div>
											</div>
											<div class="slider">
												<div class="progress"></div>
											</div>
											<div class="range-input">
												<form action="{{ route('price_search') }}" method="POST">
													<input name="minRange" type="range" class="range-min" min="0" max="10000" value="2500" step="100">
													<input name="maxRange" type="range" class="range-max" min="0" max="10000" value="7500" step="100">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button class="btn mt-3" type="submit">Search by price</button>

												</form>
											</div>
										</div>
																		
										{{-- <ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul> --}}
									</div>
									<!--/ End Shop By Price -->
								<!-- Single Widget -->
								<div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<!-- Single Post -->
									@foreach($recentProducts as $key => $value)
										
									<div class="single-post first">
										<div class="image">
											<img src="{{ asset('uploads/' . $value->image) }}" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">{{ $value->name }}</a></h5>
											<p class="price">{{ $value->price }}</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									@endforeach

									<!-- End Single Post -->
									<!-- Single Post -->
									
									<!-- End Single Post -->
								</div>
								<!--/ End Single Widget -->
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div>
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul>
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
							@foreach($productModel as $key => $value)
								
							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="{{ route('product_detail',$value->id) }}">
											<img class="default-img" src="{{ asset('uploads'. '/'. $value->image) }}" alt="#">
											<img class="hover-img" src="{{ asset('uploads'. '/'. $value->image) }}" alt="#">
										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<a title="Add to cart" href="#">Add to cart</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="{{ route('product_detail',$value->id) }}">{{ $value->name }}</a></h3>
										<div class="product-price">
											<span>{{ $value->price }}</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="row">
								{{ $productModel->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->
		
		
		
		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>Flared Shift Dress</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>$29.00</h3>
										<div class="quickview-peragraph">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<h5 class="title">Size</h5>
													<select>
														<option selected="selected">s</option>
														<option>m</option>
														<option>l</option>
														<option>xl</option>
													</select>
												</div>
												<div class="col-lg-6 col-12">
													<h5 class="title">Color</h5>
													<select>
														<option selected="selected">orange</option>
														<option>purple</option>
														<option>black</option>
														<option>pink</option>
													</select>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" class="btn">Add to cart</a>
											<a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
			<style>
     
				.price-input {
					width: 100%;
					display: flex;
					margin: 30px 0 35px;
				}
		
				.price-input .field {
					display: flex;
					width: 100%;
					height: 45px;
					align-items: center;
				}
		
				.field input {
					width: 100%;
					height: 100%;
					outline: none;
					font-size: 12px;
					margin-left: 12px;
					border-radius: 5px;
					text-align: center;
					border: 1px solid #999;
					-moz-appearance: textfield;
				}
		
				input[type="number"]::-webkit-outer-spin-button,
				input[type="number"]::-webkit-inner-spin-button {
					-webkit-appearance: none;
				}
		
				.price-input .separator {
					width: 130px;
					display: flex;
					font-size: 19px;
					align-items: center;
					justify-content: center;
				}
		
				.slider {
					height: 5px;
					position: relative;
					background: #ddd;
					border-radius: 5px;
				}
		
				.slider .progress {
					height: 100%;
					left: 25%;
					right: 25%;
					position: absolute;
					border-radius: 5px;
					background: #17a2b8;
				}
		
				.range-input {
					position: relative;
				}
		
				.range-input input {
					position: absolute;
					width: 100%;
					height: 5px;
					top: -5px;
					background: none;
					pointer-events: none;
					-webkit-appearance: none;
					-moz-appearance: none;
				}
		
				input[type="range"]::-webkit-slider-thumb {
					height: 17px;
					width: 17px;
					border-radius: 50%;
					background: #17a2b8;
					pointer-events: auto;
					-webkit-appearance: none;
					box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
				}
		
				input[type="range"]::-moz-range-thumb {
					height: 17px;
					width: 17px;
					border: none;
					border-radius: 50%;
					background: #17a2b8;
					pointer-events: auto;
					-moz-appearance: none;
					box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
				}
		
				/* Support */
				.support-box {
					top: 2rem;
					position: relative;
					bottom: 0;
					text-align: center;
					display: block;
				}
		
				.b-btn {
					color: white;
					text-decoration: none;
					font-weight: bold;
				}
		
				.b-btn.paypal i {
					color: blue;
				}
		
				.b-btn:hover {
					text-decoration: none;
					font-weight: bold;
				}
		
				.b-btn i {
					font-size: 20px;
					color: yellow;
					margin-top: 2rem;
				}
			</style>
			 <script>
				const rangeInput = document.querySelectorAll(".range-input input"),
					priceInput = document.querySelectorAll(".price-input input"),
					range = document.querySelector(".slider .progress");
				let priceGap = 1000;
		
				priceInput.forEach((input) => {
					input.addEventListener("input", (e) => {
						let minPrice = parseInt(priceInput[0].value),
							maxPrice = parseInt(priceInput[1].value);
		
						if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
							if (e.target.className === "input-min") {
								rangeInput[0].value = minPrice;
								range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
							} else {
								rangeInput[1].value = maxPrice;
								range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
							}
						}
					});
				});
		
				rangeInput.forEach((input) => {
					input.addEventListener("input", (e) => {
						let minVal = parseInt(rangeInput[0].value),
							maxVal = parseInt(rangeInput[1].value);
		
						if (maxVal - minVal < priceGap) {
							if (e.target.className === "range-min") {
								rangeInput[0].value = maxVal - priceGap;
							} else {
								rangeInput[1].value = minVal + priceGap;
							}
						} else {
							priceInput[0].value = minVal;
							priceInput[1].value = maxVal;
							range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
							range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
						}
					});
				});
		
			</script>
		<!-- Start Footer Area -->
		@include('visitors.layouts.footer');
