
<?php

importar('apps/artesanias/models/artesanos');
importar('apps/artesanias/views/artesanos');
importar('core/helpers/utilerias');

class ArtesanosController extends Controller  {

    public function agregar(){
        $this->view->agregar();

    }

    public function editar($id=0){

    }


    public function listar($formato){
        $sql="SELECT * FROM artesanos";
        $data = $this->model->query($sql);
        print_r($data);
       
    }

    public function guardar(){
       $id              = $_POST['id']?? 0;
       $nombres         = $_POST['nombres'];
       $primerapellido  = $_POST['primerapellido'];
       $segundoapellido = $_POST['segundoapellido'];
       $domicilio       = $_POST['domicilio'];
       $telefono        = $_POST['telefono'];
       $correo          = $_POST['correo'];
       //--- validar datos

       //--- asociar al modelo
       $this->model->id=$id;
       $this->model->nombres = $nombres;
       $this->model->primerapellido = $primerapellido;
       $this->model->segundoapellido = $segundoapellido;
       $this->model->domicilio = $domicilio;
       $this->model->telefono = $telefono;
       $this->model->correo = $correo;

       $this->model->save();
       //--- 
       HTTPHelper::go("/artesanias/artesanos/listar");
    }

    public function eliminar($id){
        $this->model->delete($id);
        HTTPHelper::go("/artesanias/clasificacion/listar");
    }
    
}

?>
