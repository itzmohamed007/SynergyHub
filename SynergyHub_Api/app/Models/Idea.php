<?php

namespace App\Models;

use App\Models\Categorie;
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
}
