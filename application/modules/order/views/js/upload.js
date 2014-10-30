/**
 * Created by Tuan Long on 10/3/2014.
 */

$(document).ready(function(){

    var formdata = false;

    if(window.FormData){
        formdata = new FormData();
    }

    function showUploadImage(source){
        var images = document.getElementById('upload_image');
        images.innerHTML += '<div class="col-xs-4 col-md-2"><a href="#" class="thumbnail">'+
        '<img src="'+source+'"/>'+
        '</a></div>';
        //row.insertCell(1).innerHTML = '<p class="text-center"><img src="'+source+'" class="img-thumbnail" width = "90px;" height ="90px;"/></p>';
    }
    function showFileInfo(file,index){
        var table = document.getElementById('upload_info');
        var row = table.insertRow();
        row.insertCell(0).innerHTML = '<p class="text-center">'+index+'</p>';
        row.insertCell(1).innerHTML = '<p class="text-center">'+file.name+'</p>';
        row.insertCell(2).innerHTML = '<p class="text-center">'+file.size+'</p>';

        row.insertCell(3).innerHTML = '<div class="progress progress-striped active">'+
        '<div class="progress-bar progress-bar-info"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">'+
        '<span class="sr-only">0%</span>'+
        '</div>' +
        '</div>';
        row.insertCell(4).innerHTML = '<p class="text-center"><a class="btn btn-outline btn-warning btn-sm"><i class="fa fa-times"></i></a></p>';
    }

    // show information file upload
    $('#files').on('change',(function(event){
        event.preventDefault();
        var i = 0, reader;
        for( ; i< this.files.length; i++){
            var file = this.files[i];
            if(file.type.match(/image.*/)){
                var index = i+1;
                showFileInfo(file,index);
                if(window.FileReader){
                    reader = new FileReader();
                    reader.onloadend = function(e){
                        showUploadImage(e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
                if(formdata){
                    formdata.append('files[]',file);
                }
            }
        }
    }));

    //upload file to server
    $('#submit').on('click',function(event){
        event.preventDefault();
        $.ajax({
            url: base_url+'index.php/order/upload_controller/upload',
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (res) {
                alert(res);
            },
            error: function()
            {
                alert('error');
            }

        });

    });

});

