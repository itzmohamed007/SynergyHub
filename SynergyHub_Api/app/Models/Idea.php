<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Comment;
use App\Models\like;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'idea_categorie')->withTimestamps()->as('idea_categories');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(like::class);
    }
}