<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\Product\Unit;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function unitlist(){
        $data= Unit::all();
        return view('product.unitlist',['units'=>$data]);
    }
    public function addunit(){
        return view('product.addunit');
    }
    function saveunit(Request $req){
        $req->validate( [
            'uniteName'=> 'required',
            'uniteShort'=>'required',
            'allowDecimal'=>'required'

        ]);
        $user = new Unit;
        $user->uniteName = $req->uniteName;
        $user->uniteShort = $req->uniteShort;
        $user->allowDecimal= $req->allowDecimal;
        $user->save();
        return redirect()->back()->with('message','Unit Created Successfully');
    }
    function edit($id)
    {
        $data = Unit::find($id);
        return view('product.updateunit', ['unit' => $data]);
    }
    function Uupdate(Request $req){
        $data = Unit::find($req->id);
        $data->uniteName  = $req->uniteName ;
        $data->uniteShort = $req->uniteShort;
        $data->allowDecimal= $req->allowDecimal;
        $data->save();
        return redirect('unit-list')->with('message','Unit Updated Successfully');
    }
    public function getUnitInformation(Request $request){
        $user = Unit::where('id',$request->id)->first();
        return $user;
    }
    function udelete(Request $request){
        Unit::where('id',$request->id)->delete();
        return redirect('unit-list')->with('message', 'Unit Deleted Successfully');
    }
//    function udelete($id){
//        $data = Unit::find($id);
//        $data->delete();
//        return redirect('unit-list')->with('message','Unit Deleted Successfully');
//    }
    function unitSearch(Request $req)
    {

        $data = Unit::where('uniteName', 'like', '%' . $req->input('query') . '%')->get();
        return view('product.searchunit', ['searchs' => $data]);


    }
}
