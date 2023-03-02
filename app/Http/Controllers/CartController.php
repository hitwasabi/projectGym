<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function viewCart(){
        $cartItems = DB::table('carts')
            ->join('products','products.product_id','=','carts.product_id')
            ->join('images','carts.product_id','=','images.product_id')
            ->join('sell_products','carts.product_id','=','sell_products.product_id')
            ->select('products.product_name','products.product_code','images.url','sell_products.prices','carts.cart_id','carts.quantity')
            ->where('carts.user_id','=',Auth::id())
            ->get('carts.*');
        $category = DB::table('categories')->take(1)->get();
        $quantity = DB::table('products')
            ->join('carts','carts.product_id','=','products.product_id')
            ->select('products.*')
            ->take(1)->get();
        return view('client/cartList',compact('cartItems','category','quantity'));
    }

    public function addCart(Request $request,$product_id)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $products = DB::table('products')
                ->join('images', 'products.product_id', '=', 'images.product_id')
                ->join('categories', 'products.cate_id', '=', 'categories.cate_id')
                ->join('sell_products', 'products.product_id', '=', 'sell_products.product_id')
                ->select('products.product_id', 'products.product_code', 'products.product_name', 'products.product_info',
                    'images.url', 'categories.cate_id', 'categories.cate_name', 'sell_products.prices')
                ->where('products.product_id','=',$product_id)
                ->first();
            if ($cart = Cart::where('product_id',$request->product_id)->first()){
                $cart->increment('quantity',$request->quantity);
                Alert::success('Thêm vào Giỏ hàng thành công', 'Vui lòng kiểm tra giỏ hàng');
                return redirect()->back();
            }else {
                $cart = new cart;
                $cart->user_id = $user->id;
                $cart->product_id = $products->product_id;
                $cart->quantity = $request->quantity;
                $cart->save();
                Alert::success('Thêm vào Giỏ hàng thành công', 'Vui lòng kiểm tra giỏ hàng');
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function delete($cartItems){
        $cartItems = Cart::findOrFail($cartItems);
        $cartItems->delete();
        toast('Sản phẩm này đã bị xóa','warning');
        return redirect('client/cartList');
    }


    public function update(Request $request,$cart_id){
        $cartItems = Cart::findOrFail($cart_id);
        $cartItems->update(['quantity'=>$request->quantity]);
        Alert::success('Giỏ hàng đã được cập nhật', 'Vui lòng kiểm tra giỏ hàng');
        return redirect('client/cartList');
    }

}
