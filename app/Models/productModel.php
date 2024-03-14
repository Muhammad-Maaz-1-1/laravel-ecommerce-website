<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    protected $fillabale=['name','image','description','price', 'is_for','category_id'];
    public function images(){
        return $this->hasMany(galleryModel::class, 'product_id', 'id');
    }
}
