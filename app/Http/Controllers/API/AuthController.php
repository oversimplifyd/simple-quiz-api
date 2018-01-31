<?php

namespace QUIZ\Http\Controllers\API;

use QUIZ\Http\Requests\API\LoginRequest;
use QUIZ\Http\Requests\API\RegisterRequest;
use QUIZ\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use QUIZ\Exceptions\AppError;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use QUIZ\Http\Helpers\Image;

class AuthController extends APIBaseController
{
    private $userRepo;

    /**
     * WinnersController constructor.
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $input = $request->all();

        if (isset($input['profile_pic'])) {
            $input['profile_pic'] = Image::processImage($input['profile_pic'], 'profile_pics');
        }

        $this->userRepo->create($request->all());
        return $this->success('Registration Successful');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->error(AppError::CREDENTIAL_ERR(), "The credential does not match any record", 401);
            }
        } catch (JWTException $e) {
            return $this->error(AppError::TOKEN_ERR(), "Token could not be created", 500);
        }

        return $this->success([
            'token' => $token,
            'user_id' => Auth::user()->id,
            'full_name' => Auth::user()->full_name,
            'profile_pic' => Auth::user()->profile_pic
        ]);
    }
}
