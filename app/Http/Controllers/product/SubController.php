<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product\SubCategory;
use App\Models\Product\Category;

use Illuminate\Http\Request;

class SubController extends Controller
{
public function scategoryList(){
    $data = DB::table('sub_categories')
        ->join('categories','sub_categories.categoryId','=','categories.id')
        ->select('sub_categories.*','categories.categoryName as categoryId')
        ->get();
    return view('product.subcategorylist',['scategory'=>$data]);
}
    public function addScategory(){
        $user = Category::all();
        return view('product.addsubcatagory',['user'=>$user]);
    }
public function addScatetory(Request $req){
    $req->validate( [
        'categoryId'=> 'required',
        'subCategoryName'=> 'required',
        'subCategoryCode'=>'required',
        'note'=>'required'

    ]);
    $user = new SubCategory;
    $user->categoryId = $req->categoryId;
    $user->categoryName = $req->categoryName;
    $user->subCategoryName = $req->subCategoryName;
    $user->subCategoryCode = $req->subCategoryCode;
    $user->note = $req->note;
    $user->save();
    return redirect()->back()->with('message','Sub Category Created Successfully');
}
public function showuptbl($id){
    $data = SubCategory::find($id);
    $category = Category::all();
//    if($data){
//       $user = DB::table('sub_categories')
//            ->join('categories','sub_categories.categoryId','=','categories.id')
//            ->get();
//    }
//    else{
//        return redirect('s-categorylist');
//    }

    return view('product.updatesubcategory',['user'=> $data,'cats'=>$category]);

}
    public function getSubCategoryInformation(Request $request){
        $user = SubCategory::where('id',$request->id)->first();
        return $user;
    }
    function Sdelete(Request $request){
        SubCategory::where('id',$request->id)->delete();
        return redirect('s-categorylist')->with('message', 'Category Deleted Successfully');
    }
//    function Sdelete($id){
//        $data = SubCategory::find($id);
//        $data->delete();
//        return redirect('s-categorylist')->with('message','Sub Category Deleted Successfully');
//    }
    function Supdate(Request $req){
        $data = SubCategory::find($req->id);
        $data->categoryId = $req->categoryId;
        $data->subCategoryName = $req->subCategoryName;
        $data->subCategoryCode= $req->subCategoryCode;
        $data->note = $req->note;
        $data->save();
        return redirect('s-categorylist')->with('message', ' Sub Category Updated Successfully');
    }
    function subCategorySearch(Request $req)
    {

//        $data = SubCategory::where('subCategoryName', 'like', '%' . $req->input('query') . '%')->get();
        $data =DB::table('sub_categories')
            ->join('categories','sub_categories.categoryId','=','categories.id')
            ->select('sub_categories.*','categories.categoryName as categoryId')
            ->where('subCategoryName', 'like', '%' . $req->input('query') . '%')
            ->get();
        return view('product.searchsubcategory', ['searchs' => $data]);


    }

}
