<?php
 
namespace Tests\Feature;
 
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
		$ficha1 = new Ficha("rojo");
		$ficha2 = new Ficha("rojo");
		$ficha3 = new Ficha("rojo");
		$ficha4 = new Ficha("rojo");

		$ficha5 = new Ficha("azul");
		$ficha6 = new Ficha("azul");
		$ficha7 = new Ficha("azul");
		$ficha8 = new Ficha("azul");
		
		$w=6;
		$h=9;
		$tablero = new Tablero($w,$h);
	
		$fichas = array();

		for ($i=0; $i<8; $i++) {
			$fichas[$i] = ($i < 4) ? new Ficha("rojo") : new Ficha("azul");
		}

		for ($i=0; $i<8; $i++) {
			$r1 = rand(0,5);
			$r2 = rand(0,5);
			while ($t->ficha_en_casilla($r1,$r2)) {
				$r1 = rand(0,5);
				$r2 = rand(0,5);
			}
			$t->soltar_ficha($r1,$r2,$fichas[$i]);
		}

		$azules = 0;
		$rojas = 0;
		$blancas = 0;


		for ($i=0; $i<$w; $i++) {
			for ($j=0; $j<$h; $j++) {
				if (($t->tablero[$i][$j]->obtener_color()) == 'rojo')
					$rojas++;
		
				else if (($t->tablero[$i][$j]->obtener_color()) == 'azul')
					$azules++;
			
				else $blancas++;
			}
		}
		
		// verificamos si el numero de fichas colocadas es el correcto
	i	$this->assertTrue( ($azules == 4) && ($rojas == 4) && ($blancas == ($w*$h-$rojas-$azules)) );
	}	
	
	public function test_board()
	{
	array()		
	}
