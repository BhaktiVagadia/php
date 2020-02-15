<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Products;
class Product extends \Core\Controller{
    public function viewAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $data = Products::displayData($temp);
        View::renderTemplate("product.html",$data[0]);
    }
}
?>