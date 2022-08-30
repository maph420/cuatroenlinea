<?php

// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;
	
	
interface InterfazResultado {
	// una vez que haga el metodo publico completo estos metodos se vuelven privados
	public function obtenerGanadorVertical();
	public function obtenerGanadorHorizontal();
}


class DeterminadorResultado implements InterfazResultado {

	protected Tablero $tablero;

	public function __construct(Tablero $tablero) {
		$this->tablero = $tablero;
	}

	public function obtenerGanadorHorizontal() {
		
		$winnerPosRed = [];
		$winnerPosBlue = [];
		
		for ($i=0; $i<($this->tablero->height); $i++) {
			$azul=0;
			$rojo=0;
			for ($j=0; $j<($this->tablero->width); $j++ ) {
				if ($this->tablero->tablero[$j][$i]->obtener_color() == 'azul' && ($rojo < 4)) {
					if ($azul < 4) {
						array_push($winnerPosBlue,[$j,$i]);
					}
					$winnerPosRed = [];
					$azul++;
					$rojo=0;
					
				} else if ($this->tablero->tablero[$j][$i]->obtener_color() == 'rojo' && ($azul < 4)) {
					if ($rojo < 4) {
						array_push($winnerPosRed,[$i,$j]);	
					}
					$winnerPosBlue = [];
					$rojo++;
					$azul = 0;
				} else {
					if ($rojo < 4) {
						$rojo=0;
						$winnerPosRed = [];
					}
					if ($azul < 4) {
						$azul=0;
						$winnerPosBlue = [];
					}
				}
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}
	
	public function obtenerGanadorVertical() {
		
		$winnerPosRed = [];
		$winnerPosBlue = [];
		
		for ($i=0; $i<($this->tablero->width); $i++) {
			$azul=0;
			$rojo=0;
			for ($j=0; $j<($this->tablero->height); $j++ ) {
				if ($this->tablero->tablero[$i][$j]->obtener_color() == 'azul' && ($rojo < 4)) {
					if ($azul < 4) {
						array_push($winnerPosBlue,[$i,$j]);
					}
					$winnerPosRed = [];
					$azul++;
					$rojo=0;
					
				} else if ($this->tablero->tablero[$i][$j]->obtener_color() == 'rojo' && ($azul < 4)) {
					if ($rojo < 4) {
						array_push($winnerPosRed,[$i,$j]);	
					}
					
					$winnerPosBlue = [];
					$rojo++;
					$azul = 0;
				} else {
					if ($rojo < 4) {
						$rojo=0;
						$winnerPosRed = [];
					}
					if ($azul < 4) {
						$azul=0;
						$winnerPosBlue = [];
					}
				}
			}
			
			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}


}
