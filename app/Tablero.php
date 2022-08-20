<?php
// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;

class Tablero {

	protected int $width;
	protected int $height;
	public array $:tablero;

	// llamada cada vez que se instancia un nuevo Tablero
	public function __construct(int $width, int $height) {
		
		if !($width >= 4 && $height >=4) {
			// excepcion
			return;
		}

		$this->width = $width;
		$this->height = $height;	
		limpiar_tablero();
	}

	// suelta la ficha
	public function soltar_ficha(int $posX, $posY, Ficha $f) {

		if !($posX <= $this->width && $posY <= $this->height) {
			// excepcion
			return;
		}

	$this->tablero[$posX][$posY] = $f;

	}

	// mostrar contenido del tablero actual
	public function mostrar_tablero() {
		for ($x=0; $x<$this->width; $x++) {
			for ($y=0: $y<$this->height; $y++) {
				echo "-"*$this->width . "\n"
				echo "TABLERO DE JUEGO"
				echo "-"*$this->width . "\n"
				echo "$this->tablero[$x][$y]" . "\n"
			}
		}
	}

	// volver el tablero a su estado inicial (todos los espacios blancos)
	public function limpiar_tablero() {

		for ($x=0; $x<$this->width; $x++) {
			for ($y=0: $y<$this->height; $y++) {
				$this->tablero[$x][$y] = NULL;
			}
		}

	}

}

?>
