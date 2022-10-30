<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings\CompanyInfo;

class SettingController extends Controller
{
    public function addCompanyInfo(){
        return view('Setting.add_company_infoTable');
    }

    public function createCompanyInfo(Request $request){
        $companyInfo = new CompanyInfo;
        $companyInfo->companyName = $request->companyName;
        $fileName = time().$request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs('logo',$fileName,'public');
        $companyInfo->logo = '/storage/'.$path;
        $fileName2 = time().$request->file('favIcon')->getClientOriginalName();
        $path2 = $request->file('favIcon')->storeAs('favIcon',$fileName2,'public');
        $companyInfo->favicon = '/storage/'.$path2;
        $companyInfo->phone = $request->phone;
        $companyInfo->email = $request->email;
        $companyInfo->address = $request->address;
        $companyInfo->city = $request->city;
        $companyInfo->state = $request->state;
        $companyInfo->country = $request->country;
        $companyInfo->slogan = $request->slogan;
        $companyInfo->save();
         return redirect('/allCompanyInfo')->with('message','New Company Information Created Successfully');
//        $companyInfo = CompanyInfo::orderBy('id','desc')->get();
//        return view('Setting.companyInfo',['companyInfo'=>$companyInfo])->with('message','New Company Information Created Successfully');
    }
    public function allCompanyInfoList(){
        $companyInfo = CompanyInfo::orderBy('id','desc')->get();
        return view('Setting.companyInfo',['companyInfo'=>$companyInfo]);
    }

    public function edit($id)
    {
        $companyInfo = CompanyInfo::find($id);
        return view('Setting.editCompanyInfo',compact('companyInfo'));
    }
    public function update(Request $request,$id)
    {
        $companyInfo = CompanyInfo::find($id);

        if ($logo = $request->file('logo')){
            $fileName = time().$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('logo',$fileName,'public');
            $companyInfo->logo = '/storage/'.$path;
        }else{
            unset($companyInfo['logo']);
        }

        if ($favicon = $request->file('favicon')){
        $fileName2 = time().$request->file('favIcon')->getClientOriginalName();
        $path2 = $request->file('favIcon')->storeAs('favIcon',$fileName2,'public');
        $companyInfo->favicon = '/storage/'.$path2;
        }else{
            unset($companyInfo['favicon']);
        }

        $companyInfo->companyName = $request->companyName;
        $companyInfo->phone = $request->phone;
        $companyInfo->email = $request->email;
        $companyInfo->address = $request->address;
        $companyInfo->city = $request->city;
        $companyInfo->state = $request->state;
        $companyInfo->country = $request->country;
        $companyInfo->slogan = $request->slogan;
        $companyInfo->save();
        return redirect('/allCompanyInfo')->with('message','Company Information Updated Successfully');
    }

    public function delete($id){
        $companyInfo = CompanyInfo::find($id);
        if (file_exists($companyInfo->logo) || file_exists($companyInfo->favicon)){
            unlink($companyInfo->logo);
            unlink($companyInfo->favicon);
        }
        $companyInfo->delete();
        return redirect('/allCompanyInfo')->with('Success_message','Company Info deleted Successfully');
    }
    public function CompanyInfoSearch(Request $request){
        $companyInfo = CompanyInfo::where('companyName', 'like', '%' . $request->input('query') . '%')->get();
        return view('Setting.searchCompanyInfo',compact('companyInfo'));
//        return view('Setting.searchCompanyInfo', ['$companyInfo' => $data]);
    }
}
