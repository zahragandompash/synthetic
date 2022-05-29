<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function list()
    {
        $item=Partner::all();
        return response(['status'=>true,'data'=>$item]);
    }
}
