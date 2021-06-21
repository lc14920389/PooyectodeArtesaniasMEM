
$(document).ready(function (){
    $(".hidden_images").each(function (){
       
        let id= $(this).attr("id");
        $("#divImages_" + id).html('');
        let imagenes = $("#"+ id).val().split(",");
        let imagen="<img src='/uploads/" + imagenes[0] +
             "' " + 
             " id='img_" + id + "'" + 
             " alt='imagen' width='230' height='230'>";
        let btnLeft="<input type='button'  class='btnImages' value='<' tag='0' id='btnLeft_" + id +"'>";
        let btnRight="<input type='button' class='btnImages' value='>' tag='0' id='btnRight_" + id +"'>";
        $("#divImages_" + id).append(btnLeft + imagen + btnRight);
    });
    $(".btnImages").click(function () {       
        let id         = $(this).attr("id");
        let button     = id.split("_");
        let idProducto = button[1];
        let imagenes   = $("#" + idProducto).val().split(",");
        let tag = 0;
        if (button[0]=="btnLeft"){
            tag = $("#" + id).attr("tag") - 1;
            if (tag<0) 
                tag = imagenes.length-1;
            
        }else {
            tag = parseInt($("#" + id).attr("tag"));
            tag = (tag + 1) % imagenes.length;
        }

        $("#btnLeft_" + idProducto).attr("tag",tag);
        $("#btnRight_" + idProducto).attr("tag",tag);
        $("#img_" + idProducto).attr("src","/uploads/"+ imagenes[tag]);
    });

});

