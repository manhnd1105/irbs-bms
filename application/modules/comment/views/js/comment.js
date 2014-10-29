/**
 * Created by Tuan Long on 10/28/2014.
 */

$(document).ready(function(){


    //upload file to server
    $('#post').on('click',function(event){
        event.preventDefault();
        var content = document.getElementById('content').value;
        var image_id = document.getElementById('img_id').value;
        var data = {
          "action": "save",
          "comment":content,
          "img_id": image_id
        };
        $.ajax({
            url: 'http://localhost/irbs-bms/index.php/comment/comment_controller/create_comment',
            type: "POST",
            data:data,
            success: function (res) {
                show_comment(res);
            },
            error: function()
            {
                alert('Ajax request was error');
            }

        });

        //show_comment(content);
    });

    function show_comment(content){
        var wrap = document.getElementById('wrap_comment');
        wrap.innerHTML += '' +
        '<div class="media"> ' +
        '<a class="pull-left" href="#">' +
        '<img class="media-object" src="http://placehold.it/64x64" alt="">' +
        '</a>' +
        '<div class="media-body">' +
        '<h4 class="media-heading">Start Bootstrap<small> August 25, 2014 at 9:30 PM</small></h4>' +
        content+
        '</div>'+
        '</div>';
    }



});