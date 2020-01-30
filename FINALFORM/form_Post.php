<?php
    require_once "formConnection.php" ;
    function filterData($section){
        $error = [];
        foreach($_POST[$section] as $key=>$value){
            if(!validation($section,$key)){
                echo "<br>Enter Valid Value for ".$key;
                array_push($error, $key);
            }
        }
        if(empty($error)){         
            if($section == 'account'){
                $table = 'customers';
                $data = [];
                foreach($_POST[$section] as $key => $value ){
                    switch($key){
                        case 'prefix':
                            $data[$key] = $value;
                            break;
                        case 'firstName':
                            $data[$key] = $value;
                            break;
                        case 'lastName':
                            $data[$key] = $value;
                            break;
                        case 'dob':
                            $data[$key] = $value;
                            break;
                        case 'phoneNo':
                            $data[$key] = $value;
                            break;
                        case 'email':
                            $data[$key] = $value;
                            break;
                        case 'password':
                            $data[$key] = $value;
                            break;
                    }
                }                
                insert($table,$data);
            }
            else if($section == 'address'){
                $table = 'customer_address';
                $data = [];
                $id = lastId();
                $userid = $id['MAX(id)'];
                $data['id'] = $userid;
                foreach($_POST[$section] as $key => $value ){
                    switch($key){
                        case 'addressline1':
                            $data[$key] = $value;
                            break;
                        case 'addressline2':
                            $data[$key] = $value;
                            break;
                        case 'company':
                            $data[$key] = $value;
                            break;
                        case 'city':
                            $data[$key] = $value;
                            break;
                        case 'state':
                            $data[$key] = $value;
                            break;
                        case 'country':
                            $data[$key] = $value;
                            break;
                        case 'postalcode':
                            $data[$key] = $value;
                            break;
                    }
                }
                insert($table,$data);
            }
            else if($section == 'other'){
                $table = 'customer_additional_info';
               
                $id = lastId();
                $userid = $id['MAX(id)'];
               
                foreach($_POST[$section] as $key => $value ){
                    $data = [];
                    $data['id'] = $userid;
                    if(is_array($value)){
                        $data['id'] = $userid;
                        $data['fieldKey'] = $key;
                        $data['fieldValue'] = implode(",",$value);
                        insert($table,$data);
                    }
                    else{
                        $data['id'] = $userid;
                        $data['fieldKey'] = $key;
                        $data['fieldValue'] = $value;
                        insert($table,$data);
                    }
                }
            }
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
    if(isset($_POST['submit'])){
        if(isset($_POST['account'])){
            filterData("account");
        }  
         if(isset($_POST['address'])){   
            filterData("address");
         }
         if(isset($_POST['other'])){
            filterData("other");
         }
    }
    
?>