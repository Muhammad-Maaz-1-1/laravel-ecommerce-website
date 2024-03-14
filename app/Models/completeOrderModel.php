<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completeOrderModel extends Model
{
    use HasFactory;
    protected $fillabale=['user_id','product_id','final_price','quantity','payment_id'];
}
