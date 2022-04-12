<?php 
namespace Tests;

use App\Enums\Units;
use App\Helpers\Calculator;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class CalculationTest extends \PHPUnit\Framework\TestCase
{
    //testing calculation the number of bags
    public function testCalculateNumberOfBags()
    {   
        
        $calculator = new Calculator();
        $calculator->setMeasurementUnit(Units::METERS)
                ->setDepthMeasurementUnit(Units::CANTIMETERS)
                ->setDimensions(10, 11, 1.4)
                ->calculate();
        $result = $calculator->getResult();
        $this->assertEquals(4, $result);
    }
    //testing saveObjects method of calculator class
    public function testSaveObjects()
    {   
        
        $calculator = new Calculator();
        $calculator->setMeasurementUnit(Units::METERS)
                ->setDepthMeasurementUnit(Units::CANTIMETERS)
                ->setDimensions(10, 11, 1.4)
                ->calculate();
        $store = $calculator->saveObjects();
        $this->assertEquals(true, $store);
    }
    // testing convertToMeter method for feet
    public function testConvertFeetToMeter()
    {   
        
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::FEETS);
        $this->assertEquals(3.048, $converted);
    }
    // testing convertToMeter method for yard
    public function testConvertYardsToMeter()
    {      
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::YARDS);
        $this->assertEquals(9.144, $converted);
    }

    // testing convertToMeter method for inch
    public function testConvertInchToMeter()
    {       
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::INCHES);
        $this->assertEquals(0.254, $converted);
    }
    
    // testing convertToMeter method for cantimeter
    public function testConvertCantimeterToMeter()
    {   
        $calculator = new Calculator();
        $converted = $calculator->convertToMeter(10, Units::CANTIMETERS);
        $this->assertEquals(0.1, $converted);
    }
}
