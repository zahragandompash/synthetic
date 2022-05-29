<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectEditRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectsResource;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add(ProjectRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=new Project();
        $item->title=$request->title;
        $item->description=$request->description;
        $item->save();
        if ($request->images){
            foreach ($request->images as $image) {
                $path = $this->uploadFile($image, "Project");
                $image = $path["path"];
                $photo = new ProjectImage();
                $photo->project_id = $item->id;
                $photo->image = $image;
                $photo->save();
            }
            }
        $item->save();
        return response(['status'=>true,'massage'=>'Project registered successfully']);

        }

    public function edit(ProjectEditRequest $request)
    {
        $user=auth()->guard('api')->user();
        $item=Project::find($request->project_id);
        $item->title=$request->title;
        $item->description=$request->description;
        $item->save();
        if ($request->images){
            foreach ($request->images as $image) {
                $path = $this->uploadFile($image, "Project");
                $image = $path["path"];
                $photo = new ProjectImage();
                $photo->project_id = $item->id;
                $photo->images = $image;
                $photo->save();}
        }
        $item->save();
        return response(['status'=>true,'massage'=>'Editing project successfully']);
    }

    public function delete(Request $request)
    {
        $user=auth()->guard('api')->user();
        $item=Project::find($request->project_id);
        $item->delete();
        return response(['status'=>true,'message'=>'Project removed successfully']);
    }

    public function deleteImage(Request $request)
    {
        $user=auth()->guard('api')->user();
        $item=ProjectImage::find($request->id);
        $item->delete();
        return response(['status'=>true,'message'=>'Project images removed successfully']);

    }

    public function list()
    {
        return ProjectsResource::collection(Project::all());
    }
}
