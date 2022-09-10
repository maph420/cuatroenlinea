<?php
namespace Tests\Feature;
namespace App;


use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class WinningTest extends TestCase {

	public function test_winning_cases {
	
	$w=11;
	$h=9;
	
	$t = new Tablero($w,$h);

	$fichaRoja = new Ficha('rojo');
	$fichaAzul = new Ficha('azul');
		
	$d = new DeterminadorResultado($t);
		
	for ($i=0; $i<8; $i++) {
		$t->soltar_ficha(2, $fichaRoja);
	}
	
	$t->mostrar_tablero();
	
	/*
	
	x * * *
	x * * *
	x * * *
	x * * *
	
	*/
	

	$this->assertTrue(count($ganadorV = $d->obtenerGanadorVertical()) == 4);
	print($d->salidaLinda($ganadorV));

	$t->limpiar_tablero();
	
		
	for ($i=0; $i<8; $i++) {
		$t->soltar_ficha($i, $fichaRoja);
	}
		
	$t->mostrar_tablero();
	
	/*
	
	x x x x
	* * * *
	* * * *
	* * * *
	
	*/
	
	$this->assertTrue(count($ganadorH = $d->obtenerGanadorHorizontal()) == 4);
	print($d->salidaLinda($ganadorH));

	$t->limpiar_tablero();
	
	for ($i=0; $i<4; $i++) {
			$t->soltar_ficha(0, $fichaRoja);
			$t->soltar_ficha(1, $fichaRoja);
			$t->soltar_ficha(2, $fichaRoja);
			$t->soltar_ficha(3, $fichaRoja);
		}
		
	$t->mostrar_tablero();	
	
	/*
	
	* * * * *
	x * * * *
	* x * * *
	* * x * *
	* * * x *
	
	*/
	
	$this->assertTrue(count($ganadorID = $d->obtenerGanadorInfDer()) == 4);
	print($d->salidaLinda($ganadorID));

	$t->limpiar_tablero();
		
	for ($i=0; $i<4; $i++) {
		$t->soltar_ficha(7, $fichaRoja);
		$t->soltar_ficha(8, $fichaRoja);
		$t->soltar_ficha(9, $fichaRoja);
		$t->soltar_ficha(10, $fichaRoja);
	}	
		
	$t->mostrar_tablero();	
		
	/*
	
	* * * * *
	* * * * x
	* * * x *
	* * x * *
	* x * * *
	
	*/
	
	$this->assertTrue(count($ganadorII = $d->obtenerGanadorInfIzq()) == 4);
	print($d->salidaLinda($ganadorII));

	$t->mostrar_tablero();

	/*
	
	* x * * *
	* * x * *
	* * * x *
	* * * * x
	* * * * *
	
	*/
	
	$this->assertTrue(count($ganadorSD = $d->obtenerGanadorSupDer()) == 4);
	print($d->salidaLinda($ganadorSD));
	$t->limpiar_tablero();

	
	for ($i=0; $i<9; $i++) {
		$t->soltar_ficha(5, $fichaRoja);
		$t->soltar_ficha(6, $fichaRoja);
		$t->soltar_ficha(7, $fichaRoja);
		$t->soltar_ficha(8, $fichaRoja);
	}	
	
	$t->mostrar_tablero();	
	
	/*
	
	* * * x *
	* * x * *
	* x * * *
	x * * * *
	* * * * *
	
	*/
	
	$this->assertTrue(count($ganadorSI = $d->obtenerGanadorSupIzq()) == 4);
	print($d->salidaLinda($ganadorSI));
	}
	
}


