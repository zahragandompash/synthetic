<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function list()
    {
        $item=OurTeam::all();
        return response(['status'=>true,'data'=>$item]);

    }
}
