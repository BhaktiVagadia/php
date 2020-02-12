<?php
namespace App\Models;
use PDO;
class Post extends \Core\Model
{
   public function getAll(){
     //   $host = "localhost";
     //   $dbname = "mvc";
     //   $username = "bhakti";
     //   $password = "1234";
       try{
            //$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM posts ORDER BY created_at");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
       }
       catch(PDOException $e){
            echo $e->getMessage();
       }
   } 
}

?>