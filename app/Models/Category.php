<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\task;

class Category extends Model
{
    use HasFactory;
    public function todos()
    {
        return $this->hasMany(Task::class);
    }
}
