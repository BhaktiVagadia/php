<?php
namespace App\Models;
use PDO;
class Services extends \Core\Model{
    public static function checkNumber($userId,$vehicleNo,$licenceNo){
        try{
            $db = static::getDB();
            $stmt = $db->query('SELECT * from serviceregistration WHERE userId <> "$userId" and (vehicleNo = "$vehicleNo" or licenceNo = "$licenceNo")');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public static function checkTimeSlot($timeSlot,$date){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT timeslot from serviceregistration WHERE timeslot ='". $timeSlot."' AND date = '".$date."'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}