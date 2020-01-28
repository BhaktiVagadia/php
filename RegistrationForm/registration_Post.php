<?php
    session_start();
    
    function getvalue($section, $fieldname, $returnType=""){
        return isset($_POST[$section][$fieldname]) ? $_POST[$section][$fieldname] : getSessionValue($section,$fieldname,$returnType);
    }
    function setSessionValue($section){
        $error = [];
        foreach($_POST[$section] as $key=>$value){
            if(!validation($section,$key)){
                echo "<br>Enter Valid Value for ".$key;
                array_push($error, $key);
            }
        }
        if(empty($error)){
            return isset($_POST[$section]) ? ($_SESSION[$section] = $_POST[$section]) : [];
        }
       
    }
    function getSessionValue($section,$fieldname,$returnType){
       return isset($_SESSION[$section][$fieldname]) ? $_SESSION[$section][$fieldname] :$returnType ; 
    }
    function imageUpload(){
            $name = $_FILES['profileImage']['name'];
            $extension = strtolower(substr($name,strpos($name,'.')+1));
            $type = $_FILES['profileImage']['type'];
            $temp_name = $_FILES['profileImage']['tmp_name'];
            $location = 'C:/xampp/htdocs/cybercom/php/uploads/';
            if(isset($name) ){
                if( ($extension == 'jpeg' || $extension == 'jpg') && $type == 'image/jpeg'){
                    if(move_uploaded_file($temp_name , $location.$name)){
                            echo "<br>Image Uploaded";
                    } 
                    else{
                        echo "<br>error occured to upload Image";
                    }
                }
                else{
                    echo "<br image should be jpeg file Only";
                }
            }
            else{
                echo "<br>Please choose image";
            }         
    }
    function certificateUpload(){
            $name = $_FILES['certificate']['name'];
            $extension = strtolower(substr($name,strpos($name,'.')+1));
            $type = $_FILES['certificate']['type'];
            $temp_name = $_FILES['certificate']['tmp_name'];
            $location = 'C:/xampp/htdocs/cybercom/php/uploads/';
            if(isset($name) ){
                if($extension == 'pdf' && $type == 'application/pdf'){
                    if(move_uploaded_file($temp_name , $location.$name)){
                            echo "<br>Crtificate Uploaded";
                    } 
                    else{
                        echo "<br>error occured to upload certificate";
                    }
                }
                else{
                    echo "<br certificate should be PDF file Only";
                }
            }
            else{
                echo "<br>Please choose certificate";
            }         
    }


    function validation($section,$fieldname){
        switch($fieldname){
            case 'firstName':
            case 'lastName':
                if(!(preg_match("/^[a-z A-Z ]+$/",$_POST[$section][$fieldname]))){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'password':
                if($_POST[$section]['password'] != $_POST[$section]['confirmPassword']){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'phoneNo':
                if(!(preg_match("/^\d{10}$/",$_POST[$section][$fieldname]))){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'postalCode':
                if(!(preg_match("/^\d{6}$/",$_POST[$section][$fieldname]))){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'getTouch':
                if($_POST[$section][$fieldname] == ""){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'country':
                if($_POST[$section][$fieldname] == "select Country"){
                    return false;
                }
                else{
                    return true;
                }
            break;
            case 'profileImage':
                echo "true";
            case 'certificate':
                echo "true";
                /*if(certificateUpload()){
                    echo "file upload";
                    return true;
                }
                else{
                    echo "file not upload";
                   return false;
                }*/
            default :
                return true;
        break;

        }
    }
    
if(isset($_POST['account'])){
    setSessionValue("account");
}  
if(isset($_POST['address'])){   
setSessionValue("address");
}
if(isset($_POST['other'])){
setSessionValue("other");
}
 if(isset($_POST['other'])){
     imageUpload();
     certificateUpload();
 } 
    
   
   
?>