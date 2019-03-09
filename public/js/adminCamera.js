var AdminCamera = {
    add: function() {
        AdminCamera.deleteMessage();
        var name = $('#name').val();
        var src = $('#src').val();
        var des = $('#des').val();
        var status = $('input[name=status]:checked').val();
        $.ajax({
            url: base_url_ci + "camera/addCamera",
            method: "POST",
            data: {
                name: name,
                src: src,
                des: des,
                status: status
            },
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    $("#sucess").html("<span class='sucess'>" + response.message + "</span>");
                    AdminCamera.deleteInput();
                } else {
                    AdminCamera.fieldError(response.message)
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
    deleteInput: function() {
        $('#name').val("");
        $('#src').val("");
        $('#des').val("");
        $("#rd1").prop('checked', true);
    },
    update: function() {
        AdminCamera.deleteMessage();
        var id = $('#idCamera').val();
        var name = $('#name').val();
        var src = $('#src').val();
        var des = $('#des').val();
        var status = $('input[name=status]:checked').val();;
        $.ajax({
            url: base_url_ci + "camera/editCamera/" + id,
            method: "POST",
            data: {
                name: name,
                src: src,
                des: des,
                status: status
            },
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    window.location.href = response.link;
                } else {
                    AdminCamera.fieldError(response.message)
                }
            }
        });
    },
    showImageUrl: function() {
        $('.camera').each(function(index) {
            var src = $(this).attr('src');
            var indexSearch = src.lastIndexOf("=black");
            src = src.substring(0, indexSearch + 6);
            src = src + "&t=" + new Date().getTime();
            $(this).attr("src", src);
        });
    }
}