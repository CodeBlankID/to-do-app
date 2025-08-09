<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskDetail extends Model
{
    /** @use HasFactory<\Database\Factories\TaskDetailFactory> */
    use HasFactory;

    protected $fillable = [
    "task_id",
    'activity',
    'keterangan',
    "status",
    ];
    protected function casts() : array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'deleted_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

    function task() : BelongsTo
    {
        return $this->belongsTo( Task::class, "task_id" );
    }
}
