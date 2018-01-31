<?php

namespace QUIZ\Http\Middleware;

use Closure;
use QUIZ\Exceptions\AppError;
use QUIZ\Http\CommonTraits\JSONResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;

class JWTCheckAuth
{

    use JSONResponse;

    protected $auth;

    public function __construct()
    {
        $this->auth = JWTAuth::getFacadeRoot();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (! $token = $this->auth->setRequest($request)->getToken()) {
            return $this->error(AppError::TOKEN_ERR(), 'Please provide a token', 400);
        }

        try {
            $user = $this->auth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return app(\Tymon\JWTAuth\Middleware\RefreshToken::class)->handle($request, $next);
        } catch (JWTException $e) {
            return $this->error(APPError::TOKEN_ERR(), $e->getMessage(), $e->getStatusCode());
        }

        if (! $user) {
            return $this->error(APPError::TOKEN_ERR(), 'Unable to find token user', 404);
        }

        return $next($request);
    }
}
