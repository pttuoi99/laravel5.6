<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Tracsaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class AdminTransactionController extends Controller
{

    public function index()
    {
        $transactions = Tracsaction::with('user:id,name')->paginate(10);

        $viewData = [
            'transactions' => $transactions
        ];
        return view('admin::transaction.index',$viewData);
    }

    public function viewOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $orders = Order::with('product')->where('or_transaction_id',$id)->get();

            $html = view('admin::components.order',compact('orders'))->render();
            return \response()->json($html);
        }
    }

    /**
     * Xử lý trạng thái đơn hàng
     */
    public function actionTransaction($id)
    {
        $transaction = Tracsaction::find($id);
        $orders = Order::where('or_transaction_id',$id)->get();

        if ($orders) 
        {
            //Trừ đi số lượng sản phẩm
            //Tăng biến pay của sản phẩm
            foreach ($orders as $order) {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $order->or_qty;
                $product->pro_pay ++;
                $product->save();
            }
        }
        //Cập nhật lại trạng thái đơn hàng
        
        \DB::table('users')->where('id',$transaction->tr_user_id)->increment('total_pay');
        $transaction->tr_status = Tracsaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success','Xử lý đơn hàng thành công');
    }
}
