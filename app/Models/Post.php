<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //accessors
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getThumbnailAttribute()
    {
        if($this->image){
            return url('/storage/'.$this->image);
        }
        return url('/storage/default.jpg');
    }

    //mutators
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

}
