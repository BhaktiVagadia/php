<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admins;
use App\Config;
class Product extends \Core\Controller{
    
    public function indexAction(){
        if(Config::checkLogin()){
            $products = Admins::displayData('products');
            View::renderTemplate('Admin/product.html',['products' => $products]);
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }        
    }
    public function addAction(){
        if(Config::checkLogin()){
            if(isset($_POST['submit'])){
                Admins::insertData($_POST,'products');             
                $proId = Admins::getProductId();
                $catId = $_POST['category'];
                foreach($catId as $key=>$value){
                    $data = [];
                    $data['productId'] = $proId[0]['productId'] ;
                    $data['categoryId'] = $catId[$key];
                    Admins::insertData($data,'products_category');
                }
                header("Location:/MVCFRAMEWORK/public/admin/product");
            }
            else{
                $categories = Admins::displayData('category');
                View::renderTemplate('Admin/addProduct.html',['categories'=>$categories]);
            } 
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }         
    }
    public function editAction($id){
        if(Config::checkLogin()){
                $data = Admins::getData('products',$id,'productId');
                $categories = Admins::displayData('category');
                $pro_cat = Admins::getData('products_category',$id,'productId');
                $category = [];
                foreach($pro_cat as $key=>$value){
                    array_push($category,$pro_cat[$key]['categoryId']);
                }
                View::renderTemplate('Admin/addProduct.html',['data'=>$data[0],'categories'=>$categories,'productCategory'=>$category]);
                if(isset($_POST['submit'])){
                     Admins::editData($_POST,'products','productId',$id);
                     Admins::deleteData('products_category',$id,'productId');
                     $catId = $_POST['category'];
                     foreach($catId as $key=>$value){
                         $data = [];
                         $data['productId'] = $id;
                         $data['categoryId'] = $catId[$key];
                         Admins::insertData($data,'products_category');
                     }           
                     header("Location:/MVCFRAMEWORK/public/admin/product");
                }              
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }        
    }
    public function deleteAction($id){
        if(Config::checkLogin()){
                Admins::deletedata('products',$id,'productId');
                header("Location:/MVCFRAMEWORK/public/admin/product");
        }
        else{
            header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
        }
    }
}