<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
class CmsPage extends \Core\Controller{
    public function viewAction($id){
        $parents = Categories::fetchAll('parentcategory');
        $category = Categories::fetchAll('category');
        View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);
     
        $data = CmsPages::displayData($id);
        if($data != []){
            View::renderTemplate("cmsPage.html",$data[0]);
        }
        else{
            throw new \Exception("No Page Found",404);
        }  
        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
    public function homeAction(){
        $category = Categories::fetchAll('category');        
        View::renderTemplate("header.html",['categories'=>$category]);

        $data = CmsPages::displayData('home');
        View::renderTemplate("cmsPage.html",$data[0]);

        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}