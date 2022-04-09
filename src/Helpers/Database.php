<?php 

namespace App\Helpers;

use PDO;
use PDOException;
/**
 * @author Murat CAN <muratcan.php@gmail.com>
 */
class Database 
{
    private $connection;
    private $host = "127.0.0.1";
    private $dbName = "freetimers";
    private $userName = "root";
    private $userPassword = "";


    public function __construct()
    {
         
        try {
            $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->userName, $this->userPassword);
        } catch ( PDOException $e ){
            print ">>> Program Has An Connection Error: " .$e->getMessage();
        }
    }

    public function getConnection(){ // returns connection data
        return $this->connection;
    }
     /**
     * This method gets single row from database 
     * @param string $query
     */
    public function get(string $query){
        return $this->connection->query($query , PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * This method gets all the data from database 
     * @param string $query
     * @return array
     */
    public function getAll(string $query){
        return $this->connection->query($query , PDO::FETCH_ASSOC)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * This method records to database 
     * @param string $query
     * @param array $values
     * @return bool
     */
    public function store(string $query, array $values){
         
        $execute = $this->connection->prepare($query);
        return  $execute->execute($values);
    }

    
}

?>