<?php
namespace App\Models;
use PDO;
class Users extends \Core\Model{
    public static function insert($data,$table){
        try{
            $fields = implode(",",array_keys($data));
            $values = implode("','",$data);
            $db = static::getDB();
            $query = "INSERT INTO $table ($fields) VALUES ('$values')";
            $db->exec($query);
            return $db->lastInsertId();
        }
        catch(PDOException $e){
            echo $e->getMessage();
       }
    }
    public static function fetchAll($table){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $table");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function checkEmail(){
        
    }
    public static function displayData(){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM serviceregistration where userid ='". $_SESSION['userId']."'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function displayService($id){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM serviceregistration where serviceId ='". $id."'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        } 
    }
    public static function editService($id,$data){
        try{
            $db = static::getDB();
            $temp = "";
            foreach($data as $key=>$value){
                $temp .= $key."='".$value."',";
            }
            $updateData = substr($temp,0,strlen($temp)-1);
            $query = "UPDATE serviceregistration SET $updateData where serviceId = '$id'";
            $db->exec($query);             
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}