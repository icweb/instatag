<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    public $fillable = [
        'user_id',
        'title',
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function hashtags()
    {
        return $this->hasMany(Hashtag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
