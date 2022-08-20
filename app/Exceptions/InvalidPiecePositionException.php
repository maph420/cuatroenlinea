<?php
namespace App\Exceptions;

use Exception;

class InvalidPiecePositionException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug(__FILE__ . ": " . "No fue posible colocar la ficha en el lugar solicitado. Revisar dimensiones del tablero");
    }
}
