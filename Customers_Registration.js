$(document).ready(function (e) {
	$("#frmtxt").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "../Backend/SaveReg.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			beforeSend:function(msg)
			{
				return chk1();
			},
			success: function(data)
		    {
				if(data.trim()=="")
				{
					alert("Customer's Registration Successful!");
					location.href='../Pages/Customers_Registration.php';
				}
				else
				{
					$("#ERRMsg").html(data);
				}
				
		    },
		  	error: function() 
	    	{
				
	    	} 	        
	   });
	}));
	
	
});
	
function chk1()
{
	if(document.frmtxt.txtFirst.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your First Name!";
		document.frmtxt.txtFirst.focus();
		return false;
	} 
	if(document.frmtxt.Gender.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your Gender!";
		document.frmtxt.Gender.focus();
		return false;
	}
	if(document.frmtxt.txtAddress.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your Address!";
		document.frmtxt.txtAddress.focus();
		return false;
	}
	if(document.frmtxt.Contact.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your Contact Number!";
		document.frmtxt.Contact.focus();
		return false;
	}
	if(document.frmtxt.EMail.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your E-Mail!";
		document.frmtxt.EMail.focus();
		return false;
	}
	if(document.frmtxt.Pass.value=="")
	{
		document.getElementById("ERRMsg").innerHTML="Enter Your Password!";
		document.frmtxt.Pass.focus();
		return false;
	}
	if(document.frmtxt.txtpass1.value != document.frmtxt.Pass.value)
	{
		document.getElementById("ERRMsg").innerHTML="Password does not match!";
		document.frmtxt.txtpass1.focus();
		return false;
	}
	//return true;	
}