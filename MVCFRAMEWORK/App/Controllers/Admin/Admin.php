<?php
namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Admins;
    class Admin extends \Core\Controller
    {
        public function loginAction(){
            if(isset($_POST["login"])){
                header("Location:/MVCFRAMEWORK/public/admin/admin/dashboard");
            }
            View::renderTemplate('Admin/login.html');
        }
        public function dashboardAction(){
            View::renderTemplate('Admin/dashbord.html');
        }   
    }
?>