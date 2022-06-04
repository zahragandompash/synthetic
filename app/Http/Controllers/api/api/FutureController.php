<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Models\Future;
use Illuminate\Http\Request;

class FutureController extends Controller
{
    public function list()
    {
        $item=Future::all();
        return response(['status'=>true,'data'=>$item]);
    }
}
