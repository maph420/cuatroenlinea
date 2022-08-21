<?php
// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;

use Exception;
use InvalidPieceColorException;

interface InterfazFicha {
	// por algun motivo tipar con ": String" la interfaz da problemas
	public function obtener_color();
}

class Ficha implements InterfazFicha {

	protected String $colorFicha;
	
	// llamada cada vez que se instancia una nueva Ficha
	public function __construct(String $colorFicha) {

		if (!($colorFicha == 'rojo' || $colorFicha == 'azul' || $colorFicha == 'blanco')) {
			throw new InvalidPieceColorException("Color de ficha no reconocido");
			return;
		}

		$this->colorFicha = $colorFicha;
	}

	// retorna el color de la ficha
	public function obtener_color() {
		return $this->colorFicha;
	}

}
