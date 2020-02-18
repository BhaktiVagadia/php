<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Products;
use App\Models\Categories;
use App\Models\CmsPages;
class Product extends \Core\Controller{
    public function viewAction(){
        $parents = Categories::fetchParents();
        $category = Categories::fetchAll();
        View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);

        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $data = Products::displayData($temp);
        View::renderTemplate("product.html",$data[0]);

        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}
?>