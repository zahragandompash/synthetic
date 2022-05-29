<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OurTeamEditRequest;
use App\Http\Requests\OurTeamRequest;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function add(OurTeamRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=new OurTeam();
        $item->name=$request->name;
        $item->link=$request->link;
        $item->role=$request->role;
        if ($request->avatar){
            $path = $this->uploadFile($request->avatar, "OurTeam");
            $image = $path["path"];
            $item->avatar=$image;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Team members registered successfully']);

    }

    public function edit(OurTeamEditRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=OurTeam::find($request->team_id);
        $item->name=$request->name;
        $item->link=$request->link;
        $item->role=$request->role;
        if ($request->avatar){
            $path = $this->uploadFile($request->avatar, "OurTeam");
            $image = $path["path"];
            $item->avatar=$image;
        }
        $item->save();
        return response(['status'=>true,'message'=>'Editing team members successfully']);

    }

    public function delete(Request $request)
    {
        $user=auth()->guard('api')->user();
        $item=OurTeam::find($request->team_id);
        $item->delete();
        return response(['status'=>true,'message'=>'Team members removed successfully']);
    }

    public function list()
    {
        $user=auth()->guard('api')->user();
        $item=OurTeam::all();
        return response(['status'=>true,'data'=>$item]);

    }
}
