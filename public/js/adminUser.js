var AdminUser = {
	update : function(){
		AdminUser.deleteMessage();
		var username = $('#username').val();
		var email = $('#email').val();
		var name = $('#name').val();
		var phone = $('#phone').val();
		var address = $('#address').val();
		var level = $('input[name=level]:checked').val();
		$.ajax({
   	        url: base_url_ci + "admin/editUser/" + username,
   	        method:"POST",
   	        data: {
   	        	email : email,
   	        	name : name,
   	        	phone : phone,
   	        	address : address,
   	        	level : level
   	        }, 
   	        dataType: "json",
   	        success: function(response) {
   	        	if(response.status){
   	        		window.location.href = response.link;
   	        	}else{
   	        		AdminUser.fieldError(response.message)
   	        	}
   	        }
   		});
	},
	
	fieldError : function(data){
		for(var k in data) {
			var error = "<span class='error'>"+ data[k] + "</span>";
			$("#" + k + "-error").html(error);
		}
	},
	
	deleteMessage : function(){
		$('.error').each(function( index ) {
			  $(this).html("");
		});
	}

}