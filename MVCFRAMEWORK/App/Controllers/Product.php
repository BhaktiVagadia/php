<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Products;
use App\Models\Categories;
use App\Models\CmsPages;
class Product extends \Core\Controller{
    public function viewAction($id){
        $parents = Categories::fetchAll('parentcategory');
        $category = Categories::fetchAll('category');
        View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);

        $data = Products::displayData($id);
        View::renderTemplate("product.html",$data[0]);

        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}
?>