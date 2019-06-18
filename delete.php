 <?php  //For delete table data
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
$query = "DELETE FROM data WHERE id=$id";

//run the query to delete the person.
$result = mysqli_query($con,$query) OR die(mysql_error());

echo "Data successfully deleted in the database table ... "; 
header("Location:r.php");
?>