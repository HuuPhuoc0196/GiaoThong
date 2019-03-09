var Camera = {
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