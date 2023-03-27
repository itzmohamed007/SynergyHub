<?php

namespace App\Models;

use App\Models\User;
use App\Models\Idea;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'idea_id'
    ];

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function idea() {
        return $this->belongsTo(Idea::class);
    }

    public function likes() {
        return $this->hasmany(Like::class);
    }
}
