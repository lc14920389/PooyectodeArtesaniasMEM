<?php

class ArtesanosView  {

    public function agregar(){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/artesanos_agregar.html"); 
        print Template('Agregar Artesanos')->show($str);
    } 

    

    public function editar($list, $clasificacion){
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/clasificacion_editar.html"); 
        $html = Template($str)->render_regex('LISTADO_CLASIFICACION', $list);
        $html = Template($html)->render($clasificacion);
        print Template('Editar clasificacion')->show($html);
    } 

    public function listar($list=[]) {
        $str = file_get_contents(
            STATIC_DIR . "html/artesanias/clasificacion_listar.html"); 
        $html = Template($str)->render_regex('LISTADO_CLASIFICACION', $list);
        print Template('Listado de clasificacion')->show($html);
    }

}

?>
