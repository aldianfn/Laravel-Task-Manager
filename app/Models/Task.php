<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status'
    ];

    public function task_histories()
    {
        return $this->hasMany(TaskHistory::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function task_notifications()
    {
        return $this->hasMany(TaskNotification::class);
    }

    public function task_comments()
    {
        return $this->hasMany(TaskComment::class);
    }
}
