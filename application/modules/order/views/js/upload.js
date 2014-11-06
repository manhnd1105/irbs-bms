/**
 * Created by Tuan Long on 10/3/2014.
 */

$(document).ready(function () {

    var formdata = false;

    if (window.FormData) {
        formdata = new FormData();
    }

    function showUploadImage(source, content) {
        //var images = document.getElementById('upload_image');
        content.innerHTML += '<div class="col-sm-3"><a href="#" class="thumbnail"><img src="' + source + '"/></a></div>';
    }

    function showUploadInfo(file, content, index) {
        var size = bytesToSize(file.size);
        //var info = document.getElementById('upload_image');
        content.innerHTML += '<div class="col-sm-9">' +
        '<div class= "well">' +
            //'<span class="pull-left text-muted small">Name:</span>' +
            //'<span class="text-info">'+index+'</span>' +
        '<span class="pull-left text-muted small">Name:</span>' +
        '<span class="text-info">' + file.name + '</span>' +
        '<button class="btn btn-xs btn-default pull-right" type="button" onclick="remove()">remove</button><br/>' +
        '<span class="pull-left text-muted small">Size:</span>' +
        '<span class="text-info">' + size + '</span><br/>' +
        '</div>' +
        '</div>';
    }

    function remove() {
        alert('dsdsadsa');
    }

    //function to format bites bit.ly/19yoIPO
    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Bytes';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

    // load progressbar
    function progressbarUpload(event) {
        var percent = event.loaded / event.total * 100;
        var progress = $('.progress');
        progress.css('display', 'block');
        var bar = $('.progress-bar');
        bar.attr('aria-valuenow', percent);
        bar.css('width', percent + '%');
        bar.html(percent + '%');
        //var progress = $('.progress');
        //progress.css('display','block');
        //var bar = $('.progress-bar');
        //var i = 0;
        //for( ; i<=100; i++){
        //
        //    bar.attr('aria-valuenow',i);
        //    bar.css('width',i+'%');
        //    bar.html(i+'%');
        //}
    }

    // show information file upload
    $('#files').on('change', (function (event) {
        event.preventDefault();
        var i = 0;
        var content = document.getElementById('upload_image');
        for (; i < this.files.length; i++) {
            var file = this.files[i];
            content.innerHTML += '<div class="row">';
            if (file.type.match(/image.*/)) {
                var index = i + 1;
                if (window.FileReader) {
                    var reader = new FileReader();
                    reader.onloadend = function (e) {
                        showUploadImage(e.target.result, content);
                    };
                    reader.readAsDataURL(file);
                    showUploadInfo(file, content, index);
                }

                if (formdata) {
                    formdata.append('files[]', file);
                }
            }
            content.innerHTML += '</div>';
        }
    }));

    //upload file to server
    $('#submit').on('click', function (event) {
        event.preventDefault();
        //var btn_addfile = document.getElementById('files');
        //var btn_upload = document.getElementById('submit');
        //var progress = $('.progress');
        //progress.css('display', 'block');
        //var bar = $('.progress-bar');
        $.ajax({
            //url: base_url + 'index.php/order/upload_controller/upload',
            url: 'http://localhost/irbs-fms/index.php/file/image_controller/fms_receiver',
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            //beforeSend: function () {
            //    btn_addfile.setAttribute('disabled', 'disabled');
            //    btn_upload.setAttribute('disabled', 'disabled');
            //},
            ///* progress bar call back*/
            //uploadProgress: function (event, position, total, percentComplete) {
            //    var percent = percentComplete + '%';
            //    bar.attr('aria-valuenow', percentComplete);
            //    bar.css('width', percent);
            //    bar.html(percent);
            //},

            /* complete call back */
            //complete: function (data) {
            //    progress.css('display', 'none');
            //},
            success: function (res, a ,b) {
                console.log(res);
                console.log(a);
                console.log(b);
                //alert.html(res).fadeIn();
                //$('#files').trigger('reset');
                //$('#submit').html('Start upload');
                //window.location.href = base_url + 'index.php/order/upload_controller/view_payment';
            },
            error: function (e) {
                console.log('error ' + e);
            }

        });

    });

    $('#test').on('click', function (event) {
        //var progress = $('.progress');
        //progress.css('display','block');
        //var bar = $('.progress-bar');
        //var i = 0;
        //for( ; i<=100; i++){
        //
        //    bar.attr('aria-valuenow',i);
        //    bar.css('width',i+'%');
        //    bar.html(i+'%');
        //}
        var loaded = event.loaded;
        alert('sdsd' + loaded);
    });


});

