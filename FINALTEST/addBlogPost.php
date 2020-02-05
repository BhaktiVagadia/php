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
    <form method='POST'  enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Title
                </td> 
                <td>
                    <input type="text" name='title' value="<?php echo getValue('title','blog_post')?>">
                </td>
            </tr>
            <tr>
                <td>
                    Content 
                </td>
                <td>
                    <textarea name='content' cols='30' rows='3'>
                        <?php echo getValue('content','blog_post')?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>
                    URL 
                </td>
                <td>
                    <input type='text' name='url' value="<?php echo getValue('url','blog_post')?>">
                </td>
            </tr>
            <tr>
                <td>
                    Published At
                </td>    
                <td>
                    <input type='date' name="publishedAt" value="<?php echo getValue('publishedAt','blog_post')?>">
                </td>
            </tr>
            <tr>
                <td>
                    Category
                </td> 
                <td>
                    <select name='category[]' multiple>
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
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td> 
                <td>
                    <input type='file' name='image' value='Upload Image'>
                </td>
            </tr>
            <tr>
                <td>
                    <input type='submit' name='submit'>
                </td>
                <td>
                    <input type="submit" name="update" value="update">
                </td>
            </tr>
        </table>
    </form>
</html>
<?php   
    if(isset($_POST['submit']) || isset($_POST['update'])){
        $data = blogPostData();
        post_categoryData(); 
        
        if(isset($_POST['submit'])){
            $_SESSION['blogCreate'] = date('D/M/Y h:i:s',time());
            $data['createdAt'] = $_SESSION['blogCreate']; 
            insert($data,'blog_post');           
            header("location:blogPost.php");
        }
        elseif(isset($_POST['update'])){
            $data = blogPostData();
            $data1 = post_categoryData();
            $id = $_SESSION['editId'];
            $data['createdAt'] = $_SESSION['blogCreate']; 
            $data['updatedAt'] = date('D/M/Y h:i:s',time());
            update($data,'blog_post',$id);
            header("location:blogPost.php");
        }         
    }
?>