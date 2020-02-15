<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
class Category extends \Core\Controller{
    public function viewAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $data = Categories::displayData($temp);
        echo "<h2>Category</h2>";
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $catId = $data[0]['categoryId'];
        $products = Categories::displayProduct($catId);
        echo "<h3>Products</h3>";
        echo "<pre>";
        print_r($products);
        echo "</pre>";
    }
}
?>