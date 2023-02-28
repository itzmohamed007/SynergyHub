<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function ideas() {
        return $this->belongsToMany(Idea::class, 'idea_categorie')->withTimestamps();
    }
}
