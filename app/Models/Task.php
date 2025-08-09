<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
    'user_id',
    'judul',
    'description',
    "is_completed",
    ];

    protected function casts() : array
    {
        return [
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
            'deleted_at' => 'datetime:Y-m-d H:i:s',
        ];
    }


    function user() : BelongsTo
    {
        return $this->BelongsTo( User::class, "user_id" );
    }

    function taskDetail() : HasMany
    {
        return $this->hasMany( TaskDetail::class, "task_id", "id" );
    }

}

