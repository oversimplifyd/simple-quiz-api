<?php

namespace QUIZ\Repositories;

use QUIZ\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
