
var AdminLogin = {
	login : function(){
		var username = $('#username').val();
		var passwork = $('#password').val();
		$.ajax({
   	        url: base_url_ci + "admin/login",
   	        method:"POST",
   	        data: {
   	        	username : username, 
   	        	passwork : passwork
   	        },
   			dataType: "json",
   	        success: function(response) {
   	        	if(!response.status){
   	        		var messError = "<span class='error'>"+ response.message + "</span>";
   	        		$('#login-error').html(messError);
   	        	}
   	        	else{
   	        		location.reload();
   	        	}
   	        }
   		});
	}
}