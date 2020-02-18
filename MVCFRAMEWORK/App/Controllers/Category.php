<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
class Category extends \Core\Controller{
    public function viewAction($id){
        $parents = Categories::fetchAll('parentcategory');
        $category = Categories::fetchAll('category');
        View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);
    
        $data = Categories::displayData($id);
        $catId = $data[0]['categoryId'];
        $products = Categories::displayProduct($catId);
        View::renderTemplate("category.html",['category'=>$data[0],'products'=>$products]);

        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}
?>