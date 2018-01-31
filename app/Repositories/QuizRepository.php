<?php

namespace QUIZ\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use QUIZ\Models\Quiz;

class QuizRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Quiz::class;
    }
}
