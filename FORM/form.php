<!DOCTYPE html>
<html>
    <head>
        <title>
            Registration Form
        </title>
    </head>
    <body>
   
    <?php
        require_once "form_Post.php";
        require_once "formConnection.php";
    ?>
    <form method="POST" enctype="multipart/form-data">
        <div id="AccountDetails">
            <h3>Account Details</h3>
            <table>
                    <tr>
                    <td>
                        <label for="prefix">Prefix</lable>
                    </td>
                    <td>
                        <?php $prefixData = ['Mr','Ms','Miss','Mrs','Dr']?>
                        <select name="account[prefix]">
                            <?php foreach($prefixData as $option): ?>
                            <?php $selected =  in_array($option,[displayValue('account','prefix')]) ? 'selected = "selected"' : "";?> 
                            <option value="<?php echo $option ;?>" <?php echo $selected?> > <?php echo $option; ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[firstName]">First Name </label> 
                    </td>
                    <td>
                        <input type="text" name="account[firstName]" value="<?php echo  displayValue('account','firstName');?>" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[lastName]">Last Name </label> 
                    </td>
                    <td>
                        <input type="text" name="account[lastName]" value="<?php echo displayValue('account','lastName');?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[dob]">Date of Birth </label> 
                    </td>
                    <td>
                        <input type="date" name="account[dob]" value="<?php echo  displayValue('account','dob');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[phoneNo]">Phone Number </label> 
                    </td>
                    <td>
                        <input type="text" name="account[phoneNo]" value="<?php echo  displayValue('account','phoneNo');?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[email]">Email </label>
                    </td>
                    <td>
                        <input type="email" name="account[email]" value="<?php echo  displayValue('account','email');?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[password]">Password </label>
                    </td>
                    <td>
                        <input type="password" name="account[password]" value="<?php echo  displayValue('account','password');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="account[confirmPassword]">Confirm Password </label>
                    </td>
                    <td>
                        <input type="password" name="account[confirmPassword] "required>
                    </td>
                </tr>
            </table>
        </div>
        <div id="AddressInformation">
            <h3>Address Information</h3>
            <table>
                <tr>
                    <td>
                        <label for="address[addressline1]"> Address Line 1</label>
                    </td>
                    <td>
                        <input type="text" name="address[addressline1]" value="<?php echo  displayValue('address','addressline1');?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address[addressline1]"> Address Line 2 </label>
                    </td>
                    <td>
                        <input type="text" name="address[addressline2]" value="<?php echo  displayValue('address','addressline2');?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address[company]">Company</label>
                    </td>
                    <td>
                        <input type="text" name="address[company]" value="<?php echo  displayValue('address','company');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address[city]">City</label>
                    </td>
                    <td>
                        <input type="text" name="address[city]" value="<?php echo  displayValue('address','city');?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address[state]">State</label>
                    </td>
                    <td>
                        <input type="text" name="address[state]" value="<?php echo  displayValue('address','state');?>">
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label for="address[country]">Country</label>
                    </td>
                    <td>
                        <?php $countryData = ['select Country','India','USA','CHINA','SRILANKA']?>
                        <select name="address[country]">
                            <?php foreach($countryData as $option): ?>
                            <?php $selected = in_array($option,[displayValue('address','country')]) ? 'selected = "selected"' : "";?>
                            <option value="<?php echo $option ; ?>" <?php echo $selected?> > <?php echo $option; ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address[postalCode]"> Postal Code</label>
                    </td>
                    <td>
                        <input type="text" name='address[postalcode]' value="<?php echo  displayValue('address','postalcode');?>" required>
                    </td>
                </tr>
            </table>
        </div>
        
        <br><br><input type="checkbox" name="InfoButton" onclick="javascript:show_hide(this, 'Show_div')">Show Other Information<br><br>

        <div id="otherInformation" style="display:none">
            <h3>Other Information</h3>
            <table>
                <tr>
                    <td>
                        <label for="other[yourself]"> Describe Yourself  </label>
                    </td>
                    <td>
                        <textarea cols=30 rows=5 name="other[yourself]" required ><?php echo  displayValueOther('yourself');?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="profileImage"> Profile Image </label>
                    </td>
                    <td>
                        <input type="file" name='profileImage' >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="certificate"> Certificate Upload </label>
                    </td>
                    <td>
                        <input type="file" name="certificate">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="other[businessYear]"> How long have you been in Business ? </label>
                    </td>
                    <td>
                        <?php $businessYear = ['Under1Year','1-2Year','2-5Year','5-10Year','Above10Year'] ?>
                        <?php foreach($businessYear as $option): ?>
                        <?php $selected = in_array($option,[displayValueOther('businessYear')]) ? 'checked = "checked"' : "";?>
                        <input type="radio" name="other[businessYear]" value="<?php echo $option; ?>" <?php echo $selected ?>> <?php echo $option;?> 
                        <?php endforeach ?>       
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="other[clients]"> Number of Unique Clients you see each week? </label>
                    </td>
                    <td>
                        <?php $clientData = ['1-5','6-10','10-15','15+'] ?>
                        <select name="other[clients]">
                            <?php foreach($clientData as $option): ?>
                            <?php $selected = in_array($option,[displayValueOther('clients')]) ? 'selected = "selected"' : ""; ?>
                            <option value="<?php echo $option ; ?>"<?php echo $selected ?> > <?php echo $option; ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="other[getTouch]"> How do you like us to get in touch with you? </label>
                    </td>
                    <td>
                        <?php $getTouchData = ['post','email','phone','sms']?>                           
                        <?php foreach($getTouchData as $option): ?>
                        <?php $selected = in_array($option,explode(",",displayValueOther('getTouch',[]))) ? 'checked = "checked"' : "";?>
                            <input type="checkbox" name="other[getTouch][]" value="<?php echo $option; ?>" <?php echo $selected ?>> <?php echo $option;?>
                        <?php endforeach ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="other[hobby]"> Hobbies </label>
                    </td>
                    <td>
                        <?php $hobbyData = ['music','art','traveling','sports','blogging'] ?>
                        <select name="other[hobby][]" multiple>
                            <?php foreach($hobbyData as $option): ?>
                            <?php $selected = in_array($option,explode(",", displayValueOther('hobby',[]))) ? 'selected = "selected"' : "";?>
                            <option value="<?php echo $option ; ?>" <?php echo $selected ?> > <?php echo $option; ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <input type="submit" id="submit" name="submit">
        <input type="submit" id="update"name="update" value="update">
    </form>
    <?php
        echo "<br><br><br><table border='1px solid black'><tr>";
        echo "<th>id</th><th>FirstName</th><th>email</th><th>City</th><th>Hobbies</th><th>GET In Touch</th><th>Action</th></tr>";
        $result = display();
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>". $row['id']."</td>";
            echo "<td>". $row['firstName']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>". $row['city']."</td>";
            echo "<td>". $row['hobbies']."</td>";
            echo "<td>". $row['get_in']."</td>";
            $btnid = $row['id'];
            echo "<td>
                <form method='GET'>
                <input type='submit' name='editbtn[$btnid]' value='edit' onclick='show_hideButton()'>
                <input type='submit' name='viewbtn[$btnid]' value='view'>
                <input type='submit' name='deletebtn[$btnid]' value='delete'>
                </form></td>";
            echo "</tr>";
        }
        echo '</table>';
    ?>
    </body>
</html>
<script src="otherInfo.js"></script>
