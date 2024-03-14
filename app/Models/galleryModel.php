<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galleryModel extends Model
{
    use HasFactory;
    protected $fillabale =['product_id','gallery_image'];
    public function product(){
        return $this->hasMany(productModel::class, 'product_id','product_id');
    }
    
}
