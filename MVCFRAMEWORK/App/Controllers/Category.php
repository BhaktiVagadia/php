<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
class Category extends \Core\Controller{
    public function viewAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $category = Categories::fetchAll();
        $data = Categories::displayData($temp);
        $catId = $data[0]['categoryId'];
        $products = Categories::displayProduct($catId);
        View::renderTemplate("header.html",['categories'=>$category]);
        View::renderTemplate("category.html",['category'=>$data[0],'products'=>$products]);
        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}
?>