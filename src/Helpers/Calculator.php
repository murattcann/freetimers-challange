<?php 

/**
 * @author Murat CAN <muratcan.php@gmail.com>
 */
namespace App\Helpers;

use App\Enums\Units;
use App\Helpers\Interfaces\ICalculator;

class Calculator implements ICalculator
{
    private $measurementUnit = null; 
    private $depthMeasurementUnit = null;
    private $dimensions = null; 
    private $result = 0;
    /**
     * This method sets measurement unit for calculation by given string
     * @param string $measurementUnit
     * @return self
     */
    public function setMeasurementUnit(string $measurementUnit)
    {
        $this->measurementUnit = $measurementUnit;
        return $this;
    }
    /**
     * This method sets depth measurement unit for calculation by given string
     * @param string $depthMeasurementUnit
     * @return self
     */
    public function setDepthMeasurementUnit(string $depthMeasurementUnit)
    {
        $this->depthMeasurementUnit = $depthMeasurementUnit;
        return $this;
    }

    /**
     * This method sets dimensions as array by given parameters
     * @param int $width
     * @param int $length
     * @param int $depth
     * @return self
     */
    public function setDimensions(int $width, int $length, float $depth = 1.4)
    {
        $this->dimensions = [
            "width" => $this->convertToMeter($width, $this->measurementUnit),
            "length" => $this->convertToMeter($length, $this->measurementUnit),
            "depth" => $depth// $this->convertToMeter($depth, $this->depthMeasurementUnit),
        ];
       
        return $this;
    }

    /**
     * This method calculates the numbers of bag with the values which given before
     */
    public function calculate()
    {
        $firstStep = $this->dimensions['width'] * $this->dimensions['length'] * 0.025;
        $this->result = ceil($this->dimensions['depth'] * $firstStep);
    }
    /**
     * This method returns calculated bag count
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

     /** This method records the calculating credentials to db*/
    public function saveObjects()
    {
        $database = new Database();
        $dataSet = [
            "measurement_unit" => $this->measurementUnit,
            "depth_measurement_unit" => $this->depthMeasurementUnit,
            "width" => $this->convertToMeter($this->dimensions["width"], $this->measurementUnit),
            "length" => $this->convertToMeter($this->dimensions["length"], $this->depthMeasurementUnit),
            "depth" => $this->dimensions["depth"],
            "bag_count" => $this->result, 
        ];
         

        $valueKeys = "";
        //convert array to pdo string => :column1, :column2
        foreach($dataSet as $key => $data){
            $valueKeys .= ':'.$key.',';
        }
        $valueKeys = rtrim($valueKeys, ",");
        return $database->store("INSERT INTO calculated_results(measurement_unit,depth_measurement_unit, width, length, depth, bag_count) VALUES(".$valueKeys.")", $dataSet);
    }
    /** This method converts measurements excluding meters
     * @param int $value
     * @param string $unit
     * @return float
     */
    public function convertToMeter(int $value, string $unit)
    {
        return $value * Units::UNIT_MULTIPLES[$unit];
    }

}