<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerEditRequest;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function add(PartnerRequest $request)
    {
        $user=auth()->guard('api')->user();

        $item=new Partner();
        $item->title=$request->title;
        $item->link=$request->link;
        if ($request->icon){
            $path = $this->uploadFile($request->icon, "Partner");
            $icon = $path["path"];
            $item->icon=$icon;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Partner editing completed successfully']);
    }

    public function edit(PartnerEditRequest $request)
    {
        $user=auth()->guard('api')->user();

        $item=Partner::find($request->partner_id);
        $item->title=$request->title;
        $item->link=$request->link;
        if ($request->icon){
            $path = $this->uploadFile($request->icon, "Partner");
            $icon = $path["path"];
            $item->icon=$icon;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Partner editing completed successfully']);
    }

    public function delete(Request $request)
    {
        $user=auth()->guard('api')->user();

        $item=Partner::find($request->partner_id);
        $item->delete();
        return response(['status'=>true,'message'=>'Partner removal completed successfully']);
    }

    public function list()
    {
        $item=Partner::all();
        return response(['status'=>true,'data'=>$item]);
    }
}
