<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Users;
class User extends \Core\Controller{
    public function indexAction(){
        View::renderTemplate("Home.html");
    }
    public function loginAction(){
        View::renderTemplate("login.html");
        if(isset($_POST['submit'])){
            $flag = 0;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $users = Users::fetchAll('users');
            foreach($users as $key=>$value){
                if($users[$key]['email'] == $email && $users[$key]['password'] == $password){
                    $flag = 1;
                    $_SESSION['userId'] = $users[$key]['userId'];
                    break;
                }
            }
            if($flag == 1){
                header("Location:/vehicleregistration/public/Service");
            }
            else{
                echo "<b>Enter Valid userName & Password</b>";
            } 
        }
    }
    public function registerAction(){
        View::renderTemplate("register.html");
        if(isset($_POST['submit'])){
            $userData = User::userData($_POST);
            $userId = Users::insert($userData,'users');
            $addressData = User::addressData($_POST,$userId);
            $addressId = Users::insert($addressData,'useraddress');
            header("Location:/vehicleregistration/public/User/login"); 
        }       
    }
    public function viewServiceAction(){
        $services = Users::displayData();
        View::renderTemplate("dashboard.html",['services'=>$services]);
    }
    public function userData($data){
        $user = [];
        $user['firstName'] = $data['firstName'];
        $user['lastName'] = $data['lastName'];
        $user['email'] = $data['email'];
        $user['password'] = $data['password'];
        $user['phoneNo'] = $data['phoneNo'];
        return $user;
    }
    public function addressData($data,$userId){
        $address = [];
        $address['userId'] = $userId;
        $address['street'] = $data['street'];
        $address['city'] = $data['city'];
        $address['state'] = $data['state'];
        $address['zipcode'] = $data['zipcode'];
        $address['country'] = $data['country'];
        return $address;
    }
    
}
?>