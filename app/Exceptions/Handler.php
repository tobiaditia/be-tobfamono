<?php

namespace App\Exceptions;

use App\Traits\RestExceptionHandlerTrait;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use RestExceptionHandlerTrait;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Throwable  $exception
     * @return mixed
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {

        if ($exception instanceof LockTimeoutException) {
            return $this->badRequest(
                \trans('messages.try_again')
            );
        }

        return $this->getJsonResponseForException($request, $exception);
    }
}
