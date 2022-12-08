<?php
use App\Categorys;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    public function usertag()
    {
        return $this->morphToMany(Usertag::class, 'userables');
    }
}
