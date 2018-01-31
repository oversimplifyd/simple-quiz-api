<?php

namespace QUIZ\Http\Controllers\API;

use QUIZ\Exceptions\AppError;
use QUIZ\Http\Requests\API\QuestionRequest;
use QUIZ\Repositories\QuestionRepository;

class QuizController extends APIBaseController
{
    private $questionRepo;

    /**
     * WinnersController constructor.
     */
    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepo = $questionRepo;
    }

    public function getQuestions(QuestionRequest $request)
    {
        return $this->success($this->questionRepo
            ->with(['optionSet'])
            ->findWhere($request->all())
        );
    }
}
