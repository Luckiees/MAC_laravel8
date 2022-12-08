<?php
use App\Userables;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userables extends Model
{
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'userables');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'userables');
    }
}
