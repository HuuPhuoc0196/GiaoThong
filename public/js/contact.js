
var Contact = {
		contact : function(){
			Contact.deleteMessage();
			var name = $('#name').val();
			var email = $('#email-contact').val();
			var content = $('#content').val();
			$.ajax({
	   	        url: base_url_ci + "contact/contact",
	   	        method:"POST",
	   	        data: {
	   	        	name : name,
	   	        	email : email,
	   	        	content : content
	   	        }, 
	   	        dataType: "json",
	   	        success: function(response) {
	   	        	if(response.status){
	   	        		$("#sucess").html("<span class='sucess'>"+ response.message + "</span>");
	   	        		Contact.deleteInput();
	   	        	}else{
	   	        		Contact.fieldError(response.message)
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
			$('.sucess').each(function( index ) {
				  $(this).html("");
			});
		},
		deleteInput : function(){
			$('#name').val("");
			$('#email-contact').val("");
			$('#content').val("");
		}
}