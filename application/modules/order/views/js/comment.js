/**
 * Created by Tuan Long on 10/28/2014.
 */

$(document).ready(function () {
    //upload file to server
    $('#post').on('click', function (event) {
        event.preventDefault();
        console.log($('#file_changed_path').attr('href'));
        var data = {
            "content": $('#content').val(),
            "img_id": $('input[name="id"]').val(),
            "approve": $('input[name="approve"]:checked').val(),
            "file_changed_path": $('#file_changed_path').attr('href')
        };
        $.ajax({
            url: base_url + 'index.php/order/img_controller/create_comment',
            type: "POST",
            data: data,
            success: function (res) {
                //console.log(res);
                //console.log(JSON.parse(res));
                res = JSON.parse(res);
                //show_comment(res['reviewer'], res['time_commented'], res['content']);
                console.log('reviewer: ' + res['reviewer']);
                console.log('time: ' + res['time_commented']);
                console.log('content: ' + res['content']);
                var wrap = document.getElementById('wrap_comment');
                //var wrap = $('#wrap_comment');
                var current_time = new Date();
                //var current_time = $.datetimepicker.formatDate('yy-mm-dd hh:mm:ss',time);
                wrap.innerHTML += '' +
                '<div class="media"> ' +
                '<a class="pull-left" href="#">' +
                '<img class="media-object" src="http://placehold.it/64x64" alt="">' +
                '</a>' +
                '<div class="media-body">' +
                '<h4 class="media-heading"><span class="label label-warning" id="reviewer">' +
                res['reviewer'] + '</span> said at' +
                '<small> ' +
                    //current_time.toLocaleDateString() +
                res['time_commented'] +
                '</small></h4>' +
                res['content'] +
                '</div>' +
                '</div>';
            },
            error: function () {
                alert('Ajax request was error');
            }
        });
    });

    //function show_comment(reviewer, time_commented, content) {
    //    console.log('reviewer: ' + reviewer);
    //    console.log('time: ' + time_commented);
    //    console.log('content: ' + content);
    //    var wrap = document.getElementById('wrap_comment');
    //    var current_time = new Date();
    //    //var current_time = $.datetimepicker.formatDate('yy-mm-dd hh:mm:ss',time);
    //    wrap.innerHTML += '' +
    //    '<div class="media"> ' +
    //    '<a class="pull-left" href="#">' +
    //    '<img class="media-object" src="http://placehold.it/64x64" alt="">' +
    //    '</a>' +
    //    '<div class="media-body">' +
    //    '<h4 class="media-heading">' +
    //    reviewer + ' said at' +
    //    '<small> ' +
    //    //current_time.toLocaleDateString() +
    //    time_commented +
    //    '</small></h4>' +
    //    content +
    //    '</div>' +
    //    '</div>';
    //}
});