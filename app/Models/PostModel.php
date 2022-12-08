<?php
use App\PostModel;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
   
    public function User()
    {
        return $this->hasOne('App\User');
    }

    public function usertag()
    {
        return $this->morphToMany(Usertag::class, 'userables');
    }
    protected $table = 'PostModels';
    // protected $guarded = ['uid'];
    protected $fillable = ['title', 'content']; 
}

