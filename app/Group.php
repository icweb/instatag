<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    public $fillable = [
        'title'
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function hashtags()
    {
        return $this->hasMany(Hashtag::class);
    }
}
