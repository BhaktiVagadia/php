<?php
namespace App\Models;
use PDO;
class Products extends \Core\Model{
    public static function displayData($url){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM products where urlKey='$url'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
       }
       catch(PDOException $e){
            echo $e->getMessage();
       }
    }
}
?>