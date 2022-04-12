<?php 

/**
 * @author Murat CAN <muratcan.php@gmail.com>
 */
namespace App\Helpers\Interfaces;

interface ICalculator
{    
    public function setMeasurementUnit(string $measurementUnit);
    public function setDepthMeasurementUnit(string $depthMeasurementUnit);
    public function setDimensions(int $width, int $length, float $depth = 1.4);
    public function calculate();
    public function getResult();
    public function saveObjects();
    public function convertToMeter(int $value, string $unit);
}