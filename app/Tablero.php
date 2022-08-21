<?php
// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;

use Exception;
use PiecesOverlappingException;
use InvalidDimensionsException;
use InvalidPiecePositionException;

interface InterfazTablero {
	public function limpiar_tablero();
	public function ficha_en_casilla(int $posY, int $posX) : bool;
	public function soltar_ficha(int $posY, $posX, Ficha $f);
	public function mostrar_tablero();
}



// el tablero usa la convencion de (ordenada, abcisa) no se si dejarlo asi :snamespace App;
class Tablero {

	protected int $width;
	protected int $height;
	public array $tablero;

	// volver el tablero a su estado inicial (todos los espacios blancos)
	public function limpiar_tablero() {

		for ($y=0; $y<$this->width; $y++) {
			for ($x=0; $x<$this->height; $x++) {
				$this->tablero[$y][$x] = new Ficha("blanco");
			}
		}

	}

	// llamada cada vez que se instancia un nuevo Tablero
	public function __construct(int $width, int $height) {
		
		if (!($width >= 4 && $height >=4)) {
			throw new InvalidDimensionsException("Dimensiones del tablero inadecuadas");
			return;
		}

		$this->width = $width;
		$this->height = $height;	
		$this->limpiar_tablero();
	}
	
	// verifica contenido de casilla
	public function ficha_en_casilla(int $posY, int $posX) {
		return (($this->tablero[$posY][$posX]->obtener_color() == 'rojo') || ($this->tablero[$posY][$posX]->obtener_color() == 'azul'));
	}
	
	// suelta la ficha
	public function soltar_ficha(int $posY, $posX, Ficha $f) {
		
		if (!($posX <= $this->width && $posY <= $this->height)) {
			throw new InvalidPiecePositionException("Se esta intentando colocar una ficha por fuera de las dimensiones del tablero");
			return;
		}
		
		if ($this->ficha_en_casilla($posY, $posX)) {
			throw new PiecesOverlappingException("Se esta intentando colocar una pieza donde ya se encuentra otra");
			return;
		}
			
	
	$this->tablero[$posY][$posX] = $f;

	}
	
	// mostrar contenido del tablero actual
	public function mostrar_tablero() {
		
		echo "\n" . str_repeat('-', $this->width) . "\n";
		echo "TABLERO DE JUEGO";
		echo "\n" . str_repeat('-', $this->width) . "\n";
		
		for ($x=0; $x<$this->height; $x++) {
			if ($x==0) echo "\t" . $x . "\t";
			else echo $x . "\t";
		}
		echo "\n";
		
		for ($y=0; $y<$this->width; $y++) {
			echo $y . "\t";
			for ($x=0; $x<$this->height; $x++) {
				echo $this->tablero[$y][$x]->obtener_color() . "\t";
			}
			echo "\n";
		}
	}

}


?>

