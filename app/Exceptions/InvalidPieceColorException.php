<?php
namespace App\Exceptions;


use Exception;

class InvalidPieceColorException extends \Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug(__FILE__ . ": " . "Color no reconocido, opciones disponibles: rojo, azul, blanco");
    }
}
