<?php

namespace QUIZ\Repositories;

use QUIZ\Models\Question;
use InfyOm\Generator\Common\BaseRepository;

class QuestionRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Question::class;
    }
}
