<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hashtag extends Model
{
    use SoftDeletes;

    public $fillable = [
        'group_id',
        'hashtag',
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
