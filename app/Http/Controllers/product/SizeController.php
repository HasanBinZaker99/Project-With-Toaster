<?php

namespace App\Http\Controllers\product;
use App\Http\Controllers\Controller;
use App\Models\Product\Variations\Size;

use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizelist()
    {
        $user = Size::all();
        return view('product.sizelist', ['sizes' => $user]);
    }
    public function addsizeform()
    {
        return view('product.addsize');
    }
    function addsize(Request $req)
    {
        $req->validate([
            'sizeName' => 'required',
            'sizeValue' => 'required',
            'note' => 'required'
        ]);
        $user = new Size;
        $user->sizeName = $req->sizeName;
        $user->sizeValue = $req->sizeValue;
        $user->note = $req->note;
        $user->save();
        return redirect()->back()->with('message', 'New Size Created Successfully');

    }
    public function getSizeInformation(Request $request)
    {
        $user = Size::where('id', $request->id)->first();
        return $user;
    }

    function szdelete(Request $request)
    {
        Size::where('id', $request->id)->delete();
        return redirect('size-list')->with('message', 'Size Deleted Successfully');
    }
}
