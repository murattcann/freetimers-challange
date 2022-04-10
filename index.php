<?php

use App\Helpers\Basket;
use App\Helpers\Calculator;
use App\Helpers\Database;

require_once __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 
if(isset($_POST["action"]) && $_POST["action"] === "getCartItems"){ // gets all cart or basket items from db

    $database = new Database();
    $cartItems = $database->getAll("SELECT * FROM cart_items ORDER BY id DESC");
    $totalData = $database->get("SELECT SUM(bag_count) as 'totalQty', SUM(bag_count * unit_price) as 'totalPrice' FROM cart_items");

    echo json_encode(["rows" => $cartItems, "rowCount" => count($cartItems), "totalData" => $totalData]);

}else if(isset($_POST["action"]) && $_POST["action"] === "calculate"){ // calculates the number of bags

    $calculator = new Calculator();
    $request = $_POST;
    $calculator->setMeasurementUnit($request["measurement_unit"])
            ->setDepthMeasurementUnit($request["depth_measurement_unit"])
            ->setDimensions($request["width"], $request["length"], $request["depth"])
            ->calculate();
    $bagCount = $calculator->getResult();
    $calculator->saveObjects();

    echo json_encode(["calculatedResult" => $bagCount]);

 }else if(isset($_POST["action"]) && $_POST["action"] === "addToCart"){ // records to cart_items table given datas

    $request = $_POST;
    unset($request["action"]);
    $request["unit_price"] = 72;
    $store = Basket::addToBasket($request);
    $statusCode = $store ?  201: 400;
    
    echo json_encode(["status" => $statusCode]);

}else{
    require "./view/calculation.php";
}
?>