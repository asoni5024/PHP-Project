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
		
    </table>
	

    <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modelForm">
                
            </div>
        </div>
    </div>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();

} );

var  mData;

function savedata(){
		$.ajax({
			type:'POST',
			url: 'view.php',
			cache: false,
			success : function(result){
			var data = JSON.parse(result);
			createtable(data['data']);
			mData =data['data'];
			}
		})
	}
	savedata();

	function createtable(data){
		var html='';
		for(var i in data){
			html+= '<tr><td>'+data[i]['id']+'</td><td>'+data[i]['First']+'</td><td>'+data[i]['Last']+'</td><td>'+data[i]['Address1']+'</td><td>'+data[i]['Address2']+'</td><td>'+data[i]['State']+'</td><td>'+data[i]['City']+'</td><td>'+data[i]['Zipcode']+'</td><td>'+data[i]['Phone']+'</td><td>'+data[i]['Email']+'</td><td>'+data[i]['Gender']+'</td><td>'+data[i]['DOB']+'</td><td>'+data[i]['Category']+'</td><td>'+data[i]['Course']+'</td><td>'+data[i]['Comment']+'</td><td><center><button class="btn btn-success" onclick="Edit1('+i+','+data[i]['id']+')">Edit</button>  <button class="btn btn-danger" onclick="delete1('+i+','+data[i]['id']+')">Delete</button></center></td></tr>';

			$('#tdata').html(html);
		}
		
	}
function delete1(i,id)
        {
            var html ='<div class="modal-header"><center><h3 class="modal-title " id="exampleModalLabel">Are you sure want to delete data?</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" ><center><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_data('+id+')">yes</button>    <button type="button" class="btn btn-info" data-dismiss="modal">No</button></center></div>';
            $("#modelForm").html(html);
           $("#myModal").modal('show');// document.getElementById("myModal").showModal();
        }
function delete_data(id)
{   
    var data3={
        "id":id
    };
        $.ajax({
                type: "POST",
                url: 'delete.php',
                data : {"data3":data3},                    
                cache: false,        
                success: function(result)
                {
                    
                    if(result==1)
                    {
                        alert("deleted successfully");
                        // show();
                        location.reload(true); 

                        
                    }
                    else
                    {
                        alert("not deleted !");
                    }
                }
            }); 
}
function Edit1(i,id){
    console.log(mData);
    var html = '<div class="modal-header"><center><h3 class="modal-title" id="exampleModalLabel">Would you like to update data !</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><label>First:</label><input type="text"  class="form-control" value="'+mData[i]['First']+'" id="modalFirst"><label>Last:</label><input type="text" class="form-control" value="'+mData[i]['Last']+'" id="modalLast"><label>Address1:</label><input type="date" value="'+mData[i]['Address1']+'"class="form-control" id="modalAddress1"><label>Address2 :</label><input type="text" value="'+mData[i]['Address2']+'"class="form-control"  id="modalAddress2"><label>State :</label><input type="text" value="'+mData[i]['State']+'"class="form-control"  id="modalState"><label>City :</label><input type="text" value="'+mData[i]['City']+'"class="form-control"  id="modalCity"><label>Zipcode :</label><input type="text" value="'+mData[i]['Zipcode']+'"class="form-control"  id="modalZipcode"><label>Phone :</label><input type="text" value="'+mData[i]['Phone']+'"class="form-control"  id="modalPhone"><label>Email :</label><input type="text" value="'+mData[i]['Email']+'"class="form-control"  id="modalEmail"><label>Gender :</label><input type="text" value="'+mData[i]['Gender']+'"class="form-control"  id="modalGender"><label>DOB :</label><input type="text" value="'+mData[i]['DOB']+'"class="form-control"  id="modalDOB"><label>Category :</label><input type="text" value="'+mData[i]['Category']+'"class="form-control"  id="modalCategory"><label>Course :</label><input type="text" value="'+mData[i]['Course']+'"class="form-control"  id="modalCourse"><label>Comment :</label><input type="text" value="'+mData[i]['Comment']+'"class="form-control"  id="modalComment"></div><div class="modal-footer" ><button type="button" onclick="update('+id+')" class="btn btn-success" data-dismiss="modal">save changes</button><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div>';
        $("#modelForm").html(html);
        $("#myModal").modal('show');
}

      function update(id)
        {
             
                var data2 = {
                            "id" :id,
                            "modalFirst":$("#modalFirst").val(),
                            "modalLast":$("#modalLast").val(),
                            "modalAddress1" :$("#modalAddress1").val(),
                            "modalAddress2" :$("#modalAddress2").val(),
                            "modalState":$("#modalState").val(),
                            "modalCity":$("#modalCity").val(),
                            "modalZipcode" :$("#modalZipcode").val(),
                            "modalPhone" :$("#modalPhone").val(),
                            "modalEmail":$("#modalEmail").val(),
                            "modalGender":$("#modalGender").val(),
                            "modalDOB" :$("#modalDOB").val(),
                            "modalCategory" :$("#modalCategory").val(),
                            "modalCourse":$("#modalCourse").val(),
                             "modalComment":$("#modalComment").val()
                            
                            };
                          
                $.ajax({
                        type: "POST",
                        url: 'update.php',
                        data : {"data2":data2},                    
                        cache: false,        
                        success: function(result)
                        {
                            if(result==101)
                            {
                                alert("successfully updated ");
                                location.reload(true);
                            }
                            else
                            {
                                alert("not updated please try again!");
                            }
                        }
                    });
        } 

</script>

</body>
</html>
