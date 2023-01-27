<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }


     /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    // public function render($request, Throwable $exception)
    // {
    //     return parent::render($request, $exception);
    // }


    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->is('api/*')) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        } else {
            return redirect('/login');
        }
    }



    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            $jsonResponse = parent::render($request, $exception);
            return $this->processApiException($jsonResponse);
        }

        return parent::render($request, $exception);
    }

    protected function processApiException($originalResponse)
    {
        if($originalResponse instanceof JsonResponse){
            $data = $originalResponse->getData(true);
            $data['status'] = $originalResponse->getStatusCode();
            $data['errors'] = [Arr::get($data, 'exception', 'Something went wrong!')];
            $data['message'] = Arr::get($data, 'message', '');
            $originalResponse->setData($data);
        }

        return $originalResponse;
    }
}
