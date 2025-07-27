<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContestQuestionOptions extends Model
{
    protected $table = 'contest_questions_options';
    protected $fillable = [
        'contest_question_id',
        'option',
    ];
}
