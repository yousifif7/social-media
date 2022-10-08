<?php

namespace App\Models;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'user_id',
        'post_id',
        'content',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
