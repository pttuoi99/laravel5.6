<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Rating;
use App\Models\User;

class AdminRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ratings = Rating::with('user:id,name','product:id,pro_name,pro_slug')->paginate(10);

        $viewData = [
            'ratings' => $ratings
        ];
        return view('admin::rating.index',$viewData);
    }

}
