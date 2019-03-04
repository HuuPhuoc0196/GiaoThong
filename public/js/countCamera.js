var CountCamera = {
	update : function(){
		var cCamera = $('#count_camera').val();
		$.ajax({
   	        url: base_url_ci + "admin/countCamera",
   	        method:"POST",
   	        data: {
   	        	countCamera : cCamera
   	        },
   	        dataType: "json",
   	        success: function(response) {
   	        	if(response.status){
   	        		var sucess = "<span class='sucess'>"+ response.message + "</span>";
   	        		$('#countCamera-sucess').html(sucess);
   	        	}else{
   	        		var sucess = "<span class='error'>"+ response.message + "</span>";
   	        		$('#countCamera-sucess').html(sucess);
   	        	}
   	        }
   		});
	}
}