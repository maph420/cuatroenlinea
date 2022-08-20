<?php
// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;

class Ficha {

	protected $colorFicha;
	
	// llamada cada vez que se instancia una nueva Ficha
	public function __construct(String $colorFicha) {

		if (!($colorFicha == 'rojo' || $colorFicha == 'azul' || $colorFicha == 'blanco')) {
			// excepcion
			return;
		}

		$this->colorFicha = $colorFicha;
	}

	// retorna el color de la ficha
	public function obtener_color() {
		return $this->colorFicha;
	}

}
