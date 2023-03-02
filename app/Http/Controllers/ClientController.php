<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sell_product;
use App\Models\User;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ClientController extends Controller
{
    public function viewClient(){
        $products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");

        return view('client/home',['products'=>$products]);
    }

    public function viewInfo(){
        $infos = DB::table('users')
            ->where('isAdmin','=',0)
            ->get();
        return view('client/info',compact('infos'));
    }

    public function editInfo($id){
        $infos = DB::table('users')->get()
        ->where('isAdmin','=',0)
        ->where('id','=',$id)->first();
        return view('client/editInfo',compact('infos'));
    }

    public function update(Request $request,$id){
        $updateInfo = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address'=> 'required',
            ]);
        DB::table('users')->where('id','=',$id)->update($updateInfo);
        return redirect('client/info');
    }


    public function viewCategory(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category')->with('products',$product);
    }

    function orderDetail($order_id){
        $orderItems = DB::table('products')
            ->join('order_details','products.product_id','=','order_details.product_id')
            ->join('sell_products','order_details.product_id','=','sell_products.product_id')
            ->join('images','images.product_id','=','products.product_id')
            ->where('order_details.order_id','=',$order_id)
            ->select('order_details.*','order_details.price','images.url','products.product_name','products.product_code')
            ->get();
        $categories = DB::table('categories')
            ->join('products','categories.cate_id','=','products.cate_id')
            ->take(1)->get();
        $userData = User::where('id',Auth::id())->get();
        $charges = DB::table('address')
            ->join('users','address.address_dt','=','users.address')
            ->select('address.fee')
            ->take(1)->get();
        $status = DB::table('orders')
            ->where('order_id',$order_id)
            ->select('*')
            ->take(1)->get();
        return view('client/clientOrderDt',compact('orderItems','userData','charges','categories','status'));
    }


    public function show($product_id,$cate_name){
        $product = DB::table('categories')
            ->join('products','products.cate_id','=','categories.cate_id')
            ->select('products.*','categories.cate_name')
            ->get()
            ->where('product_id',"=",$product_id)->first();
        $image = DB::table('images')->where('product_id',"=",$product_id)->first();
        $sellProduct = DB::table('sell_products')->where('product_id',"=",$product_id)->first();
        $products =DB::table('categories')
            ->join('products','products.cate_id','=','categories.cate_id')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->where('products.product_id',"!=",$product_id)
            ->where('categories.cate_id' ,"=",$cate_name)
            ->get()->take(5);
        $flavors = DB::table('flavors')
            ->get();
        return view('client/product',compact('product','image','sellProduct','products','flavors'));
    }

    public function searchInfo(Request $request){
        $keyword = $request->get('keyword_submit');
        $collection =DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('product_name','like','%'.$keyword.'%')
            ->paginate(6);
//            ->sortBy('prices');
//        dd($collection);
//        dd($collection->sortBy('prices'));
        if($request-> get('sort')=='price_asc'){
            $collection =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('product_name','like','%'.$keyword.'%')
                ->paginate(6);
            $collection->setCollection(
            $collection->sortBy('prices')
          );
        }
        if($request-> get('sort')=='price_desc'){
            $collection =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('product_name','like','%'.$keyword.'%')
                ->paginate(6);
            $collection->setCollection(
                $collection->sortByDesc('prices')
            );
        }
//        $collection = $collection->sortBy('prices')->all();


//       ;
//        if($keyword != null){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->where('product_name','like','%'.$keyword.'%');
//        }
//        if($request-> get('sort')=='price_asc'){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->orderBy('prices','ASC')
//                ->paginate(4);
//        }
//        elseif($request->get('sort')=='price_desc'){
//            $search_product = DB::table('products')
//                ->join('images','images.product_id','=','products.product_id')
//                ->join('sell_products','sell_products.product_id','=','products.product_id')
//                ->select('products.*','images.url','sell_products.prices')
//                ->orderBy('prices','DESC')
//                ->paginate(4);
//        }
        return view('client/search',['search_product'=>$collection]);
    }

    public function news(){
        return view('/client/news');
    }

    //Cac trang danh muc
    public function  viewMass(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','Sữa tăng cân')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Sữa tăng cân')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Sữa tăng cân')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/mass')->with('products',$product);
    }
    public function  viewWhey(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','Whey Protein')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Whey Protein')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Whey Protein')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/whey')->with('products',$product);
    }
    public function  viewBCAAsEAAs(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','BCAAs, EAAs')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','BCAAs, EAAs')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','BCAAs, EAAs')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/bcaa')->with('products',$product);
    }
    public function  viewPreworkoutCreatine(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','Pre-Workout,Creatine')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Pre-Workout,Creatine')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Pre-Workout,Creatine')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/PreworkOut')->with('products',$product);
    }
    public function  viewVitamin(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','Vitamin,khoáng chất')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Vitamin,khoáng chất')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Vitamin,khoáng chất')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/Vitamin')->with('products',$product);
    }
    public function  viewBurnFat(Request $request){
        //$products = DB::select("SELECT * FROM products INNER JOIN images ON products.product_id = images.product_id INNER JOIN sell_products ON products.product_id = sell_products.product_id");
        $product = DB::table('products')
            ->join('images','images.product_id','=','products.product_id')
            ->join('sell_products','sell_products.product_id','=','products.product_id')
            ->join('categories','categories.cate_id','=','products.cate_id')
            ->select('products.*','images.url','sell_products.prices')
            ->where('cate_name','=','Giảm mỡ')
            ->paginate(6);
        if($request-> get('sort')=='price_asc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Giảm mỡ')
                ->paginate(6);
            $product->setCollection(
                $product->sortBy('prices')
            );
        }
        if($request-> get('sort')=='price_desc'){
            $product =DB::table('products')
                ->join('images','images.product_id','=','products.product_id')
                ->join('sell_products','sell_products.product_id','=','products.product_id')
                ->join('categories','categories.cate_id','=','products.cate_id')
                ->select('products.*','images.url','sell_products.prices')
                ->where('cate_name','=','Giảm mỡ')
                ->paginate(6);
            $product->setCollection(
                $product->sortByDesc('prices')
            );
        }
        return view('client/category/burnFat')->with('products',$product);
    }
}

