<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
