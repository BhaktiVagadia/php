<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Post;
    class Posts extends \Core\Controller
    {
        public function indexAction(){
            $posts = Post::getAll();
            View::renderTemplate('Posts/index.html',['posts'=>$posts]);
            
            //echo "<br>Hello from the index action in the Post Controller";
           // echo "<p>Query String Parameters : <pre>". htmlspecialchars(print_r($_GET,true))."</pre></p>";
        }
        public function addNew(){
            echo "<br>Hello from the addNew action in the Post Controller";
        }
        public function edit(){
            echo "<br>Hello from the Edit action in the Post Controller";
            echo "<p>Route Parameters : <pre>". htmlspecialchars(print_r($this->route_params,true))."</pre></p>";
        }
    }
?>