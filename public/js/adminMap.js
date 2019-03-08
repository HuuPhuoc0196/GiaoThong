
var AdminMap = {
		add : function(){
			AdminMap.deleteMessage();
			var name = $('#name').val();
			var lat = $('#lat').val();
			var lng = $('#lng').val();
			var status = $('input[name=status]:checked').val();
			$.ajax({
	   	        url: base_url_ci + "admin/addMap",
	   	        method:"POST",
	   	        data: {
	   	        	name : name,
	   	        	lat : lat,
	   	        	lng : lng,
	   	        	status : status
	   	        }, 
	   	        dataType: "json",
	   	        success: function(response) {
	   	        	if(response.status){
	   	        		$("#sucess").html("<span class='sucess'>"+ response.message + "</span>");
	   	        		AdminMap.deleteInput();
	   	        	}else{
	   	        		AdminMap.fieldError(response.message)
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
			$('#lat').val("");
			$('#lng').val("");
			$("#rd1").prop('checked', true);
		},
		update : function(){
			AdminMap.deleteMessage();
			var id = $('#idMap').val();
			var name = $('#name').val();
			var lat = $('#lat').val();
			var lng = $('#lng').val();
			var status = $('input[name=status]:checked').val();;
			$.ajax({
	   	        url: base_url_ci + "admin/editMap/" + id,
	   	        method:"POST",
	   	        data: {
	   	        	name : name,
	   	        	lat : lat,
	   	        	lng : lng,
	   	        	status : status
	   	        }, 
	   	        dataType: "json",
	   	        success: function(response) {
	   	        	if(response.status){
	   	        		window.location.href = response.link;
	   	        	}else{
	   	        		AdminMap.fieldError(response.message)
	   	        	}
	   	        }
	   		});
		}
}