<?php
    function connection(){
        $servername = "localhost";
        $username = "bhakti";
        $password = "1234";
        $dbname="evaluationtest2";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        return $conn;
    }
    function imageUpload(){
        $name = $_FILES['image']['name'];
        $extension = strtolower(substr($name,strpos($name,'.')+1));
        $type = $_FILES['image']['type'];
        $temp_name = $_FILES['image']['tmp_name'];
        $location = 'uploads/';
        $image = $location.$name;
        if(isset($name) ){
            if( ($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') && $type == 'image/jpeg'){
                if(move_uploaded_file($temp_name , $location.$name)){
                        echo "<br>Image Uploaded";
                        return $image;
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
    function insert($data,$table){
        $conn = connection();
        $columns = implode(',', array_keys($data));
        $values = implode("','",array_values($data));
        $insertQuery = "INSERT INTO $table ($columns) VALUES ('$values')";
        if(mysqli_query($conn,$insertQuery)){
            echo "Data insert in table";
        }
        else{
            echo "Error : ". mysqli_error($conn);
        }
    }
    function update($data,$table,$id){
        $userid = $_SESSION['userid'];
        $temp = "";
        foreach($data as $key=>$value){
            $temp .=$key."='".$value."',";
        }
        $updatedata = substr($temp,0,strlen($temp)-1);
        $conn = connection();
        if($table == 'blog_post'){
             $updateQuery = "UPDATE $table SET $updatedata where postId ='$id' and userId = '$userid'";
        }
        else if( ( $table == 'category') ){
            $updateQuery = "UPDATE $table SET $updatedata where categoryId ='$id' and userId = '$userid'";
        }
        if(mysqli_query($GLOBALS['conn'],$updateQuery)){
            echo "<br>Data update in table";
        }
        else{
            echo "<br>Error into upadate : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function deleteData($table,$id){
        $userid = $_SESSION['userid'];
        $conn = connection();
        if($table == 'category'){
            $deleteQuery = "DELETE FROM $table where categoryId = '$id' and userId = '$userid'";
        }
        else if($table == 'blog_post'){
            $deleteQuery = "DELETE FROM $table where postId = '$id' and userId = '$userid'";
        }
        if(mysqli_query($conn,$deleteQuery)){
            echo "<br>Data delete from ".$table;
        }
        else{
            echo "<br>Error into delete : ". mysqli_error($conn);
        }
    }
    function getValue($fieldName,$table){
       
        $conn = connection();
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email']; 
            $userid = $_SESSION['userid'];         
            if($table == 'user'){
                $selectquery = "SELECT $fieldName from $table where email = '$email' and userId = '$userid' " ; 
            }
            else if( isset($_SESSION['editId']) && ( $table == 'category')){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where categoryId = '$id' and userId = '$userid' " ;
            }
            else if( isset($_SESSION['editId']) && ( $table == 'parentcategory')){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where parentCategoryId = '$id' and userId = '$userid' " ;
            }
            else if( isset($_SESSION['editId']) && ($table == 'blog_post') ){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where postId = '$id' and userId = '$userid' " ;
            }
            if(isset($selectquery)){
                $result =mysqli_query($conn,$selectquery);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        return $row[$fieldName];
                    }
                }
            }
            unset($_SESSION['editId']);   
        }   
         
    }
    function displayBlogPost(){
        $userid = $_SESSION['userid'];
        $conn = connection();
        $selectQuery = "SELECT * from blog_post where userId = '$userid'";
        $result = mysqli_query($conn,$selectQuery);
        return $result;
    }
    function displayCategory(){
        $userid = $_SESSION['userid'];
        $conn = connection();
        $selectQuery = "SELECT * from category where userId = '$userid'";
         $result = mysqli_query($conn,$selectQuery);
         return $result;
    }
    function blogPostData(){
        $image = imageUpload();

        $email = $_SESSION['email'];
         $query = "SELECT userId from user where email = '$email'";
         $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
         $userid = $row['userId'];
         $data = [];

         $data['userId'] = $userid;
         $data['title'] = $_POST['title'];
         $data['url'] = $_POST['url'];
         $data['content'] = $_POST['content'];
         $data['category'] = implode(',',$_POST['category']);
         $data['image'] = $image;
         $data['publishedAt'] = $_POST['publishedAt'];
         $data['updatedAt'] = 0;

         return $data[];
    }
    function post_categoryData(){
        $conn = connection();
            $data1 = [] ;
            $query = "SELECT MAX(postId) from blog_post";
            $row = mysqli_fetch_assoc(mysqli_query($conn , $query));
            $data1['postId'] = $row['MAX(postId)'];
            $category = $_POST['category'];
            foreach($category as $value){
                $query1 = "SELECT categoryId from category where title = '$value'";
                $row2 = mysqli_fetch_assoc(mysqli_query($conn , $query1));
                $data1['categoryId'] = $row2['categoryId'];   
        return $data1[];
    }
    function categoryData(){
        $image = imageUpload();
        $email = $_SESSION['email'];
        $conn = connection();
        $query = "SELECT userId from user where email = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
        $userid = $row['userId'];
        $data = [];
        $data['userId'] = $userid;
        $data['title'] = $_POST['title'];
        $data['metaTitle'] = $_POST['metaTitle'];
        $data['url'] = $_POST['url'];
        $data['content'] = $_POST['content'];
        $data['image'] = $image;
        $parentCategory = $_POST['ParentCategory'];
        $query1 = "SELECT parentCategoryId from parentcategory where ParentCategoryName = '$parentCategory'";
        $row1 = mysqli_fetch_assoc(mysqli_query($conn,$query1));
        $data['parentCategoryId'] = $row1['parentCategoryId'];
    }
?>