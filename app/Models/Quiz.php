<?php

namespace QUIZ\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package QUIZ\Models
 * @version December 6, 2017, 2:09 pm UTC
 */
class Quiz extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'question_id',
        'user_id',
        'total_time',
        'answer'
    ];
}
