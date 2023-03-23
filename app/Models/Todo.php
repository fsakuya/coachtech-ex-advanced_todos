<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    // public static function doSearch($input)
    // {
    //     if (!empty($input)) {
    //         return Todo::where('tag_id', $input)
    //             ->where('content', 'LIKE BINARY', "%{$input}%")
    //             ->get();
    //     }
    // }
}
