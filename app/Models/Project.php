<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // One to many con Type
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // Many to many con Technology
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    protected $fillable = ['name', 'slug'];
}