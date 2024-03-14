<?php

namespace App\Http\Controllers;

use App\Models\categoryModel;
use App\Models\productModel;
use App\Models\galleryModel;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }
    public function index(){
        return view('admin.index');
    }
    public function category(){
        $categoryModel = categoryModel::get();
        return view('admin.category',compact('categoryModel'));
    }
    public function categoryForm(){
        return view('admin.category_form');
    }
    public function categoryFormSubmit(Request $request){
        $categoryModel= new categoryModel;
        $categoryModel->categoryName=$request->categoryName;
        $categoryModel->save();
        return redirect()->route('category');
    }
    public function table(){
        return view('admin.tables');
    }
    public function product(){
        $productModel=productModel::get();
        return view('admin.product',compact('productModel'));
    }
    public function productGallery(){
        // $galleryImage= galleryModel::with('product')->get();
        $galleryImage = galleryModel::with('product')->get();


        return view('admin.gallery',compact('galleryImage'));
    }
    public function productGalleryForm(){
        $productModel= productModel::get();
        return view('admin.gallery_form',compact('productModel'));
    }
    public function productGalleryFormSubmit(Request $request){
        $galleryImage= new galleryModel;
        if ($request->hasFile('gallery_image')) {
            $image_path = '';
            foreach ($request->file('gallery_image') as $image) {
                $galleryImage = new galleryModel;
                $image_path = rand(0, 9999) . time() . '.' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $image_path);
                $galleryImage->gallery_image = $image_path;
                $galleryImage->product_id = $request->product_id;
                $galleryImage->save();
            }
          
        }
    

    }
    public function productForm(){
        $categoryModel= categoryModel::get();
        return view('admin.product_form',compact('categoryModel'));
    }
    public function productFormSubmit(request $request){
        $productModel= new productModel();
        $productModel->name=$request->name;
        $productModel->description=$request->description;
        $productModel->price=$request->price;
        $productModel->is_for=$request->is_for;
        $image_path = '';
        if ($request->image) {
            $image_path = rand(0, 9999) . time() . '.' . $request->image->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image_path);
        }
        $productModel->image = $image_path;
        $productModel->category_id=$request->categories;
        $productModel->save();
        return redirect()->route('product');

      
    }
    public function productComment(){
        return view('admin.product_Comment');
    }
    public function productCommentForm(){
        return view('admin.product_Comment_form');
    }
}
