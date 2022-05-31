<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsEditRequest;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\OurProfession;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function add(AboutUsRequest $request){
        $item=new AboutUs();
        $item->description=$request->description;
        $item->save();
        $profession=new OurProfession();
        $profession->title=$request->title;
        if ($request->icon){
            $path=$this->uploadFile($request->icon,'Profession');
            $image=$path["path"];
            $profession->icon=$image;
        }
        $profession->save();
        return response(['status'=>true,'message'=>'About us successfully registered']);
    }
    public function edit(AboutUsEditRequest $request){
        $item=AboutUs::find($request->about_id);
        $item->description=$request->description;
        return response(['status'=>true,'message'=>'About us was successfully edited']);

    }

    public function deleteteProfession(Request $request)
    {
        $item=OurProfession::find($request->id);
        $item->delete();
        return response(['status'=>true,'message'=>'Profession successfully removed']);

    }
    public function list(){
        $item=AboutUs::all();
        $profession=OurProfession::all();
        return[
            'status'=>true,
            'description'=>$item,
            'OurProfession'=>$profession
        ];

    }
}
