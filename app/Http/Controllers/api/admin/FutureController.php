<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FutureEditRequest;
use App\Http\Requests\FutureRequest;
use App\Models\Future;
use Illuminate\Http\Request;

class FutureController extends Controller
{
    public function add(FutureRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=new Future();
        $item->link=$request->link;
        if ($request->logo){
            $path=$this->uploadFile($request->logo,'Future');
            $image=$path['path'];
            $item->logo=$image;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Future registration completed successfully']);
    }

    public function edit(FutureEditRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=Future::find($request->future_id);
        $item->link=$request->link;
        if ($request->logo){
            $path=$this->uploadFile($request->logo,'Future');
            $image=$path['path'];
            $item->logo=$image;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Future editing completed successfully']);
    }

    public function delete(Request $request)
    {
        $user=auth()->guard('api')->user();
        $item=Future::find($request->future_id);
        $item->delete();
        return response(['status'=>true,'message'=>'Future removal completed successfully']);

    }

    public function list()
    {
        $user=auth()->guard('api')->user();
        $item=Future::all();
        return response(['status'=>true,'data'=>$item]);



    }
}
