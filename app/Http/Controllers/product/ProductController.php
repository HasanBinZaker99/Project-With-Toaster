<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product\Category;

class ProductController extends Controller
{
    public function categoryList(){
        $data = Category::all();
        return view('product.catagoryList',['category'=> $data]);
    }
    function catagory(){
        return view('product.addProductCatagory');
    }
   function addCategory(Request $req){
        $req->validate( [
            'categoryName'=> 'required',
            'categoryCode'=>'required',
            'note'=>'required'

        ]);
        $user = new Category;
        $user->categoryName = $req->categoryName;
        $user->categoryCode = $req->categoryCode;
        $user->note = $req->note;
        $user->save();
       return redirect()->back()->with('message', 'New Category Created Successfully');

    }


    function show($id){
        $data = Category::find($id);
        return view('product.updateproductcategory',['data'=>$data]);
    }
    public function getCategoryInformation(Request $request){
        $user = Category::where('id',$request->id)->first();
        return $user;
    }
    function delete(Request $request){
        Category::where('id',$request->id)->delete();
        return redirect('categoryList')->with('message', 'Category Deleted Successfully');
    }
    function update(Request $req){
        $data = Category::find($req->id);
        $data->categoryName = $req->categoryName;
        $data->categoryCode = $req->categoryCode;
        $data->note = $req->note;
        $data->save();
        return redirect('categoryList')->with('message', 'New Category Upgraded Successfully');
    }

    function categorySearch(Request $req)
    {

        $data = Category::where('categoryName', 'like', '%' . $req->input('query') . '%')->get();
        return view('product.searchcategory', ['searchs' => $data]);
}

}
