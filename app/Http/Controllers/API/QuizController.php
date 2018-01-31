<?php

namespace QUIZ\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use QUIZ\Http\Requests\API\QuestionRequest;
use QUIZ\Repositories\QuestionRepository;
use QUIZ\Repositories\QuizRepository;

class QuizController extends APIBaseController
{
    private $questionRepo;
    private $quizRepo;

    /**
     * WinnersController constructor.
     */
    public function __construct(
        QuestionRepository $questionRepo,
        QuizRepository $quizRepo
    ) {
        $this->questionRepo = $questionRepo;
        $this->quizRepo = $quizRepo;
    }

    public function getQuestions(QuestionRequest $request)
    {
        return $this->success($this->questionRepo
            ->with(['optionSet'])
            ->findWhere($request->all())
        );
    }

    public function postAnswers(Request $request)
    {
        $userId = Auth::user()->id;
        $input = $request->all();
        $input['user_id'] = $userId;
        $this->quizRepo->create($input);
        return $this->success('Saved Successfully');
    }
}
