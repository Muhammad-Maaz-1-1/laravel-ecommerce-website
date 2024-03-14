@include('visitors.layouts.header')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .container {
        width: 80%;
        margin: 20px auto;
    }

    .product {
        display: flex;
        justify-content: space-between;
    }

    .product img {
        max-width: 50%;
        height: auto;
    }

    .product-info {
        max-width: 40%;
        padding: 20px;
        box-sizing: border-box;
    }

    .product-title {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 18px;
        color: #e44d26;
        margin-bottom: 10px;
    }

    .product-description {
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .related-products {
        margin-top: 40px;
    }

    .related-product {
        margin-bottom: 20px;
    }

    .related-product img {
        max-width: 100%;
        height: auto;
    }

    .related-product-title {
        font-size: 18px;
        margin-top: 10px;
    }


    body .container .product-container img {
        opacity: 0.9;
        padding: 20px 0;
    }

    body .container .product-container .product {
        width: 150px;
        text-align: center;
        margin-left: 0;
        display: inline-block;
    }

    body .container .product-counter {
        width: 300px;
        margin-top: 40px;
        display: inline-block;
    }

    body .container input[type=text] {
        font-family: "Raleway", serif;
        font-weight: bold;
        outline-style: none;
        text-align: center;
        height: 50px;
        width: 100px;
        margin-left: -4px;
        position: relative;
        top: -7px;
        padding: 0 10px;
        background: #f74d4d;
        border: none;
        color: #d0fcfb;
        -webkit-transition: all ease 0.3s;
        -moz-transition: all ease 0.3s;
        -ms-transition: all ease 0.3s;
        -o-transition: all ease 0.3s;
        transition: all ease 0.3s;
    }

    body .container input[type=button] {
        background-color: #f74d4d;
        cursor: pointer;
        outline-style: none;
        width: 50px;
        height: 50px;
        border: 0;
        color: #d0fcfb;
        text-align: center;
        line-height: 26px;
        font-size: 36px;
        font-family: "Raleway", serif;
        -webkit-transition: all ease 0.3s;
        -moz-transition: all ease 0.3s;
        -ms-transition: all ease 0.3s;
        -o-transition: all ease 0.3s;
        transition: all ease 0.3s;
    }

    body .container input[type=button]#minus {
        border-radius: 10px 0 0 10px;
    }

    body .container input[type=button]#plus {
        border-radius: 0 10px 10px 0;
        margin-left: -4px;
    }

    body .container input#total-price {
        font-family: "Raleway", serif;
        font-size: 60px;
        width: 249px;
        border: 0;
        color: #f74d4d;
        background-color: #ffffff;
    }

    body .container .skuBestPrice {
        font-family: "Raleway", serif;
    }

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<div class="container">
    <div class="product">
        <form method="post" action="{{ route('cart_submit') }}">
        @csrf
            <img src="{{ asset('uploads/' . $productModel->image) }}" alt="Product Image">
            <ul>
          @foreach ($productModel->images as $image)
   <li> <img src="{{ asset('uploads/' . $image->gallery_image) }}" alt="Product Image">
@endforeach

            </ul>
            <div class="product-info">
                <h2 class="product-title">{{ $productModel->name }}</h2>
                <input type="hidden" name="product_id" value="{{ $productModel->id }}">
                <p class="product-description">{{ $productModel->description }}</p>
                <div class="product-counter">
                    <div class="product-counter">
                        <input id="minus" type="button" value="-" />
                        <input id="quantity" type="text" value="1" name="quantity" />
                        <input id="plus" type="button" value="+" />
                    </div><br />
                    <label>US$:</label>
                    <input id="total-price" name="price" readonly="readonly" value="0,00" />
                    <div class="price-best-price" style="display: block">
                        <label>Unit:</label><strong class="skuBestPrice">{{ $productModel->price }}</strong>
                    </div>
                    <div class="button">
                    @if (auth()->check())
                        
                        <button type="submit" class="btn">
                            ADD TO CART
                        </button>
                        @else
                        <a class="nav-link d-block btn" href="{{ route('register') }}">
                            ADD TO CART
                        </a>
                    @endif
                    </div>
                </div>
            </div>
        </form>

        <script>
            $('#plus').click(function add() {
                var $qtde = $("#quantity");
                var a = $qtde.val();

                a++;
                $("#minus").attr("disabled", !a);
                $qtde.val(a);
            });
            $("#minus").attr("disabled", !$("#quantity").val());

            $('#minus').click(function minusButton() {
                var $qtde = $("#quantity");
                var b = $qtde.val();
                if (b >= 1) {
                    b--;
                    $qtde.val(b);
                } else {
                    $("#minus").attr("disabled", true);
                }
            });

            /* On change */
            $(document).ready(function() {
                function updatePrice() {
                    var priceProduct = parseFloat($.trim($('.skuBestPrice').html().replace(",", "").replace("R$", "")));
                    var convertion = ((priceProduct) / 100).toFixed(2);
                    //var convertion = convertion.replace(".",",");
                    var price = parseFloat($("#quantity").val());
                    var total = ((convertion) * (price)).toFixed(2);
                    //var total = (price + 0) * 1;
                    //var total = total.toFixed(2);
                    var finalPrice = total.toString().replace(/\./g, ',');
                    $("#total-price").val(finalPrice);
                }
                // On the click/keyup/change
                $(document).ready(function() {
                    updatePrice();
                });
                //$(document).on("load", "input", updatePrice);
                $(document).on("click", "input", updatePrice);
                $(document).on("keyup", "input", updatePrice);
                $(document).on("change", "input", updatePrice);

                $('#quantity').on('change keyup focus', function() {
                    var removeLetters = $(this).val().replace(/[^0-9]/g, '');
                    $(this).val(removeLetters);
                });

            });

        </script>

    </div>
</div>
@include('visitors.layouts.footer')
