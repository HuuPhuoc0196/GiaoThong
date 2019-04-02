var User = {
    login: function() {
        User.deleteMessage();
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url: base_url_ci + "user/login",
            method: "POST",
            data: {
                username: username,
                password: password
            },
            dataType: "json",
            success: function(response) {
                if (!response.status) {
                    User.fieldError(response.message);
                } else {
                    location.reload();
                }
            }
        });
    },
    fieldError: function(data) {
        for (var k in data) {
            var error = "<span class='error'>" + data[k] + "</span>";
            $("#" + k + "-error").html(error);
        }
    },
    deleteMessage: function() {
        $('.error').each(function(index) {
            $(this).html("");
        });
        $('.sucess').each(function(index) {
            $(this).html("");
        });
    },
    register: function() {
        User.deleteMessage();
        var name = $('#name').val();
        var username = $('#username').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var re_password = $('#re_password').val();
        var address = $('#address').val();
        $.ajax({
            url: base_url_ci + "user/register",
            method: "POST",
            data: {
                name: name,
                username: username,
                phone: phone,
                email: email,
                password: password,
                re_password: re_password,
                address: address
            },
            dataType: "json",
            success: function(response) {
                if (!response.status) {
                    User.fieldError(response.message);
                } else {
                	showAlertSuccess("Đăng ký thành công");
                    User.deleteInput();
                }
            }
        });
    },
    deleteInput: function() {
        $('#name').val("");
        $('#username').val("");
        $('#phone').val("");
        $('#email').val("");
        $('#password').val("");
        $('#re_password').val("");
        $('#address').val("");
    },
    closePopup : function(){
    	$('#myModal1').modal('hide');
    },
    updateProfile : function(){
    	User.deleteMessage();
    	var name = $('#name_profile').val();
        var username = username_update;
        var phone = $('#phone_profile').val();
        var email = $('#email_profile').val();
        var address = $('#address_profile').val();
        var password = $('#password_profile').val();
        $.ajax({
            url: base_url_ci + "user/updateProfile",
            method: "POST",
            data: {
                name: name,
                username: username,
                phone: phone,
                email: email,
                address: address,
                password : password
            },
            dataType: "json",
            success: function(response) {
            	if (!response.status) {
                    User.fieldError(response.message);
                } else {
                	showAlertSuccess("Cập nhật thành công!");
                }
           }
        });
    },
    forgotPasswork : function(){
    	User.deleteMessage();
        var email = $('#email-reset').val();
        $.ajax({
            url: base_url_ci + "user/forgotPasswork",
            method: "POST",
            data: {
                email: email
            },
            dataType: "json",
            success: function(response) {
            	if (!response.status) {
                    User.fieldError(response.message);
                } else {
                    showAlertSuccess("Vui lòng check email để lấy lại mật khẩu");
                }
           }
        });
    },
    deleteInfor : function(){
    	User.deleteMessage();
    	$('#email-reset').val('');
    },
    
    loadProfile : function(username){
         $.ajax({
             url: base_url_ci + "user/loadProfile",
             method: "POST",
             data: {
            	 username: username
             },
             dataType: "json",
             success: function(response) {
            	 window.location.href = response.link;
            	 User.showProfile(username);
             }
         });
    },
    showProfile : function(username){
         $.ajax({
             url: base_url_ci + "user/showProfile",
             method: "POST",
             data: {
            	 username: username
             },
             dataType: "json",
             success: function(response) {
            	 $('#name_profile').val(response.data.name);
                 $('#username_profile').val(response.data.username);
                 $('#phone_profile').val(response.data.phone);
                 $('#email_profile').val(response.data.email);
                 $('#address_profile').val(response.data.address);
                 $('#username_profile_change').val(response.data.username);
             }
         });
    },
    showChangePassword(){
    	$('#password-old').val('');
    	$('#password-new').val('');
        $('#re-password-new').val('');
    	$('#changePasswordModel').modal('show');
    },
    changePasswork : function(){
    	User.deleteMessage();
    	var username = $('#username_profile_change').val();
    	var password = $('#password-old').val();
    	var newPassword = $('#password-new').val();
        var rePasswordNew = $('#re-password-new').val();
        $.ajax({
            url: base_url_ci + "user/changePasswork",
            method: "POST",
            data: {
            	username: username,
            	password: password,
            	newPassword: newPassword,
            	rePasswordNew: rePasswordNew
            },
            dataType: "json",
            success: function(response) {
            	if (!response.status) {
                    User.fieldError(response.message);
                } else {
                    showAlertSuccess("Thay đổi mật khẩu thành công");
                	$('#password-old').val('');
                	$('#password-new').val('');
                    $('#re-password-new').val('');
                }
           }
        });
    }
}