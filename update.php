<?php
include("config.php");
if(count($_POST)>0) {
mysqli_query($con,"UPDATE data set id='" . $_POST['id'] . "', First='" . $_POST['First'] . "', Last='" . $_POST['Last'] . "', Address1='" . $_POST['Address1'] . "' ,Address2='" . $_POST['Address2'] . "', State='" . $_POST['State'] . "' ,City='" . $_POST['City'] . "', Zipcode='" . $_POST['Zipcode'] . "' ,Phone='" . $_POST['Phone'] . "', Email='" . $_POST['Email'] . "' ,Gender='" . $_POST['Gender'] . "', DOB='" . $_POST['DOB'] . "' ,Category='" . $_POST['Category'] . "', Course='" . $_POST['Course'] . "' ,Comment='" . $_POST['Comment'] . "' WHERE id='" . $_POST['id'] . "'");
$message = "Record Updated Successfully";
}
$result = mysqli_query($con,"SELECT * FROM data WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>

</head>
<body bgcolor="#E1F5FE"><center>
<form name="form" method="post" action="">

<div style="padding-bottom:5px;">
<a href="r.php">Student Info</a>
</div>
id: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>
First Name: <br>
<input type="text" name="First" class="txtField" value="<?php echo $row['First']; ?>">
<br>
Last Name :<br>
<input type="text" name="Last" class="txtField" value="<?php echo $row['Last']; ?>">
<br>
Address Line 1:<br>
<input type="text" name="Address1" class="txtField" value="<?php echo $row['Address1']; ?>">
<br>
Address Line 2:<br>
<input type="text" name="Address2" class="txtField" value="<?php echo $row['Address2']; ?>">
<br>
State: <br>

<input type="text" name="State"  value="<?php echo $row['State']; ?>">
<br>
City: <br>
<input type="text" name="City" class="txtField" value="<?php echo $row['City']; ?>">
<br>
Zipcode :<br>
<input type="text" name="Zipcode" class="txtField" value="<?php echo $row['Zipcode']; ?>">
<br>
Phone:<br>
<input type="text" name="Phone" class="txtField" value="<?php echo $row['Phone']; ?>">
<br>
Email:<br>
<input type="text" name="Email" class="txtField" value="<?php echo $row['Email']; ?>">
<br>
Gender: <br>
<input type="text" name="Gender"  value="<?php echo $row['Gender']; ?>">
<br>
DOB: <br>
<input type="text" name="DOB" class="txtField" value="<?php echo $row['DOB']; ?>">
<br>
Category :<br>
<input type="text" name="Category" class="txtField" value="<?php echo $row['Category']; ?>">
<br>
Course:<br>
<input type="text" name="Course" class="txtField" value="<?php echo $row['Course']; ?>">
<br>
Comment:<br>
<input type="text" name="Comment" class="txtField" value="<?php echo $row['Comment']; ?>">
<br>
<input type="submit" name="submit" value="Save" class="buttom">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
</form></center>
</body>
</html>


