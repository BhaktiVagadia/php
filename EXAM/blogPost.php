<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
    header("location:Login.php");
    exit();
    }
?>
<html>
    <form method="POST">
        <input type='button' name="manageCategory" value='Manage Category'>
        <input type='submit' name="viewProfile" value='View Profile' >
        <input type='button' name="logOut" value='Log Out'>
        <br><br>
        <h3>Blog Post</h3>
        <input type="button" name="addBlogPost" value="Add BlogPost" onclick="window.location='addBlogPost.php'">
    </form>
    <table border='1px solid black'>
        <th>Post Id</th>
        <th>Category Name</th>
        <th>Title</th>
        <th>Published Date</th>
        <th>Action</th>
        <?php 
            $result = displayCategory();
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['postId']."</td>";
                echo "<td></td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['publishedAt']."</td>";
                $btnid = $row['postId'];
                echo "<td><form method='GET'>
                <input type='submit' name='editbtn[$btnid]' value='edit'>
                <input type='submit' name='deletebtn[$btnid]' value='delete'>
                </form></td>";
                echo "</tr>";
            }
        ?>
    </table>
</html>
<?php
    if(isset($_POST['viewProfile'])){
        require_once "registerForm1.php";
    }
    
    function displayCategory(){
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
         $selectQuery = "SELECT * from blog_post";
         $result = mysqli_query($conn,$selectQuery);
         return $result;
    }

?>