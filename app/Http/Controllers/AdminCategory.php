<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategory extends Controller
{
    public function search(Request $request){
        $keyword = $request->get('keyword_submit');
        $cate = DB::table('categories')
            ->select('categories.cate_id', 'categories.cate_name')
            ->where('categories.cate_name','like','%'.$keyword.'%')
            ->get();
        return view('admin/category/search',['search_category'=>$cate]);
    }
    public function create(){
        return view('admin/category/add_category');
    }

    public function edit($cate_id){
        $categories = Category::findOrFail($cate_id);
        return view('admin/category/edit_category',compact('categories'));
    }

    public function update(Request $request, $cate_id)
    {
        $updateData = $request->validate([
            'cate_name' => 'required|max:255',
        ]);
        DB::table('categories')->where('cate_id','=',$cate_id)->update($updateData);
        return redirect('/admin/category/index')->with('completed', 'Your category has been updated');
    }

    public function store(Request $request){
        $this->validate($request,[
            'cate_id' => 'required',
            'cate_name' => 'required',
        ]);
        $cate_id = $request->input('cate_id');
        $cate_name = $request->input('cate_name');
        DB::table('categories')->insert([
            'cate_id'=> $cate_id,
            'cate_name' => $cate_name,
        ]);
        return redirect('admin/category/add_category')->with('completed', 'Your new category has been saved!');
    }

    public function destroy($cate_id){
        $categories = Category::findOrFail($cate_id);
        $categories->delete();
        return redirect('admin/category/index');
    }
}
