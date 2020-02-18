<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Categories;
use App\Models\CmsPages;
    class Home extends \Core\Controller
    {
        protected function before(){
        }
        protected function after(){
        }
        public function indexAction(){
            $parents = Categories::fetchParents();
            $category = Categories::fetchAll('category');
            View::renderTemplate("header.html",['parents'=>$parents,'categories'=>$category]);

            $data = CmsPages::displayData('home');
            View::renderTemplate("cmsPage.html",$data[0]);

            $cmsPage = CmsPages::fetchAll();           
            View::renderTemplate("footer.html",['cmspages'=>$cmsPage]);
        }
    }
?>