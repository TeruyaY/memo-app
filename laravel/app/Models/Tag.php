<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'user_id'];

    public function memos()
    {
        return $this->belongsToMany(Memo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
