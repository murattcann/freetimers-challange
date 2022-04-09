<?php 
namespace Tests;

use App\Enums\Units;
use App\Helpers\Calculator; 
class CalculationTest extends \PHPUnit\Framework\TestCase
{
    public function testCalculateNumberOfBags(){ //testing calculation the number of bags
        
        $calculator = new Calculator();
        $calculator->setMeasurementUnit(Units::METERS)
                ->setDepthMeasurementUnit(Units::CANTIMETERS)
                ->setDimensions(10, 11, 1.4)
                ->calculate();
        $result = $calculator->getResult();
        $this->assertEquals(4, $result);
    }
}

?>