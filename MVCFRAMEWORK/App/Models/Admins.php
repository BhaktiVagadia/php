<?php
namespace App\Models;
use PDO;
class Admins extends \Core\Model {
       public static function insertData($data,$table){
            $tableData = Admins::filterData($data,$table);
            print_r($tableData);
            $field = implode(",",array_keys($tableData));
            $values = implode("','",array_values($tableData));
            try{
                $db = static::getDB();
                $query = "INSERT INTO $table ($field) VALUES ('$values')";
                $db->exec($query);

            }
            catch(PDOException $e){
                echo $e->getMessage();
           }
       }
       public static function displayData($table){
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
       public static function deleteData($table,$id,$condition){
            try{
                $db = static::getDB();
                $query = "DELETE FROM $table where $condition=$id";
                $db->exec($query);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            } 
       }
       public static function editData($data,$table,$condition){
            $tableData = Admins::filterData($data,$table);
            $temp = "";
            foreach($tableData as $field=>$value){
                $temp.=$field."='".$value."',";
            }
            $updateData = substr($temp,0,strlen($temp)-1);
            try{
                $db = static::getDB();
                $query = "UPDATE $table SET $updateData where $condition ='".$_GET['id']."'";
                $db->exec($query);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
       }
       public static function editProCat($catId,$proId){
            try{
                $db = static::getDB();
                $query = "UPDATE products_category SET categoryId='$catId' where productId='$proId'";
                $db->exec($query);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            } 
       }
       public static function getProductId(){
            try{
                $db = static::getDB();
                $stmt = $db->query("SELECT MAX(productId) as productId FROM products");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;               
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
       }
       public static function getCategoryId($category){
        try{
            $db = static::getDB();
            $stmt = $db->query("SELECT categoryId FROM category where CategoryName='$category'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;               
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
       }
       public static function getData($table,$id,$condition){
            try{
                $db = static::getDB();
                $stmt = $db->query("SELECT * FROM $table where $condition = '$id'");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;               
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
       }
       public static function filterData($data,$table){
            if($table == 'products'){
                $tableData = [];
                $tableData['producName'] = $data['name'];
                $tableData['sku'] = $data['sku'];
                $tableData['urlKey'] = $data['url'];
                $tableData['image'] = $data['image'];
                $tableData['status'] = $data['status'];
                $tableData['description'] = $data['description'];
                $tableData['shortDescription'] = $data['shortDes'];
                $tableData['price'] = $data['price'];
                $tableData['stock'] = $data['stock'];
                $tableData['createdAt'] = date("d-m-Y"); 
            }
            else if($table == 'category'){
                $tableData = [];
                $tableData['CategoryName'] = $data['name'];
                $tableData['urlKey'] = $data['url'];
                $tableData['image'] = $data['image'];
                $tableData['status'] = $data['status'];
                $tableData['description'] = $data['description'];
                $tableData['parentCategory'] = $data['parentCategory'];
                $tableData['createdAt'] = date("d-m-Y");
            }
            else if($table == "products_category"){
                $tableData = [];
                $tableData['productId'] = $data['productId'];
                $tableData['categoryId'] = $data['categoryId'];
            }
            else if($table == 'cms_page'){
                $tableData = [];
                $tableData['pageTitle'] = $data['title'];
                $tableData['urlKey'] = $data['urlKey'];
                $tableData['status'] = $data['status'];
                $tableData['content'] = $data['content'];
                $tableData['createdAt'] = date("d-m-Y");
            }
            return $tableData;
       }
}
?>