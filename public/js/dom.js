
var Dom = {
		add : function(){
			Dom.deleteMessage();
			var url = $('#url').val();
			var source = $('#source').val();
			var pattern = $('#pattern').val();
			var pattern_content = $('#pattern_content').val();
			var pattern_detail = $('#pattern_detail').val();
			$.ajax({
	   	        url: base_url_ci + "admin/addDom",
	   	        method:"POST",
	   	        data: {
	   	        	url : url,
	   	        	source : source,
	   	        	pattern : pattern,
	   	        	pattern_content : pattern_content,
	   	        	pattern_detail : pattern_detail
	   	        }, 
	   	        dataType: "json",
	   	        success: function(response) {
	   	        	if(response.status){
	   	        		$("#sucess").html("<span class='sucess'>"+ response.message + "</span>");
	   	        		Dom.deleteInput();
	   	        	}else{
	   	        		Dom.fieldError(response.message)
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
			$('#url').val("");
			$('#source').val("");
			$('#pattern').val("");
			$('#pattern_detail').val("");
			$('#pattern_content').val("");
		},
		update : function(){
			Dom.deleteMessage();
			var id = $('#idDom').val();
			var url = $('#url').val();
			var source = $('#source').val();
			var pattern = $('#pattern').val();
			var pattern_content = $('#pattern_content').val();
			var pattern_detail = $('#pattern_detail').val();
			$.ajax({
	   	        url: base_url_ci + "admin/editDom/" + id,
	   	        method:"POST",
	   	        data: {
	   	        	url : url,
	   	        	source : source,
	   	        	pattern : pattern,
	   	        	pattern_content : pattern_content,
	   	        	pattern_detail : pattern_detail
	   	        }, 
	   	        dataType: "json",
	   	        success: function(response) {
	   	        	if(response.status){
	   	        		window.location.href = response.link;
	   	        	}else{
	   	        		Dom.fieldError(response.message)
	   	        	}
	   	        }
	   		});
		}
}