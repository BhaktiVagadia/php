<?php
namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Admins;
use App\Config;
    class Admin extends \Core\Controller
    {
        public function loginAction(){
            if(isset($_POST["login"])){
                $_SESSION['user'] = $_POST['email'];
                header("Location:/MVCFRAMEWORK/public/admin/admin/dashboard");
            }
            View::renderTemplate('Admin/login.html');
        }
        public function dashboardAction(){
            if(Config::checkLogin()){
                View::renderTemplate('Admin/dashbord.html');
            }
            else{
                header("Location:/MVCFRAMEWORK/public/admin/admin/login"); 
            } 
        }
        public function logoutAction(){
            session_destroy();
            header("Location:/MVCFRAMEWORK/public/admin/admin/login");
        }   
    }
?>