<?php
namespace App\Controllers\Admin\Cms;
use \Core\View;
use App\Models\Admins;
use App\Config;
class CmsPage extends \Core\Controller{
    public function indexaction(){
        if(Config::checkLogin()){
            $pages= Admins::displayData('cms_page');
            View::renderTemplate('Admin/cmsPage.html',['pages'=>$pages]);
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }     
    }
    public function addAction(){
        if(Config::checkLogin()){
            if(isset($_POST['submit'])){
                Admins::insertData($_POST,'cms_page');
                header("Location:/MVCFRAMEWORK/public/admin/cms/cmsPage");
            }
            else{
                View::renderTemplate('Admin/addCmsPage.html');
            }
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }       
    }
    public function editAction($id){
        if(Config::checkLogin()){
                $data = Admins::getData('cms_page',$id,'id');
                View::renderTemplate('Admin/addCmsPage.html',['data' => $data[0]]);
                if(isset($_POST['submit'])){
                     Admins::editData($_POST,'cms_page','id',$id);
                     header("Location:/MVCFRAMEWORK/public/admin/cms/cmsPage");
                }              
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }    
    }
    public function deleteAction($id){
        if(Config::checkLogin()){
            if(isset($_GET['id'])){
                Admins::deletedata('cms_page',$id,'id');
                header("Location:/MVCFRAMEWORK/public/admin/cms/cmsPage");
            }
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }      
    }
}
?>