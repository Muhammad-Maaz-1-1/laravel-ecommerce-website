<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartModel;
use App\Models\categoryModel;
use App\Models\completeOrderModel;
use App\Models\productModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
class visitorsController extends Controller
{
    //
    public function index()
    {
        
        $productModel = productModel::get();
        $categoryModel = categoryModel::get();
        $userId = auth()->check();
        $cartModel = cart::where('user_id', $userId)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        $twoDaysAgo = Carbon::now()->subMinutes(32);

        $productModelMen = productModel::where('is_for', 'men')->get();
        $productModelWomen = productModel::where('is_for', 'women')->get();
        return view('visitors.index', compact('categoryModel', 'productModel', 'productModelMen', 'productModelWomen', 'cartModel', 'cartItemCount'));
    }
    public function search(Request $request){
        $userId = auth()->check();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        $cartModel = cart::where('user_id', $userId)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        $categoryModel = categoryModel::get();
        $productModel = productModel::paginate(6);
        $twoDaysAgo = Carbon::now()->subMinutes(32);
        $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->get();
 $searchQuery = $request->input('search');
    
    // Search for products based on the search query
    $products = productModel::where('name', 'like', "%$searchQuery%")->get();

    // If no products found, fetch some random products
    if ($products->isEmpty()) {
        $products = productModel::inRandomOrder()->take(10)->get();
    }
    $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->get();
    if ($recentProducts->isEmpty()) {
        $recentProducts = productModel::get();
    }
    return view('visitors.shop', compact('userId','cartItemCount','cartModel','categoryModel','recentProducts','productModel'))->with('products', $products);
}
    public function shop()
    {
        $userId = auth()->check();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        $cartModel = cart::where('user_id', $userId)->get();

        $categoryModel = categoryModel::get();
        $productModel = productModel::paginate(6);
        $twoDaysAgo = Carbon::now()->subMinutes(32);
        $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->get();
        if ($recentProducts->isEmpty()) {
            $recentProducts = productModel::get();
        }
        return view('visitors.shop', compact('cartModel', 'cartItemCount', 'categoryModel', 'productModel', 'recentProducts'));
    }
    public function mensProduct()
    {
        $categoryModel = categoryModel::get();
        $twoDaysAgo = Carbon::now()->subMinutes(32);
        $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->get();
        $productModel = productModel::where('is_for', 'men')->get();
        return view('visitors.shop', compact('productModel', 'categoryModel', 'recentProducts'));
    }

    public function shopCategory($id)
    {
        $categoryModel = categoryModel::get();
        $productModel = productModel::where('category_id', $id)->get();
        $twoDaysAgo = Carbon::now()->subDays(10);
        $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->take(5)->get();
        return view('visitors.shop', compact('productModel', 'categoryModel', 'recentProducts'));
    }
    public function priceSearch(request $request)
    {
        // Retrieve the minimum and maximum range from the request
        $categoryModel = categoryModel::get();
        $minRange = $request->minRange;
        $maxRange = $request->maxRange;
        // $productModel = productModel::whereBetween('price', [$minRange, $maxRange])->get();
        $productModel = productModel::whereRaw('CAST(price AS UNSIGNED) BETWEEN ? AND ?', [$minRange, $maxRange])->paginate(6);
        $userId = auth()->check();
        dd($maxRange);
        $cartModel = cart::where('user_id', $userId)->get();
        $twoDaysAgo = Carbon::now()->subDays(10);
        $recentProducts = productModel::where('created_at', '>=', $twoDaysAgo)->take(5)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        // $productModel = productModel::paginate(6);

        // Query the Product model based on the price range
        // You can then use $products as needed, for example, passing it to a view
        return view('visitors.shop', compact('productModel', 'categoryModel','cartItemCount','cartModel','recentProducts'));
    }


    public function productDetail($id)
    {
        $userId = auth()->check();
        $cartModel = cart::where('user_id', $userId)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();

        $categoryModel = categoryModel::get();
        $productModel = productModel::where('id', $id)->with('images')->first();

        return view('visitors.product_detail', compact('categoryModel', 'productModel', 'cartModel', 'cartItemCount'));
    }
    public function cart()
    {
        $userId = auth()->User()->id;

        $categoryModel = categoryModel::get();
        $cartModel = cart::where('user_id', $userId)->with('product')->get();
        $cartItemCount = cart::where('user_id', $userId)->with('product')->count();
        return view('visitors.cart', compact('categoryModel', 'cartModel', 'cartItemCount'));
    }
    public function cartSubmit(request $request)
    {
        $categoryModel = categoryModel::get();
        $userId = auth()->check();
        $cartModel = cart::where('user_id', $userId)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();

        $userId = auth()->User()->id;
        $productModel = ProductModel::where('id', $request->product_id)->first();
        $cartModelGet = cart::where([['product_id', $request->product_id], ['user_id', $userId]])->first();

        if ($cartModelGet) {
            $cartModelGet->quantity += $request->quantity;
            // $cartModelGet->price = floatval($cartModelGet->price) + floatval($request->price);
            $oldPrice = str_replace(',', '', $cartModelGet->price);
            $newPrice = str_replace(',', '', $request->price);

            // Add the prices as floats
            $totalPrice = floatval($oldPrice) + floatval($newPrice);

            // Format the total price with commas for thousands separators
            $formattedPrice = number_format($totalPrice, 2, ',', '.');

            // Update the price attribute with the formatted total price
            $cartModelGet->price = $formattedPrice;
            $cartModelGet->save();
        } else {
            $cartModel = new cart;

            $cartModel->quantity = $request->quantity;
            $cartModel->name = $productModel->name;
            $cartModel->price = $request->price;
            $cartModel->product_id = $request->product_id;
            $cartModel->user_id = $userId;
            $cartModel->save();
        }

        return redirect()->route('cart');
    }

    // public function cartQuantitySubmit(Request $request)
    // {
    //     $userId = auth()->id(); // Retrieve the authenticated user's ID

    //     // Retrieve the cart(s) for the authenticated user
    //     $cart = cart::where('product_id', $request->product_id)
    //         ->where('user_id', $userId)
    //         ->first(); // Assuming you're finding a single cart
    //     // dd($request->product_id);
    //     if ($cart) {
    //         // Update the cart attributes
    //         $cart->quantity = $request->quantity;
    //         $cart->price = $request->price;

    //         // Save the changes to the database
    //         $cart->save();

    //         // Return a success response
    //         return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
    //     } else {
    //         // Return a failure response if the cart is not found
    //         return response()->json(['success' => false, 'message' => 'Cart not found']);
    //     }
    // }
    public function ajaxUpload(Request $request)
    {
        // Retrieve the data from the request
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Assuming you have a Cart model and assuming 'price' field is also available in the cart table
        $cart = cart::where('product_id', $productId)->first();
        $product = productModel::get()->where('id', $productId)->first();

        // Update the price in the cart table
        $cart->price = $quantity * $product->price; // Assuming you're updating price based on quantity
        $cart->quantity = $quantity;
        // Save the changes to the database
        $cart->update();

        // Return any response if needed
        return response()->json(['message' => 'Price updated successfully'], 200);
    }

    public function checkout()
    {
        $userId = auth()->User()->id;
        $cartItemCount = Cart::where('user_id', $userId)->count();
        $cartModel = cart::where('user_id', $userId)->get();
        $categoryModel = categoryModel::get();
        $cart = cart::where('user_id',$userId)->get();
        $totalPrice = 0;
// Iterate over each item and calculate the final price
foreach ($cart as $cartItem) {
    // Extract the price from the cart item
    $priceString = $cartItem->price;

    // Remove commas (thousands separators)
    $priceString = str_replace(',', '', $priceString);

    // Replace dot with standard decimal separator
    $priceString = str_replace('.', '.', $priceString);

    // Convert the string price to a float
    $price = (float) $priceString;

    // Accumulate the price to the total
    $totalPrice += $price;
}
        return view('visitors.checkout',compact('cartItemCount','cartModel','categoryModel','cart', 'totalPrice'));
    }
    // public function checkout()
    // {
    //     $userId = auth()->User()->id;
    //     $cartItemCount = Cart::where('user_id', $userId)->count();
    //     $cartModel = cart::where('user_id', $userId)->get();
    //     $categoryModel = categoryModel::get();
    //     $cart = cart::where('user_id',$userId)->sum('price');
    //     // $totalPrice = 0;
    //     // dd($cart);
    //     // foreach ($cart as $cartItem) {
    //     //     // Assuming each cart item has a reference to the product and its quantity
    //     //     $product = $cartItem->product;
    //     //     $quantity = $cartItem->quantity;
    //     //     $price = $product->price;
    //     //     $totalPrice = $totalPrice+$cartItem->price;
    //     //     // Calculate final price for this product
    //     //     $finalPrice = $quantity * $price;
    
    //     //     // Accumulate the final price to the total
    //     //     $totalPrice += $finalPrice;
    //     // }
    

    //     return view('visitors.checkout',compact('cartItemCount','cartModel','categoryModel','cart'));
    // }
    public function process(Request $request)
    {
        $userId = auth()->User()->id;
        $cart = cart::where('user_id',$userId)->get();
        $totalPrice = 0;
// Iterate over each item and calculate the final price
foreach ($cart as $cartItem) {
    // Extract the price from the cart item
    $priceString = $cartItem->price;

    // Remove commas (thousands separators)
    $priceString = str_replace(',', '', $priceString);

    // Replace dot with standard decimal separator
    $priceString = str_replace('.', '.', $priceString);

    // Convert the string price to a float
    $price = (float) $priceString;

    // Accumulate the price to the total
    $totalPrice += $price;
}
        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            // Create a charge using Stripe API
            $charge = Charge::create([
                "amount" => $totalPrice * 100, // Amount in cents
                "currency" => "usd", // Currency
                "source" => $request->input('stripeToken'), // Token generated by Stripe.js
                "description" => "Test payment from Maaz." // Description
            ]);
            foreach ($cart as $cartItem) {
                $completeOrder = new CompleteOrderModel;
                $completeOrder->user_id = $userId;
                $completeOrder->product_id = $cartItem->product_id;
                $completeOrder->final_price = $cartItem->price; // Assuming the price is final
                $completeOrder->quantity = $cartItem->quantity; // Assuming the quantity is available in cart item
                $completeOrder->payment_id = $charge->id;
                $completeOrder->save();
            }
            cart::where('user_id', $userId)->delete();

    
            // Flash success message
            Session::flash('success', 'Payment successful!');
    
            return back();
        } catch (\Exception $e) {
            // Handle payment failure
            return back()->withErrors($e->getMessage());
        }
    }
    public function contact()
    {
        return view('visitors.contact');
    }

    public function blog()
    {
        return view('visitors.blog');
    }

    public function blogDetail()
    {
        return view('visitors.blog_detail');
    }
    public function register()
    {
        $categoryModel = categoryModel::get();
        $userId = auth()->check();
        $cartModel = cart::where('user_id', $userId)->get();
        $cartItemCount = Cart::where('user_id', $userId)->count();
        return view('visitors.login', compact('categoryModel', 'cartModel', 'cartItemCount'));
    }
    public function signupSubmit(Request $request)
    {
        $userModel = new User;
        $userModel->name = $request->name;
        $userModel->email = $request->email;
        $userModel->password = $request->password;
        $userModel->role='user';
        $userModel->save();
        return redirect()->back();
    }
    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role== 'admin') {
                // If the user is an admin, redirect to the admin dashboard
                return redirect()->route('dashboard');
            }
            return redirect()->route('home');

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
