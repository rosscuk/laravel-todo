<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
     * Table name
     */
    protected $table = 'tasks';

    /*
     * Fillable fields for protecting mass assignment vulnerability
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    /*
     * Eloquent attribute casting
     */
    protected $casts = [
        'complete' => 'boolean',
    ];

            public function subtasks() 
            {
               return $this->hasMany(Subtask::class); 
            }
}
