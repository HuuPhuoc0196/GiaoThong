var AdminNews = {
	update : function(){
		AdminNews.deleteMessage();
		var id = $('#idNews').val();
		var title = $('#title').val();
		var summary = $('#summary').val();
		var source = $('#source').val();
		var status = $('input[name=status]:checked').val();
		$.ajax({
   	        url: base_url_ci + "admin/editNews/" + id,
   	        method:"POST",
   	        data: {
   	        	title : title,
   	        	summary : summary,
   	        	source : source,
   	        	status : status
   	        }, 
   	        dataType: "json",
   	        success: function(response) {
   	        	if(response.status){
   	        		window.location.href = response.link;
   	        	}else{
   	        		AdminNews.fieldError(response.message)
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