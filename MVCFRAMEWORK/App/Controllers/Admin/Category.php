<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admins;
use App\Config;
class Category extends \Core\Controller{
    public function indexAction(){
        if(Config::checkLogin()){
            $categories = Admins::displayData('category');
            View::renderTemplate('Admin/category.html',['categories' => $categories]);
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }     
    }
    public function addAction(){
        if(Config::checkLogin()){
            if(isset($_POST['submit'])){
                Admins::insertData($_POST,'category');
                header("Location:/MVCFRAMEWORK/public/admin/category");
            }
            else{
                $parents = Admins::displayData('parentcategory');
                View::renderTemplate('Admin/addCategory.html',['parents'=>$parents]);
            }  
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        } 
               
    }
    public function editAction($id){
        if(Config::checkLogin()){
                $data = Admins::getData('category',$id,'categoryId');
                $parents = Admins::displayData('parentcategory');
                View::renderTemplate('Admin/addCategory.html',['data' => $data[0],'parents'=>$parents]);
                if(isset($_POST['submit'])){
                     Admins::editData($_POST,'category','categoryId',$id);
                     header("Location:/MVCFRAMEWORK/public/admin/category");
                }              
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }
        
    }
    public function deleteAction($id){
        if(Config::checkLogin()){
                Admins::deletedata('category',$id,'categoryId');
                header("Location:/MVCFRAMEWORK/public/admin/category");
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }
        
    }
}