<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admins;
class cmsPage extends \Core\Controller{
    public function indexaction(){
        $pages= Admins::displayData('cms_page');
        View::renderTemplate('Admin/cmsPage.html',['pages'=>$pages]);
    }
    public function addAction(){
        if(isset($_POST['submit'])){
            Admins::insertData($_POST,'cms_page');
            header("Location:/MVCFRAMEWORK/public/add/cmsPage");
        }
        else{
            View::renderTemplate('Admin/addCmsPage.html');
        }
    }
    public function editAction(){
        if(isset($_GET['id'])){
            $data = Admins::getData('cms_page',$_GET['id'],'id');
            View::renderTemplate('Admin/addCmsPage.html',['data' => $data[0]]);
            if(isset($_POST['submit'])){
                 Admins::editData($_POST,'cms_page','id');
                 header("Location:/MVCFRAMEWORK/public/admin/cmsPage");
            }              
        }  
    }
    public function deleteAction(){
        if(isset($_GET['id'])){
            Admins::deletedata('cms_page',$_GET['id'],'id');
            header("Location:/MVCFRAMEWORK/public/admin/cmsPage");
        }
    }
}
?>