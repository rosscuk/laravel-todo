<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    /*
     * Table name
     */
    protected $table = 'subtasks';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'name',
        'user_id',
        'task_id',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];

            public function task() 
            {
               return $this->belongsTo(Task::class); 
            }
}
