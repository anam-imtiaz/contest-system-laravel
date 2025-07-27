<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contest';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'score',
        'prize',
    ];

    public function questions()
    {
        return $this->hasMany(ContestQuestions::class, 'contest_id', 'id');
    }
}
