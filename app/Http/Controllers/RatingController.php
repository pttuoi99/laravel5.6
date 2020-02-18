<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function saveRating(Request $request,$id)
    {
        if ($request->ajax())
        {
            Rating::insert([
                'ra_product_id' => $id,
                'ra_number'     => $request->number,
                'ra_content'    => $request->r_content,
                'created_at'    => $request->created_at,
                'ra_user_id'    => get_data_user('web')
            ]);

            $product = Product::find($id);

            $product->pro_total_number += $request->number;
            $product->pro_total_rating += 1;
            $product->save();

            return response()->json(['code' => '1']);
        }
    }
}
