<?php
namespace App\Exceptions;

use Exception;

class PiecesOverlappingException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug(__FILE__ . ": " . "Se intento colocar una ficha en un casillero ya ocupado");
    }
}
