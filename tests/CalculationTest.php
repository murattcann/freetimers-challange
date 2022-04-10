<?php 
namespace Tests;

use App\Enums\Units;
use App\Helpers\Calculator;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

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
    public function testSaveObjects(){ //testing saveObjects method of calculator class
        $calculator = new Calculator();
        $calculator->setMeasurementUnit(Units::METERS)
                ->setDepthMeasurementUnit(Units::CANTIMETERS)
                ->setDimensions(10, 11, 1.4)
                ->calculate();
        $store = $calculator->saveObjects();
        $this->assertEquals(true, $store);
    }

    public function testConvertFeetToMeter(){ // testing convertToMeter method for feet
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::FEETS);
        $this->assertEquals(3.048, $converted);
    }
    public function testConvertYardsToMeter(){ // testing convertToMeter method for yard
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::YARDS);
        $this->assertEquals(9.144, $converted);
    }
    public function testConvertInchToMeter(){ // testing convertToMeter method for inch
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::INCHES);
        $this->assertEquals(0.254, $converted);
    }
    public function testConvertCantimeterToMeter(){ // testing convertToMeter method for cantimeter
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::CANTIMETERS);
        $this->assertEquals(0.1, $converted);
    }
}

?>