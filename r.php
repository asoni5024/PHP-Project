<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #BBDEFB  ;
}

.topnav a {
  float: left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #80DEEA;
  color: black;
}

.active {
  background-color:#AEEA00;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}
</style>
</head>
<body bgcolor="#E1F5FE">

<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="reg.html">Registration</a>
  <a href="r.php"  class="active">Student Info</a>
  <a href="a.php">About</a>
  </div>
<center><h2>Student Detail</h2></center>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
			<th>id</th>
            <th> First </th>
			<th> Last </th>
			<th> Address1 </th>
			<th> Address2 </th> 
			<th> State</th>
			<th> City </th>
			<th> Zipcode </th>
			<th> Phone </th>
			<th> Email </th>
			<th> Gender </th>
			<th> DOB </th>
			<th> Category </th>
			<th> Course</th>
			<th> Comment</th>
			<th>Action</th>
            </tr>
        </thead>
		
			<?php
 include_once("config.php");
 

$query = "select * from data"; // Fetch all the records from the table address
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_assoc($result))
{
echo '<tr><td>'.$row['id'].'</td><td>'.$row['First'].'</td><td>'.$row['Last'].'</td><td>'.$row['Address1'].'</td><td>'.$row['Address2'].'</td><td>'.$row['State'].'</td><td>'.$row['City'].'</td><td>'.$row['Zipcode'].'</td><td>'.$row['Phone'].'</td><td>'.$row['Email'].'</td><td>'.$row['Gender'].'</td><td>'.$row['DOB'].'</td><td>'.$row['Category'].'</td><td>'.$row['Course'].'</td><td>'.$row['Comment'].'</td><td><button class="btn btn-info"><a href=update.php?id='.$row['id'].'>Update</a></button> | <button  class="btn btn-danger"><a href=delete.php?id='.$row['id'].' onClick=\"return confirm(\'Are you sure you want to delete?\')\">Delete</a></button></td></tr>';
}
?>

		
		
    </table>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );


</script>

</body>
</html>
