
<?php
include_once("config.php");

$sql = "insert into data(First,Last,Address1,Address2,State,City,Zipcode,Phone,Email,Gender,DOB,Category,Course,Comment)
 values('$_POST[First]','$_POST[Last]','$_POST[Address1]','$_POST[Address2]','$_POST[State]','$_POST[City]','$_POST[Zipcode]','$_POST[Phone]','$_POST[Email]','$_POST[Gender]','$_POST[DOB]','$_POST[Category]','$_POST[Course]','$_POST[Comment]')";
$run= mysqli_query($con,$sql);
 if($run){
	echo '101';
}
else{
	echo '102';
}
mysqli_close($con); 
?>
