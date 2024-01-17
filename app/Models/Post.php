<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes ;

    protected $table = 'posts';

    protected $fillable = ['title','user_id','description','is_published','is_active','deleted_at'];

   // protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


      public function image()
         {
             return $this->morphOne(Image::class, 'imageable');
         }

             public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
