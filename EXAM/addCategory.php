<?php
    session_start();
    
    if(!isset($_SESSION['email']))
    {
    header("location:Login.php");
    exit();
    }
?>
<html>
     <h3>Add Category</h3>
    <form method='post'>
        Title <input type="text" name='title'><br><br>
        Content <textarea name='content' cols='30' rows='3'></textarea><br><br> 
        URL <input type='text' name='url'><br><br>
        Meta Title <input type='text' name='metaTitle'><br><br>
        Parent Category <select></select><br><br>
        Image <input type='file' name='image' value='Upload Image'><br><br>
        <input type='submit' name='submit'>
    </form>
</html>
<?php
    $servername = "localhost";
    $username = "bhakti";
    $password = "1234";
    $dbname="evaluationtest2";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Error in Connection : ". mysqli_connect_error());
    }
    else{
        echo "connection Sucessfully";
    }
    if(isset($_POST['submit'])){
        $email = $_SESSION['email'];
        $query = "SELECT userId from user where email = '$email'";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
        $userid = $row['userId'];
        $data = [];
        $data['userId'] = $userid;
        $data['title'] = $_POST['title'];
        $data['metaTitle'] = $_POST['metaTitle'];
        $data['url'] = $_POST['url'];
        $data['content'] = $_POST['content'];
        $data['createdAt'] = time();
        $data['updatedAt'] = 0;

        $columns = implode(',', array_keys($data));
        $values = implode("','",array_values($data));

        $insertQuery = "INSERT INTO category ($columns) VALUES ('$values')";
        if(mysqli_query($conn,$insertQuery)){
            echo "<br>Data insert in table";
        }
        else{
            echo "<br>Error : ". mysqli_error($conn);
        }
    }
    function displayCategory(){
        $id = $GLOBALS['userid'];
        $query = "SELECT * FROM category where userId = 'id'";
        echo $query;
    }
    
?>