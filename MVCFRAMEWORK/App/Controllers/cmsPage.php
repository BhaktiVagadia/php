<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
class CmsPage extends \Core\Controller{
    public function viewAction(){
        $parents = Categories::fetchParents();
        $category = Categories::fetchAll();
        View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);

        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);     
        $data = CmsPages::displayData($temp);
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
        $category = Categories::fetchAll();        
        View::renderTemplate("header.html",['categories'=>$category]);

        $data = CmsPages::displayData('home');
        View::renderTemplate("cmsPage.html",$data[0]);

        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}