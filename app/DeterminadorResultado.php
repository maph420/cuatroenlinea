<?php

// todas las constantes, clases y metodos definidos aca pertenecen al espacio de nombres App
namespace App;


interface InterfazResultado {
	private function chequearFicha($i,$j,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
	public function obtenerGanadorVertical();
	public function obtenerGanadorHorizontal();
	public function obtenerGanadorSupDer();
	public function obtenerGanadorInfDer();
	public function obtenerGanadorSupIzq();
	public function obtenerGanadorInfIzq();
	public function salidaLinda($arr);
}


class DeterminadorResultado implements InterfazResultado {

	protected Tablero $tablero;

	public function __construct(Tablero $tablero) {
		$this->tablero = $tablero;
	}

	private function chequearFicha($i,$j,$azul,$rojo,$winnerPosBlue,$winnerPosRed) {
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
				} return array($rojo,$azul,$winnerPosBlue,$winnerPosRed);
	}

	public function obtenerGanadorHorizontal() {

		for ($i=0; $i<($this->tablero->get_height()); $i++) {

			$winnerPosRed = [];
			$winnerPosBlue = [];
			$azul=0;
			$rojo=0;

			for ($j=0; $j<($this->tablero->get_width()); $j++ ) {
				$vals = $this->chequearFicha($i,$j,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}
				if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}

	public function obtenerGanadorVertical() {

		for ($i=0; $i<($this->tablero->get_width()); $i++) {
			$winnerPosRed = [];
			$winnerPosBlue = [];
			$azul=0;
			$rojo=0;

			for ($j=0; $j<($this->tablero->get_height()); $j++ ) {
				$vals = $this->chequearFicha($i,$j,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}
	
	public function obtenerGanadorSupDer() {

		for ($i=0; $i<($this->tablero->get_width())-3; $i++) {

			$winnerPosRed = [];
			$winnerPosBlue = [];
			$azul=0;
			$rojo=0;

			for ($row=$i, $col=0; $row<($this->tablero->get_width()) && $col<($this->tablero->get_height()); $row++, $col++ ) {
				$vals = $this->chequearFicha($col,$row,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}
		
		public function obtenerGanadorInfIzq() {

		for ($j=1; $j<($this->tablero->get_height())-3; $j++) {
		
			$azul=0;
			$rojo=0;
			$winnerPosBlue = [];
			$winnerPosRed = [];
			
			for ($col=$j, $row=0; $col<($this->tablero->get_height()) && $row<($this->tablero->get_width()); $row++, $col++ ) {
				$vals = $this->chequearFicha($col,$row,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}
	
	
		public function obtenerGanadorSupIzq() {
	
		for ($j=($this->tablero->height)-1; $j>=3; $j--) {
		
			$azul=0;
			$rojo=0;
			$winnerPosBlue = [];
			$winnerPosRed = [];
			
			for ($col=$j, $row=0; $col>=0 && $row<($this->tablero->get_width()); $row++, $col-- ) {
				print("row: " .$row . " col: " . $col . "\n");
				$vals = $this->chequearFicha($col,$row,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			} return false;
	}
}
	
	public function obtenerGanadorInfDer() {
	
		for ($i=1; $i<($this->tablero->get_width())-3; $i++) {
		
			$azul=0;
			$rojo=0;
			$winnerPosBlue = [];
			$winnerPosRed = [];
			
			for ($row=$i, $col=($this->tablero->get_height())-1; $row<($this->tablero->get_width()) && $col>=0; $row++, $col-- ) {
				print("row: " .$row . " col: " . $col . "\n");
				$vals = $this->chequearFicha($col,$row,$azul,$rojo,$winnerPosBlue,$winnerPosRed);
				$rojo = $vals[0];
				$azul= $vals[1];
				$winnerPosBlue= $vals[2];
				$winnerPosRed= $vals[3];
			}

			if ($azul>=4) {
				return $winnerPosBlue;
			} else if ($rojo >=4) {
				return $winnerPosRed;
			}
		} return false;
	}

	public function salidaLinda($arr) {
		for ($i=0; $i<count($arr); $i++)
			print "( " . $arr[$i][0] . ", " . $arr[$i][1] . ")\n";
	}

}
