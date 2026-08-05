<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'body', 'read_at'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

    public function markAsUnread()
    {
        $this->update(['read_at' => null]);
    }
}
