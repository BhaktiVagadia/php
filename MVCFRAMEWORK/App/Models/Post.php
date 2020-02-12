<?php
namespace App\Models;
use PDO;
?>
<?php
class Post extends \Core\Model
{
     public function getAll(){
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
     public function insertData($data){
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
     public function deleteData($id){
          try{
               $db = static::getDB();
               $query="DELETE FROM posts where id = '$id'";
               $db->exec($query);
          } 
          catch(PDOException $e){
               echo $e->getMessage();
          }
     }
}

?>
