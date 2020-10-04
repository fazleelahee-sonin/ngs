<?php

namespace App\Exceptions;

use Exception;

class NotAcceptableRestException extends Exception
{
    public function report()
    {
        return false;
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'errors' => $this->message,
        ], $this->code == 0 ? 422 : $this->code);

    }
}