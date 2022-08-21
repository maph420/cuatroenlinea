<?php
namespace App\Exceptions;

use Exception;

class InvalidDimensionsException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug(__FILE__ . ": " . "Las dimensiones del tablero son muy pequeñas, el tamaño minimo debe ser 4x4");
    }
}
