/**
 * Created by Tuan Long on 10/7/2014.
 */

$(document).ready(function(){

    function showUploadImage(source){
        var images = document.getElementById('images_upload');
        images.innerHTML += '<div class="col-xs-6"><a href="#" class="thumbnail">'+
        '<img src="'+source+'"/>'+
        '</a></div>';
        //row.insertCell(1).innerHTML = '<p class="text-center"><img src="'+source+'" class="img-thumbnail" width = "90px;" height ="90px;"/></p>';
    }

    // show information file upload
    $('#files').on('change',(function(event){
        event.preventDefault();
        var i = 0, reader;
        for( ; i< this.files.length; i++){
            var file = this.files[i];
            if(file.type.match(/image.*/)){
                if(window.FileReader){
                    reader = new FileReader();
                    reader.onloadend = function(e){
                        showUploadImage(e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    }));


});

