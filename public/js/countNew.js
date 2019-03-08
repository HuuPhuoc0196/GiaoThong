var CountNew = {
	update : function(){
		var cNew = $('#count_news').val();
		$.ajax({
   	        url: base_url_ci + "admin/countNews",
   	        method:"POST",
   	        data: {
   	        	countNews : cNew
   	        },
   	        dataType: "json",
   	        success: function(response) {
   	        	if(response.status){
   	        		var sucess = "<span class='sucess'>"+ response.message + "</span>";
   	        		$('#countNew-sucess').html(sucess);
   	        	}else{
   	        		var sucess = "<span class='error'>"+ response.message + "</span>";
   	        		$('#countNew-sucess').html(sucess);
   	        	}
   	        }
   		});
	}
}