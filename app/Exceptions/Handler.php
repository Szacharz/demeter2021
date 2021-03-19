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

    public function render($request, Exception $e)
{
    if ($e instanceof ModelNotFoundException) {
        $e = new NotFoundHttpException($e->getMessage(), $e);
    }

    if ($e instanceof TokenMismatchException) {

        return redirect(route('login'))->with('message', 'Twoja sesja wygasła. Zaloguj się ponownie. ');
    }

    return parent::render($request, $e);
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
