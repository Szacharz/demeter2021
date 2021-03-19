<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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

    public function render($request, Exception $exception)
    {

        if($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                // not found
                case 404:
                    return redirect()->route('home');
                    break;

                // internal error
                case 500:
                    return \Response::view('errors.500', [], 500);
                    break;

                default:
                    return $this->renderHttpException($exception);
                    break;
            }
        } else {
            return parent::render($request, $exception);
        }

    }
 /** Funkcja odpowiadająca za błędy strony */
  /**  public function render($request, Exception $exception)
  *  {
  *      if ($this->isHttpException($exception)) {
  *          if (view()->exists('errors.' . $exception->getStatusCode())) {
    *             return response()->view('errors.' . $exception->getStatusCode(), [], $exception->getStatusCode());
  *          }
   *     }
     *
    *    return parent::render($request, $exception);
  *  }
  */
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
