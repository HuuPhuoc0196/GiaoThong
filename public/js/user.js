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
                    $("#sucess").html("<span class='sucess'>" + response.message + "</span>");
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
    }
}