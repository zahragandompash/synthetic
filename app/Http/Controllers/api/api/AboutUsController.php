<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\OurProfession;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function list(){
        $item=AboutUs::all('description');
        $profession=OurProfession::all('title','icon');
        return[
            'status'=>true,
            'description'=>$item,
            'OurProfession'=>$profession
        ];

    }

}
