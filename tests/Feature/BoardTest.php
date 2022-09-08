<?php
namespace Tests\Feature;
namespace App;

//namespace App\Exceptions;

use Exception;
use InvalidPieceColorException;
use InvalidDimensionsException;
use InvalidPiecePositionException;
use PiecesOverlappingException;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

 
class BoardTest extends TestCase
{
    /**
     * Compare the number of each row shown vs. the expected number
     *
     * @return void
     */
	public function test_number_of_pieces()
	{
		$w=6;
		$h=9;
		$t = new Tablero($w,$h);
	
		$fichas = array();

		for ($i=0; $i<8; $i++) {
			$fichas[$i] = ($i < 4) ? new Ficha("rojo") : new Ficha("azul");
		}

		for ($i=0; $i<8; $i++) {
			$r1 = rand(0,$w-1);

			while ($t->ficha_en_casilla($r1,$i)) 
				$r1 = rand(0,$w-1);

			$t->soltar_ficha($r1,$fichas[$i]);
		}	

		$azules = 0;
		$rojas = 0;
		$blancas = 0;

		for ($i=0; $i<$h; $i++) {
			for ($j=0; $j<$w; $j++) {
				if (($t->tablero[$j][$i]->obtener_color()) == 'rojo')
					$rojas++;

				else if (($t->tablero[$j][$i]->obtener_color()) == 'azul')
					$azules++;
				else $blancas++;
			}
		}
		
		// verificamos si el numero de fichas colocadas es el correcto
		$this->assertTrue( ($azules == 4) && ($rojas == 4) && ($blancas == ($w*$h-$rojas-$azules)) );
	}

	public function test_clear()
	{
		$w=6;
		$h=9;
		$t = new Tablero($w,$h);
	
		$fichas = array();

		for ($i=0; $i<8; $i++) {
			$fichas[$i] = ($i < 4) ? new Ficha("rojo") : new Ficha("azul");
		}

		for ($i=0; $i<8; $i++) {
			$r1 = rand(0,$w-1);

			while ($t->ficha_en_casilla($r1,$i)) 
				$r1 = rand(0,$w-1);

			$t->soltar_ficha($r1,$fichas[$i]);
		}	

		//!!
		$t->limpiar_tablero();

		$azules = 0;
		$rojas = 0;
		$blancas = 0;

		for ($i=0; $i<$h; $i++) {
			for ($j=0; $j<$w; $j++) {
				if (($t->tablero[$j][$i]->obtener_color()) == 'rojo')
					$rojas++;

				else if (($t->tablero[$j][$i]->obtener_color()) == 'azul')
					$azules++;
				else $blancas++;
			}
		}
		
		// verificamos la correcta limpieza del tablero
		$this->assertTrue( ($azules == 0) && ($rojas == 0) && ($blancas == ($w*$h)) );				
	}
}	
