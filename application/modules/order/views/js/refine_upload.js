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
        var remove = function () {
            console.log('remove button clicked');
        };
        content.innerHTML += '<div class="col-sm-9">' +
        '<div class= "well">' +
        '<span class="pull-left">Name:</span>' +
        '<span class="text-info">' + file.name + '</span>' +
        '<button class="btn btn-xs btn-default pull-right btn_remove" type="button" onclick="\nconsole.log(\'remove button clicked\');\n">remove</button><br/>' +
        '<span class="pull-left">Size:</span>' +
        '<span class="text-info">' + size + '</span><br/>' +
        '</div>' +
        '</div>';
        $('.btn_remove').click(function () {
            console.log('remove button clicked');
        });
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
    $('#btn_submit_upload').on('click', function (event) {
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
            success: function (img_links) {
                console.log('Called back image links: ' + img_links);
                //for (var i = 0; i < img_links.length; i++) {
                //    array_links.push(JSON.stringify(img_links[i]));
                //}
                $('#image_links').val(JSON.parse(img_links));

                //$('#uploaded_image').html(img_links);
                //alert.html(res).fadeIn();
                //$('#files').trigger('reset');
                //$('#submit').html('Start upload');
                //window.location.href = base_url + 'index.php/order/img_controller';
                alert('Uploaded');
                $('#lastest_img').attr('src', JSON.parse(img_links));
            },
            error: function (e) {
                console.log('error ' + e);
            }
        });
    });

    $('#btn_submit').click(function () {
        console.log('Button submit clicked');
        $.ajax({
            'url': base_url + 'index.php/order/img_controller/upload',
            'type': 'POST',
            //'dataType': 'json',
            'data': {
                'id': $('input[name="id"]').val(),
                'file_changed_path': $('#image_links').val()
            },
            'success': function (xhr) {
                console.log('Save success');
                console.log(xhr);

                alert('Saved');
            },
            'error': function (xhr, b, c) {
                console.log('fail');
                console.log(xhr + b + c);
            }
        });
    });
});

