<?php 

/**
 * @author Murat CAN <muratcan.php@gmail.com>
 */
namespace App\Helpers;

use App\Helpers\Interfaces\IBasket;

class Basket implements IBasket
{
    /**
    * This method records basket item to db
    * @param array $dataSet
    * @return bool
    */
    public static function addToBasket(array $dataSet)
    {
        $database = $database = new Database();
        $valueKeys = "";
        //convert array to pdo string => :column1, :column2
       foreach($dataSet as $key => $req){
           $valueKeys .= ':'.$key.',';
       }
       $valueKeys = rtrim($valueKeys, ",");
       $store = $database->store("INSERT INTO cart_items(measurement_unit,depth_measurement_unit, width, length, depth, bag_count, unit_price) VALUES(".$valueKeys.")", $dataSet);
       return $store;
    }
}