<?php

namespace QUIZ\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package QUIZ\Models
 * @version December 6, 2017, 2:09 pm UTC
 */
class OptionSet extends Model
{

    protected $table = 'options_set';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'question_id',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'answer'
    ];

    public function question()
    {
        return $this->belongsTo('QUIZ\Models\Question');
    }
}
