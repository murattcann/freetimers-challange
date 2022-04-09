<?php 
namespace Tests;

use App\Enums\Units;
use App\Helpers\Basket;
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
        $store = Basket::addToBasket($dataSet);
        $this->assertEquals(true, $store);
    }
}

?>