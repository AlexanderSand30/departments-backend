<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Department extends Model
{
    use HasFactory, Notifiable;

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function subdepartments()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }
}
