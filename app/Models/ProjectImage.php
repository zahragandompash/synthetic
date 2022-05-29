<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable=[
        'image','project_id'
    ];

    public function Project()
    {
        return $this->belongsTo(Project::class,'project_id');

    }
}
