<?php

namespace App\Models;

use Illuminate\Datebase\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'name',
        'description',
        'is_completed',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
