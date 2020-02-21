<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Users;
use App\Models\Services;
class Service extends \Core\Controller{
    public function indexAction(){
        $services = Users::displayData();
        View::renderTemplate("dashboard.html",['services'=>$services]);
    }
    public function registrationAction(){ 
        if(isset($_POST['submit'])){
            $serviceData = Service::serviceData($_POST);
            $checkNumber = Services::checkNumber($serviceData['userId'],$serviceData['vehicleNo'],$serviceData['licenceNo']);
            $checkTime = Services::checkTimeSlot($serviceData['timeslot'],$serviceData['date']);
            $timeCount = count($checkTime);
            if($checkNumber == []){
                if($timeCount < 3){
                    $serviceId = Users::insert($serviceData,'serviceregistration');
                   header("Location:/vehicleregistration/public/User/viewService");
                }
                else{
                    echo "On that day 3 Slots Already Given";
                    View::renderTemplate('service.html');
                    //header("location:/vehicleregistration/public/Service/registration")
                }
            }
            else{
                echo "Vehicle Number & Licence Number are Used by Other Users !!";
            }
            
        }
        else{
            View::renderTemplate("service.html");
        }
    }
    public function serviceData($data){
        $serviceData = [];
        $serviceData['userId'] = $_SESSION['userId'];
        $serviceData['title'] = $data['title'];
        $serviceData['vehicleNo'] = $data['vehicleNo'];
        $serviceData['licenceNo'] = $data['licenceNo'];
        $serviceData['date'] = $data['date'];
        $serviceData['timeslot'] = $data['timeslot'];
        $serviceData['vehicleIssue'] = $data['vehicleIssue'];
        $serviceData['serviceCenter'] = $data['serviceCenter'];
        $serviceData['status'] = "pending";
        return $serviceData;
    }
}
?>