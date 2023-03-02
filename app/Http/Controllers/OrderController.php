<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function viewOrder(){
        $cartItems = DB::table('carts')
            ->join('products','products.product_id','=','carts.product_id')
            ->join('images','carts.product_id','=','images.product_id')
            ->join('sell_products','carts.product_id','=','sell_products.product_id')
            ->select('products.product_name','products.product_code','images.url','sell_products.prices','carts.cart_id','carts.quantity')
            ->where('carts.user_id','=',Auth::id())
            ->get();
        $category = DB::table('categories')->take(1)->get();
        $userData = DB::table('users')
            ->where('id','=',Auth::id())
            ->get();
        $charges = DB::table('address')
            ->join('users','users.address','=','address.address_dt')
            ->select('address.fee')
            ->take(1)->get();
        return view('client/orderDetail',compact('cartItems','category','userData','charges'));
    }

    public function checkOut(){
        if (Auth::user()->address==null && Auth::user()->phone==null  ){
            redirect('client/info');
        }else{
        $order = new Order();
        $order->user_id = Auth::id();
        $order->order_name = Auth::user()->name;
        $order->order_phone = Auth::user()->phone;
        $order->order_address = Auth::user()->address;
        $order->save();

        $cartItems = DB::table('carts')
            ->join('sell_products','sell_products.product_id','=','carts.product_id')
            ->where('carts.user_id','=',Auth::id())
            ->select('carts.*','sell_products.prices')
            ->get();
        foreach ($cartItems as $item){
            OrderDetail::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->prices,
            ]);
            $product = Product::where('product_id',$item->product_id)->first();
            if ($product->quantity>0) {
                $product->quantity = (int)($product->quantity) - (int)($item->quantity);
                $product->update(['quantity' => $product->quantity]);
            }
        }
            $cartItem = Cart::where('user_id',Auth::id())->get();
            Cart::destroy($cartItem);
            alert()->success('Đơn hàng của bạn đã được đặt', 'Vui lòng đợi để chúng tôi xử lí đơn hàng của bạn nhé!');
        return redirect('client/home');
        }
    }

    public function clientOrder(){
        $orderItems = DB::table('users')
            ->join('orders','users.id','=','orders.user_id')
            ->join('address','users.address','=','address.address_dt')
            ->select('orders.*','users.*','address.fee')
            ->get();
        $orderDetails = DB::table('order_details')
            ->join('products','products.product_id','=','order_details.product_id')
            ->join('sell_products','order_details.product_id','=','sell_products.product_id')
            ->join('images','images.product_id','=','products.product_id')
            ->join('orders','orders.order_id','=','order_details.order_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('order_details.*','order_details.price','images.url','products.product_name','products.product_code','categories.*')
            ->where('orders.order_id','=','order_details.order_id')
            ->distinct()->get();
        $charges = DB::table('users')
            ->join('address','users.address','=','address.address_dt')
            ->select('address.fee')
            ->get();
        return view('client/clientOrder',compact('orderItems','orderDetails','charges'));
    }


}
