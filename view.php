<?php
//create your database and table then connect 
$con =  mysqli_connect("localhost", "root", "", "ajaxpost");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
else{
	$myvar = "select * from data";
	
	$result = mysqli_query($con,$myvar);
	while ($row=mysqli_fetch_assoc($result)) {

		$data[]=array(
			
'id'=>$row['id'],
'First'=>$row['First'],
'Last'=>$row['Last'],
'Address1'=>$row['Address1'],
'Address2'=>$row['Address2'],
'State'=>$row['State'],
'City'=>$row['City'],
'Zipcode'=>$row['Zipcode'],
'Phone'=>$row['Phone'],
'Email'=>$row['Email'],
'Gender'=>$row['Gender'],
'DOB'=>$row['DOB'],
'Category'=>$row['Category'],
'Course'=>$row['Course'],
'Comment'=>$row['Comment']

		);

	}
	$result = array('data'=>$data);
	echo json_encode($result);
}
?>