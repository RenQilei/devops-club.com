<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'article_count'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

}
