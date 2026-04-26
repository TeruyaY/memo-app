<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function memos()
    {
        return $this->hasMany(Memo::class);
    }
}
