<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskNotification extends Model
{
    protected $table = 'task_notifications';
    protected $fillable = [
        'message',
        'task_id',
        'user_id',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
