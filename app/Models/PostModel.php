<?php
use App\PostModel;
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function usertag()
    {
        return $this->morphToMany(Usertag::class, 'userables');
        //return $this->morphToMany('\App\Models\Usertag'); 이렇게도 쓸 수 있는가?
    }
    protected $table = 'PostModels';
    // protected $guarded = ['uid'];
    protected $fillable = ['title', 'content']; 
}

