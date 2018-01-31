<?php

namespace QUIZ\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Question
 * @package QUIZ\Models
 * @version December 6, 2017, 2:09 pm UTC
 */
class Question extends Model
{

    protected $dates = ['deleted_at'];

    public $fillable = [
        'question',
        'type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
        'type' => 'integer',
    ];

    public function optionSet()
    {
       return  $this->hasOne('QUIZ\Models\OptionSet');
    }
}
