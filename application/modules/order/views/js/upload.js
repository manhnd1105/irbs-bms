/**
 * Created by Tuan Long on 10/3/2014.
 */

$(document).ready(function(){
    //$("#files").on('submit',(function(e) {
    //    e.preventDefault();
    //    var  data = new FormData(this);
    //    //var images = $('#upload').files;
    //    //for(var i = 0; i <images.length; i++){
    //    //    data.append('upload',images.file[i]);
    //    //}
    //    $.ajax({
    //        'url': "http://localhost/php_ajax_image_upload/upload.php",
    //        'data': data,
    //        'contentType': false,
    //        'cache': false,
    //        'processData':false,
    //        'success': function(data)
    //        {
    //            $("#uploaded").html(data);
    //        },
    //        'error': function()
    //        {
    //            $("#uploaded").html("error ===========");
    //        }
    //    });
    //
    //}));
    var formdata = false;


    if(window.FormData){
        formdata = new FormData();
    }

    function showUploadItem(source, file){
        var tbody = document.getElementById('items_upload');
        //var th = document.createElement('thead');
        //var th_row = document.createElement('row');
        //
        //
        //var header = table.createTHead();
        //var theader = header.insertRow();
        //var item_no = theader.insertCell(0);
        //item_no.innerHTML = '<p class="text-center">#</p>';
        //var item_src = theader.insertCell(1);
        //item_src.innerHTML = '<p class="text-center"><i class="fa fa-image"></i></p>';
        //var item_name = theader.insertCell(2);
        //item_name.innerHTML = '<p class="text-center">Name</p>';
        //var item_type = theader.insertCell(3);
        //item_type.innerHTML = '<p class="text-center">Type</p>';
        //var item_size = theader.insertCell(4);
        //item_size.innerHTML = '<p class="text-center">Size</p>';
        //var action = theader.insertCell(5);
        //action.innerHTML = '<p class="text-center">Action</p>';

        var row = tbody.insertRow();
        row.insertCell(0).innerHTML = 1;
        row.insertCell(1).innerHTML = '<p class="text-center"><img src="'+source+'" class="img-thumbnail" width = "90px;" height ="90px;"/></p>';
        row.insertCell(2).innerHTML = '<p class="text-center">'+file.name+'</p>';
        row.insertCell(3).innerHTML = '<p class="text-center">'+file.type+'</p>';
        row.insertCell(4).innerHTML = '<p class="text-center">'+file.size+'</p>';
        row.insertCell(5).innerHTML = '<p class="text-center">'+'action'+'</p>';
    }


    $('#files').on('change',(function(event){
        event.preventDefault();

        var i = 0, reader, file;
        for( ; i< this.files.length; i++){
            file = this.files[i];
            if(file.type.match(/image.*/)){
                if(window.FileReader){
                    reader = new FileReader();
                    reader.onloadend = function(e){
                        showUploadItem(e.target.result,file);
                    };
                    reader.readAsDataURL(file);
                }
                if(formdata){
                    formdata.append('files[]',file);
                }
            }
        }

    }));
});

