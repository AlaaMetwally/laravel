<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
   use Sluggable; //trait
   protected $table = 'posts';
   protected $fillable=[
       'title',
       'description',
       'user_id',
       
   ];
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function sluggable()
   {
       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
   }
}
