<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name', 'name', 'description', 'banner_url', 'weight'
    ];

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }
}
