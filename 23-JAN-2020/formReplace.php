<?php
    $text = $_GET['text'];
    $find = $_GET['search'];
    $replace = $_GET['replace'];
    if(isset($_GET['text']) && isset($_GET['search']) && isset($_GET['replace']) ){
        $replaceText =  str_ireplace($find, $replace, $text);
    }
    else{
        echo "Please Fill All Entity";
    }

    $textarea = $_GET['textarea'];
    $findArray = ['Bhakti','Drashti','Ruchita'];
    $replaceArray = ['B****i','D*****i','R*****a'];

    $replaceArea = str_ireplace($findArray, $replaceArray, $textarea);

    /*$select = $_GET['technology'];
    $find1 = $_GET['search1'];
    $replace1 = $_GET['replace1'];
    $replaceValue = str_ireplace($find1, $replace1, $select);
    echo $replaceValue;*/
    
?>
<html>
    <form method="GET">
        <strong>Text</strong>
        <input type="text" name="text" value = '<?php echo $replaceText; ?>'/><br><br>
        <strong>Search</strong>
        <input type="text" name="search"/><br><br>
        <strong>Replace With</strong>
        <input type="text" name="replace"/><br><br>

        <textarea name="textarea" rows = 5 cols = 50><?php echo $replaceArea; ?></textarea>

        <!--select name="technology">
            <option><?php echo $replaceValue; ?></option>
            <option>php</option>
            <option>java</option>
            <option>python</option>
        </select>
        <strong>Search</strong>
        <input type="text" name="search1"/><br><br>
        <strong>Replace With</strong>
        <input type="text" name="replace1"/--><br><br>
        <input type = "submit" value= "Find & Replace">
    </form>
</html>