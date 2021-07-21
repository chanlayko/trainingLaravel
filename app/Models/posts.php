<?php

namespace App\Models;

use App\Mail\PostStored;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class posts extends Model
{
    use HasFactory;
    // protected $table = 'posts';

    // protected $fillable = ['name','description'];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Models\category','category_id');
    }

    // protected static function booted()
    // {
    //     // static::created(function ($post) {
    //     //     Mail::to('chan@gmail.com')->send(new PostStored($post));
    //     // });
    // }
}
