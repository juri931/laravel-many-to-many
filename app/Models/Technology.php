<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // Many to many con Project
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    protected $fillable = ['name', 'slug'];
}