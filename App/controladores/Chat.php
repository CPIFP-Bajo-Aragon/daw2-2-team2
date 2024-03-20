<?php

class Chat extends Controlador {
    private $ChatModelo;
    private $UsuarioModelo;
    public $datos;

    public function __construct(){
        $this->ChatModelo = $this->modelo('ChatModelo');
        $this->UsuarioModelo = $this->modelo('UsuarioModelo');

    }
    public function index(){

        //Inicia la sesion
        Session::IniciarSesion($this->datos);
        $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();
        $this->datos['chatsActivos']  = $this->ChatModelo->chatsActivos($this->datos['UsuarioSesion']->id_usuario);
        $this->vista('Chat/chat', $this->datos);
    

    }
    public function mensajes($id){
        $this->datos['mostrarMensajes']  = $this->ChatModelo->mostrarmensajes($id);
        $this->vistaAPI($this->datos['mostrarMensajes']);


    }
    public function Inicio($variable){

    $this->datos['chatactivo'] =  descifrar_url_aes($variable);
    $this->datos['usuario'] = $this->ChatModelo->usuariochat($this->datos['chatactivo']);

    Session::IniciarSesion($this->datos);
    $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();

    $this->datos['chatsActivos']  = $this->ChatModelo->chatsActivos($this->datos['UsuarioSesion']->id_usuario);
    $this->vista('Chat/chat', $this->datos);


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
        $mensaje = $_POST['mensaje'];
        $this->ChatModelo->mandarMensaje($this->datos['chatactivo'], $mensaje);
        $this->ChatModelo->addNoti($this->datos['chatactivo'], $this->datos['UsuarioSesion']->nombre_usuario." ".$this->datos['UsuarioSesion']->apellidos_usuario);

        
    };

}
}