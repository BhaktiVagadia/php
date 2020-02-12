<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Post;
    class Posts extends \Core\Controller
    {
        public function indexAction(){
            $posts = Post::getAll();
            View::renderTemplate('Posts/index.html',['posts'=>$posts]);
        }
        public function insertAction(){
            if(isset($_POST['submit'])){
                Post::insertData($_POST);
                header("Location:/MVCFRAMEWORK/public/posts/index");
            }
            else{
                View::renderTemplate('Posts/insert.html');
            }
           
        }
        public function deleteAction(){
            if(isset($_GET['id'])){
                Post::deletedata($_GET['id']);
                header("Location:/MVCFRAMEWORK/public/posts/index");
            }
        }
        public function editAction(){
            if(isset($_GET['id'])){
                echo "edit";
            } 
        }
    }
?>