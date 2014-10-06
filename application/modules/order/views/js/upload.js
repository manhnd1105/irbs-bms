/**
 * Created by Tuan Long on 10/3/2014.
 */

$(document).ready(function(){
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        var  data = new FormData(this);
        //var images = $('#upload').files;
        //for(var i = 0; i <images.length; i++){
        //    data.append('upload',images.file[i]);
        //}
        $.ajax({
            'url': "http://localhost/php_ajax_image_upload/upload.php",
            'data': '{"0"=>"ss","1"==>"dsdasds"}',
            'contentType': false,
            'cache': false,
            'processData':false,
            'success': function(data)
            {
                $("#uploaded").html(data);
            },
            'error': function()
            {
                $("#uploaded").html("error ===========");
            }
        });

    }));

});

