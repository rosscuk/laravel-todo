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
        'todo_id',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];

            public function todo() 
            {
               return $this->belongsTo(Todo::class); 
            }
}
