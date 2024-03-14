@include('visitors.layouts.header');
<style>
    button#updateBtn {
        padding: 10px;
    }
</style>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @csrf
                        @foreach ($cartModel as $value)
                            <tr>
                                <td class="image" data-title="No"><img
                                        src="{{ asset('uploads') . '/' . $value->product->image }}" alt="#">
                                </td>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a href="#">{{ $value->name }}</a></p>
                                    <p class="product-des">{{ $value->product->description }}</p>
                                </td>
                                <td class="price" data-title="Price"><span>{{ $value->product->price }}</span></td>
                                <td class="qty" data-title="Qty"><!-- Input Order -->
                                    <div class="input-group">
                                        <form action="{{ url('/ajaxupload') }}" method="POST" id="cart">
                                            @csrf
                                            <input id="minus" type="button" value="-" />
                                            <input id="quantity" type="text" value="{{ $value->quantity }}"
                                                name="quantity" />
                                            <input id="plus" type="button" value="+" />
                                            <input id="plus" type="hidden" name="product_id"
                                                value="{{ $value->product_id }}" />
                                            <button id="updateBtn" class="btn" type="submit"
                                                disabled>Update</button>
                                        </form>

                                    </div>

            </div>
            <!--/ End Input Order -->
            </td>
            <td class="total-amount" data-title="Total">
                <span id="totalPrice">{{ $value->price }}</span>
            </td>

            <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
            </tr>
            @endforeach

            </tbody>
            </table>
            <!--/ End Shopping Summery -->
        </div>
    </div>

</div>
<form action="{{ route('checkout') }}" method="post" id="checkout-form">
    @csrf
    <input type="hidden" name="sessionId" value="">
    <button type="submit" id="checkout-button" class="btn">Checkout</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</div>

<script>
       $(document).ready(function() {
        $('#cart').on('submit', function(event) {
            event.preventDefault();
            // Serialize the form data
            var formData = $(this).serialize();
            
            $.ajax({
                url: "{{ url('/ajaxupload') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    alert(response.message); // Display success message
                },
                error: function(xhr, status, error) {
                    alert("An error occurred while updating the price."); // Display error message
                }
            });
        });
    });

</script>
<!--/ End Shopping Cart -->
<script>
    $(document).ready(function() {
        // Increment quantity
        $('#plus').on('click', function() {
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
            $('#updateBtn').prop('disabled', false);
        });

        // Decrement quantity
        $('#minus').on('click', function() {
            var quantity = parseInt($('#quantity').val());
            if (quantity > 1) {
                $('#quantity').val(quantity - 1);
                $('#updateBtn').prop('disabled', false);
            }
        });

        // Enable update button when quantity is changed
        $('#quantity').on('input', function() {
            $('#updateBtn').prop('disabled', false);
        });

        // Update button click event
        // Update button click event
        $('#updateBtn').on('click', function() {
            var quantity = parseInt($('#quantity').val());
            var totalPrice = parseFloat($('#totalPrice').text());

            // Calculate new total price
            var newTotalPrice = quantity * totalPrice;

            if (!isNaN(newTotalPrice)) {
                // Update displayed total price
                $('#totalPrice').text(newTotalPrice.toFixed(2));

                // AJAX request to update cart in the database

            } else {
                // Handle case where newTotalPrice is not valid
                console.error('Invalid total price');
            }
        });

    });
</script>
<!-- Start Shop Services Area  -->
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->

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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        class="ti-close" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="images/modal1.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal2.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal3.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal4.jpg" alt="#">
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad
                                    impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo
                                    ipsum numquam.</p>
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
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled"
                                            data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number" data-min="1"
                                        data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                            data-field="quant[1]">
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
@include('visitors.layouts.footer');
