<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admins;
class Category extends \Core\Controller{

    public function indexAction(){
        $categories = Admins::displayData('category');
        View::renderTemplate('Admin/category.html',['categories' => $categories]);
    }
    public function addAction(){
        if(isset($_POST['submit'])){
            Admins::insertData($_POST,'category');
            header("Location:/MVCFRAMEWORK/public/admin/category");
        }
        else{
            $parents = Admins::displayData('parentcategory');
            View::renderTemplate('Admin/addCategory.html',['parents'=>$parents]);
        }          
    }
    public function editAction(){
        if(isset($_GET['id'])){
            $data = Admins::getData('category',$_GET['id'],'categoryId');
            $parents = Admins::displayData('parentcategory');
            View::renderTemplate('Admin/addCategory.html',['data' => $data[0],'parents'=>$parents]);
            if(isset($_POST['submit'])){
                 Admins::editData($_POST,'category','categoryId');
                 header("Location:/MVCFRAMEWORK/public/admin/category");
            }              
         } 
    }
    public function deleteAction(){
        if(isset($_GET['id'])){
            Admins::deletedata('category',$_GET['id'],'categoryId');
            header("Location:/MVCFRAMEWORK/public/admin/category");
        }
    }
}