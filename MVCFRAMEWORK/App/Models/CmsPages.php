<?php
namespace App\Models;
use PDO;
class CmsPages extends \Core\Model{
    public static function displayData($url){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM cms_page where urlKey='$url'");
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
                $stmt = $db->query("SELECT * FROM cms_page");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
        }
        catch(PDOException $e){
                echo $e->getMessage();
        }
    }
}