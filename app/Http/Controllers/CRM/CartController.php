<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CRM\Quotation;
use App\Models\CRM\HouseAreaType;
use App\Models\CRM\DecorationType;

class CartController extends Controller
{
    public function getQuotations()
    {
        $quotations = Quotation::all();
        return response()->json($quotations);
    }
    public function getHouseTypes()
    {
        $houseTypes = HouseAreaType::all();
        return response()->json($houseTypes);
    }
    public function getDecorTypes($houseType)
    {
        $decorTypes = DecorationType::where('houseAreaTypeId',$houseType)->get();
        return response()->json($decorTypes);
    }
    public function getDescription($decorId)
    {
        $decorDes = DecorationType::where('id',$decorId)->get();
        return response()->json($decorDes);
    }
}
