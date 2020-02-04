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
     <h3>Add Category</h3>
    <form method='post'>
        <table>
            <tr>
                <td>Title</td> 
                <td><input type="text" name='title' value="<?php echo getValue('title','category')?>"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name='content' cols='30' rows='3'><?php echo getValue('content','category')?></textarea></td>
            </tr>
            <tr>
                <td> URL</td>
                <td><input type='text' name='url' value="<?php echo getValue('url','category')?>"></td>
            </tr>
            <tr>
                <td>Meta Title</td>
                <td><input type='text' name='metaTitle' value="<?php echo getValue('metaTitle','category')?>"></td>
            </tr>
            <tr>
                <td> Parent Category</td>
                <td><select name='ParentCategory'>
                    <?php
                    $conn = connection();
                        $query = "SELECT ParentCategoryName from parentcategory";
                        $result = mysqli_query($conn,$query);
                        while($row = $result->fetch_assoc()){
                            $option = $row['ParentCategoryName'];
                            $selected = in_array($option,explode(",", getValue('ParentCategoryName','category',[]))) ? 'selected = "selected"' : "";
                            echo "<option value='$option' $selected>".$option."</option>";
                        }
                    ?>
                    </select></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type='file' name='image' value='Upload Image' ></td>
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
        $data['image'] = $_POST['image'];
        $parentCategory = $_POST['ParentCategory'];
        $query1 = "SELECT parentCategoryId from parentcategory where ParentCategoryName = '$parentCategory'";
        $row1 = mysqli_fetch_assoc(mysqli_query($conn,$query1));
        $data['parentCategoryId'] = $row1['parentCategoryId'];
        $data['createdAt'] = time();
        $data['updatedAt'] = 0;
          
        if(isset($_POST['submit'])){
            insert($data,'category');          
            header("location:blogCategory.php");
        }
        elseif(isset($_POST['update'])){
            $id = $_SESSION['editId'];
            update($data,'category',$id);
            header("location:blogCategory.php");
         }
    }
?>