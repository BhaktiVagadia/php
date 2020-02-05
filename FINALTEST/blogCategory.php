<?php
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:Login.php");
        exit();
    }
    require_once "connection.php";
?>
<html>
    <form method="POST">
        <input type='button' name="manageCategory" value='Manage Blog' onclick="window.location.replace('blogPost.php')">    
        <input type='submit' name="viewProfile" value='View Profile' >
        <input type='button' name="logOut" value='Log Out' onclick="window.location.replace('logout.php')">
        <br><br>
        <h3>Blog Category</h3>
        <input type="submit" name="addPostCategory" value="Add Post Category" onclick="window.location='addCategory.php'">
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
                echo '<td><img src="'.$row['image'].'" height="50px" width="50px"></td>';
                echo "<td>".$row['title']."</td>";
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
<?php
    if(isset($_POST['addPostCategory'])){
        unset($_SESSION['editId']);
        header("location:addCategory.php");
    }
    else if(isset($_POST['viewProfile'])){
        require_once "registerForm.php";
    }
    else if(isset($_GET['editbtn'])){
        $id = array_search('edit',$_GET['editbtn']);
        $_SESSION['editId'] = $id;
        header("location:addCategory.php");       
    }
    if(isset($_GET['deletebtn'])){
        $id = array_search('delete',$_GET['deletebtn']);
        deleteData('category',$id);
    } 
?>
</html>