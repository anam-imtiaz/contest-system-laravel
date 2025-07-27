<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContest extends Model
{
    protected $table = 'user_contests';
    protected $fillable = [
        'user_id',
        'contest_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}
