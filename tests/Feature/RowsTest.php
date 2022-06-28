<?php
 
namespace Tests\Feature;
 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

 
class RowsTest extends TestCase
{
    /**
     * Compare the number of each row shown vs. the expected number
     *
     * @return void
     */
    public function test_rows_count()
    {
	/* GET request (random play) (*) */
        $response = $this->get('/jugar/17733327');

	// fetch html from page
	$whiteRows = preg_match_all('/<div class="bg-gray/', $response->getContent());	
	$blueRows = preg_match_all('/<div class="bg-sky/', $response->getContent());
	$redRows = preg_match_all('/<div class="bg-red/', $response->getContent());	

	/* expected values for that specific play (*) */
	$this->assertTrue( ($whiteRows == 34) && ($blueRows == 4) && ($redRows == 4) );
    }
}
