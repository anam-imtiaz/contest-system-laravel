<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContestQuestions extends Model
{
    protected $table = 'contest_questions';
    protected $fillable = [
        'contest_id',
        'question',
        'question_type',
        'answer',
        'question_score'
    ];

    public function options()
    {
        return $this->hasMany(ContestQuestionOptions::class, 'question_id', 'id');
    }
}
