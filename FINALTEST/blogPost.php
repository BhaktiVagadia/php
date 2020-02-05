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
    <form method="POST" enctype="multipart/form-data">
        <input type='button' name="manageCategory" value='Manage Category' onclick="window.location.replace('blogCategory.php')">
        <input type='submit' name="viewProfile" value='View Profile' >
        <input type='button' name="logOut" value='Log Out' onclick="window.location.replace('logout.php')">
        <br><br>
        <h3>Blog Post</h3>
        <input type="submit" name="addBlogPost" value="Add BlogPost">
    </form>
    <table border='1px solid black'>
        <th>Post Id</th>
        <th>Category Name</th>
        <th>Title</th>
        <th>Published Date</th>
        <th>Action</th>
        <?php 
            $result = displayBlogPost();
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['postId']."</td>";
                echo "<td>".$row['category']."</td>";
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
<?php
    if(isset($_POST['addBlogPost'])){
        unset($_SESSION['editId']);
        header("location:addBlogPost.php");
    }
    else if(isset($_POST['viewProfile'])){
        require_once "registerForm.php";
    }
    else if(isset($_GET['editbtn'])){
        $id = array_search('edit',$_GET['editbtn']);       
        $_SESSION['editId'] = $id;
        header("location:addBlogPost.php");       
    }
    else if(isset($_GET['deletebtn'])){
        $id = array_search('delete',$_GET['deletebtn']);
        deleteData('blog_post',$id);
    } 
?>
</html>