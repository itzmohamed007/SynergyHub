<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'idea_id',
        'comment_id'
    ];

    public function idea() {
        return $this->belongsTo(Idea::class);
    }
}
