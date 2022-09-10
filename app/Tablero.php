<?php
// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;

use Exception;
use PiecesOverlappingException;
use InvalidDimensionsException;
use InvalidPiecePositionException;

interface InterfazTablero {
	public function limpiar_tablero();
	public function ficha_en_casilla(int $posY, int $posX);
	public function soltar_ficha(int $posX, Ficha $f);
	public function mostrar_tablero();
	public function get_height();
	public function get_width();
}

class Tablero implements InterfazTablero {

	protected int $width;
	protected int $height;
	public array $tablero;

	// volver el tablero a su estado inicial (todos los espacios blancos)
	public function limpiar_tablero() {

		for ($x=0; $x<$this->height; $x++) {
			for ($y=0; $y<$this->width; $y++) {
				$this->tablero[$y][$x] = new Ficha("blanco");
			}
		}

	}

	public function get_height() {
		return $this->height;
	} 

	public function get_width() {
		return $this->width;
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
	public function soltar_ficha(int $posX, Ficha $f) {
		
		if ($this->width-1 < $posX || $posX < 0) {
			throw new InvalidPiecePositionException("Se esta intentando colocar una ficha por fuera de las dimensiones del tablero");
			return;
		}

		$i = $this->height;
		
		while(--$i>0) {
			if (!$this->ficha_en_casilla($posX,$i)) {
				$this->tablero[$posX][$i] = $f;
				break;
			}
		}
	}
	
	// mostrar contenido del tablero actual
	public function mostrar_tablero() {
		$title="TABLERO DE JUEGO";
		
		echo "\n" . str_repeat('-', strlen($title)) . "\n";
		echo $title;
		echo "\n" . str_repeat('-', strlen($title)) . "\n";
		
		for ($x=0; $x<$this->width; $x++) {
			if ($x==0) echo "\t" . $x . "\t";
			else echo $x . "\t";
		}
		echo "\n";
		
		for ($x=0; $x<$this->height; $x++) {
			echo $x . "\t";
			for ($y=0; $y<$this->width; $y++) {
				echo $this->tablero[$y][$x]->obtener_color() . "\t";
			}
			echo "\n";
		}
	}

}
