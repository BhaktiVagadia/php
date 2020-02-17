<?php
namespace App\Models;
use PDO;
class Categories extends \Core\Model{
    public static function displayData($url){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM category where urlKey='$url'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
       }
       catch(PDOException $e){
            echo $e->getMessage();
       }
    }
    public static function fetchAll(){
            try{
                $db = static::getDB();
                $stmt = $db->query("SELECT * FROM category");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }
        catch(PDOException $e){
                echo $e->getMessage();
        }
    }
    public static function displayProduct($catId){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT productId FROM products_category where CategoryId='$catId'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $temp = "";
            foreach($result as $key=>$value){
               $temp.=$result[$key]['productId'].",";
            }
            $productId = substr($temp,0,strlen($temp)-1);
            $stmt = $db->query("SELECT * FROM products where productId in ($productId)");
            $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result1;
        }
        catch(PDOException $e){
            echo $e->getMessage();
       }
    }
}
?>