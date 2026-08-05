<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'level', 'icon', 'group', 'order'];

    public function scopeByGroup($query, string $group)
    {
        return $query->where('group', $group);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('group')->orderBy('order');
    }
}
