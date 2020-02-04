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
     <h3>Add New Blog Post</h3>
    <form method='POST'>
        <table>
        <tr>
            <td>Title</td> 
            <td><input type="text" name='title' value="<?php echo getValue('title','blog_post')?>"></td>
        </tr>
        <tr>
            <td>Content </td>
            <td><textarea name='content' cols='30' rows='3'><?php echo getValue('content','blog_post')?></textarea></td>
        </tr>
        <tr>
            <td>URL </td>
            <td><input type='text' name='url' value="<?php echo getValue('url','blog_post')?>"></td>
        </tr>
        <tr>
            <td>Published At</td>    
            <td><input type='text' name="publishedAt" value="<?php echo getValue('publishedAt','blog_post')?>"></td>
        </tr>
        <tr>
            <td>Category</td> 
            <td><select name='category[]' multiple>
            <?php
            $conn = connection();
            $id = $_SESSION['userid'];
                $query = "SELECT title from category where userId = '$id'";
                $result = mysqli_query($conn,$query);
                while($row = $result->fetch_assoc()){
                    $option = $row['title'];
                    $selected = in_array($option,explode(",", getValue('category','blog_post',[]))) ? 'selected = "selected"' : "";
                    echo "<option value='$option' $selected>".$option."</option>";
                }
            ?>
            </select></td>
        </tr>
        <tr>
            <td>Image</td> 
            <td><input type='file' name='image' value='Upload Image'></td>
        </tr>
        <tr>
        <td><input type='submit' name='submit'></td>
        <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</html>
<?php   
    if(isset($_POST['submit']) || isset($_POST['update'])){
        $email = $_SESSION['email'];
         $query = "SELECT userId from user where email = '$email'";
         $row = mysqli_fetch_assoc(mysqli_query($conn,$query));
         $userid = $row['userId'];
         $data = [];

         $data['userId'] = $userid;
         $data['title'] = $_POST['title'];
         $data['url'] = $_POST['url'];
         $data['content'] = $_POST['content'];
         print_r($_POST['category']);
         $data['category'] = implode(',',$_POST['category']);
         $data['image'] = $_POST['image'];
         $data['publishedAt'] = time();
         $data['createdAt'] = time();
         $data['updatedAt'] = 0;
         if(isset($_POST['submit'])){
            insert($data,'blog_post');

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
                insert($data1,'post_category');
            }
            header("location:blogPost.php");
         }
         elseif(isset($_POST['update'])){
            $id = $_SESSION['editId'];
            update($data,'blog_post',$id);
            header("location:blogPost.php");
         }
         
    }
?>