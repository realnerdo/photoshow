$(function(){

    var $body = $('body'),
        loader = $('#loader');

    var options = {
        success: function(files) {
            var images_array = [];

            $.each(files, function(i, el){
                var image = { url: el.link };
                images_array.push(image);
            });

            var images = { images: images_array };

            $.post('uploadImages', images)
                .done(function(data){
                    window.location.replace(data.redirect);
                });
            loader.fadeIn();
        },
        linkType: "direct",
        multiselect: true,
        extensions: ['images']
    }

    $body.on('click', '#dropbox-chooser', function(){
        Dropbox.choose(options);
    });

});
