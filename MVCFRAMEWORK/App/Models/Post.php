<?php
namespace App\Models;
use PDO;
?>
<?php
class Post extends \Core\Model
{
     public static function getAll(){
          try{
               $db = static::getDB();
               $stmt = $db->query("SELECT * FROM posts");
               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
               return $result;
          }
          catch(PDOException $e){
               echo $e->getMessage();
          }
     } 
     public static function insertData($data){
          $title = $data['title'];
          $content = $data['content'];
          try{
               $db = static::getDB();
               $query="INSERT INTO posts (title,content) Values ('$title','$content')";
               $db->exec($query);
          }
          catch(PDOException $e){
               echo $e->getMessage();
          }
     }
     public static function editData($data){
          $title = $data['title'];
          $content = $data['content'];
          $id = $_GET['id'];
          try{
               $db = static::getDB();
               $query = "UPDATE posts SET title='$title',content='$content' where id='$id'";
               $db->exec($query);
          }
          catch(PDOException $e){
               echo $e->getMessage();
          }
     }
     public static function deleteData($id){
          try{
               $db = static::getDB();
               $query="DELETE FROM posts where id = '$id'";
               $db->exec($query);
          } 
          catch(PDOException $e){
               echo $e->getMessage();
          }
     }
     public static function getData($id){
          try{
               $db = static::getDB();
               $stmt = $db->query("SELECT title,content FROM posts where id = '$id' ");
               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
               return $result;
          }
          catch(PDOException $e){
               echo $e->getMessage();
          }
     }
}
?>
