var CountMap = {
	update : function(){
		var cMap = $('#count_map').val();
		$.ajax({
   	        url: base_url_ci + "admin/countMap",
   	        method:"POST",
   	        data: {
   	        	countMap : cMap
   	        },
   	        dataType: "json",
   	        success: function(response) {
   	        	if(response.status){
   	        		var sucess = "<span class='sucess'>"+ response.message + "</span>";
   	        		$('#countMap-sucess').html(sucess);
   	        	}else{
   	        		var sucess = "<span class='error'>"+ response.message + "</span>";
   	        		$('#countMap-sucess').html(sucess);
   	        	}
   	        }
   		});
	}
}