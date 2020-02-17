<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
class CmsPage extends \Core\Controller{
    public function viewAction(){
        $url = $_SERVER['QUERY_STRING'];
        $temp = substr($url,strripos($url,"/")+1);
        $category = Categories::fetchAll();
        $data = CmsPages::displayData($temp);
        View::renderTemplate("header.html",['categories'=>$category]);
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
        $data = CmsPages::displayData('home'); 
        View::renderTemplate("header.html",['categories'=>$category]);
        View::renderTemplate("cmsPage.html",$data[0]); 
        $cmsPage = CmsPages::fetchAll();           
        View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
    }
}