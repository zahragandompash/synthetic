<?php

namespace App\Http\Controllers\api\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectsResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list()
    {
        return ProjectsResource::collection(Project::all());
    }
}
