
function savedata()
{
	var First = $("#f").val();
	//alert(first name);
	var Last = $("#l").val();
	//alert(last name);
	
	var Address1 = $("#ad1").val();
	//alert(address 1);
	var Address2 = $("#ad2").val();
	//alert(address 2);
	var State = $("#s").val();
	//alert(state);
	var City = $("#ci").val();
	//alert(city);
	var Zipcode = $("#z").val();
	//alert(zipcode);
	
	
	var Email = $("#e").val();
	//alert(email);
	var Phone = $("#m").val();
	//alert(phone no);
	
	var Gender = $("#g").val();
	//alert(gender);
	var DOB = $("#d").val();
	//alert(dob);
	
	var Category = $("#c").val();
	//alert(category);
	var Course = $("#co").val();
	//alert(course);
	
	var Comment = $("#t").val();
	//alert(comments);
			
	if(First==null || First=="",Last==null || Last=="",Address1==null || Address1=="",Address2==null || Address2=="",State==null || State=="",City==null || City=="",Zipcode==null || Zipcode=="",Phone==null || Phone=="",Email==null || Email=="",Gender==null || Gender=="",DOB==null || DOB=="",Category==null || Category=="",Course==null || Course=="")
	{
        alert("Please Fill All Required Field");
        return false;
        
    }
	else{
	$.ajax({
			type: "POST",
			url: "in.php",
			data: {First:First,Last:Last,Address1:Address1,Address2:Address2,State:State,City:City,Zipcode:Zipcode,Phone:Phone,Email:Email,Gender:Gender,DOB:DOB,Category:Category,Course:Course,Comment:Comment},
			cache: false,		 
			success: function(data){
				if(data==101){
					alert("inserted");
				}
				else{
					alert("can not insert");
				}
			}
		})
	
	}
			
		
}
