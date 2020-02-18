<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Models\Product;
use App\Models\Tracsaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Show tổng quan user
     */
    public  function index()
    {
        //tổng số đơn hàng
        $transactions = Tracsaction::where('tr_user_id',get_data_user('web'));
        $listTransactions = $transactions;
        $transactions = $transactions->addSelect('id','tr_total','tr_status','tr_address','tr_phone','created_at')->paginate(10);
        $totalTransaction = $listTransactions->select('id')->count();
        //Đơn hàng đã xử lý
        $totalTransactionDone = $listTransactions->where('tr_status',Tracsaction::STATUS_DONE)->select('id')->count();

        $viewData = [
            'totalTransaction' => $totalTransaction,
            'totalTransactionDone' => $totalTransactionDone,
            'transactions' => $transactions
        ];
        return view('user.index',$viewData);
    }

    public function updateInfo()
    {
        $user = User::find(get_data_user('web'));

        return view('user.info',compact('user'));
    }
    /**
     * Lưu thông tin
     */
    public function saveUpdateInfo(Request $request)
    {
        $user = User::where('id',get_data_user('web'))->update($request->except('_token'));

        return redirect()->back()->with('success','Cập nhật thông tin thành công');
    }

    /**
     * Update password
     */
    public function updatePassword()
    {
        return view('user.password');
    }

    public function saveUpdatePassword(RequestPassword $requestPassword)
    {
        if (Hash::check($requestPassword->password_old,get_data_user('web','password')))
        {
            $user = User::find(get_data_user('web'));
            $user->password = bcrypt($requestPassword->password);
            $user->save();

            return redirect()->back()->with('success','Cập nhật mật khẩu thành công');
        }
        return redirect()->back()->with('danger','Mật khẩu cũ không đúng');
    }

    public function getProductPay()
    {
        $products = Product::orderBy('pro_pay','DESC')->limit(10)->get();

        return view('user.product',compact('products'));
    }
}
