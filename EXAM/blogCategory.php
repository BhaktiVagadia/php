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
        <input type='submit' name="manageCategory" value='Manage Category'>    
        <input type='button' name="viewProfile" value='View Profile' onclick="window.location='registerForm.php'" >
        <input type='submit' name="logOut" value='Log Out'>
        <br><br>
        <h3>Blog Post</h3>
        <input type="button" name="addPostCategory" value="Add Post Category" onclick="window.location='addCategory.php'">
    </form>
    <table border='1px solid black'>
        <th>Category Id</th>
        <th>Category Image</th>
        <th>Category Name</th>
        <th>Created Date</th>
        <th>Action</th>
        <?php 
            $result = displayCategory();
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['categoryId']."</td>";
                echo "<td>"."</td>";
                echo "<td>"."</td>";
                echo "<td>".$row['createdAt']."</td>";
                $btnid = $row['categoryId'];
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
         $selectQuery = "SELECT * from category";
         $result = mysqli_query($conn,$selectQuery);
         return $result;
    }
?>