<?php 
namespace Tests;

use App\Enums\Units; 
use App\Helpers\Database;

class BasketTest extends \PHPUnit\Framework\TestCase
{
    public function testAddToBasket(){ //testing 'Add To Basket' action
        $dataSet = [
            "measurement_unit" => Units::METERS,
            "depth_measurement_unit" => Units::CANTIMETERS,
            "width" => 10,
            "length" => 11,
            "depth" => 1.4,
            "bag_count" => 4,
            "unit_price" => 72,
        ];

        $database = new Database();
        $valueKeys = '';
        foreach($dataSet as $key => $data){
            $valueKeys .= ':'.$key.',';
        }
        $valueKeys = rtrim($valueKeys, ",");
        $store = $database->store("INSERT INTO cart_items(measurement_unit,depth_measurement_unit, width, length, depth, bag_count, unit_price) VALUES(".$valueKeys.")", $dataSet);
        $this->assertEquals(true, $store);
    }
}

?>