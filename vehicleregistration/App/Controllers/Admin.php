<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Users;
use App\Models\Services;
class Admin extends \Core\Controller{
    public function indexAction(){
        $services = Users::fetchAll('serviceregistration');
        View::renderTemplate("adminDashboard.html",['services'=>$services]);
    }
    public function editServiceAction(){
        $id = $_GET['id'];
        $services = Users::displayService($id);
        View::renderTemplate("service.html",$services[0]);
        if(isset($_POST['submit'])){
            $data = Admin::serviceData($_POST);
            $service = Users::displayService($id);
            $userId = $service[0]['userId'];
            $checkNumber = Services::checkNumber($userId,$data['vehicleNo'],$data['licenceNo']);
            $checkTime = Services::checkTimeSlot($data['timeslot'],$data['date']);
            $timeCount = count($checkTime);
            if($checkNumber == []){
                if($timeCount < 3){
                    Users::editService($id,$data);
                }
                else{
                    echo "On that day 3 Slots Already Given";
                }
            }
            else{
                echo "Vehicle Number & Licence Number Already Exists !!";
            }
        }
    }
    public function serviceData($data){
        $serviceData = [];
        $serviceData['title'] = $data['title'];
        $serviceData['vehicleNo'] = $data['vehicleNo'];
        $serviceData['licenceNo'] = $data['licenceNo'];
        $serviceData['date'] = $data['date'];
        $serviceData['timeslot'] = $data['timeslot'];
        $serviceData['vehicleIssue'] = $data['vehicleIssue'];
        $serviceData['serviceCenter'] = $data['serviceCenter'];
        $serviceData['status'] = $data['status'];
        return $serviceData;
    }
}
?>