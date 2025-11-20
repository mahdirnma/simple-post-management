<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=[
        'title',
        'description',
        'is_active',
    ];
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
