<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Product;

class Rating extends Model
{ 
	// quan hệ bảng user để lấy tên theo id
    public function user()
    {
        return $this->belongsTo(User::class,'ra_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'ra_product_id');
    }
}
