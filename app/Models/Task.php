<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'order', 'is_completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
