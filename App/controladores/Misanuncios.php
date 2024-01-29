<?php

    class Misanuncios extends Controlador{

        public function __construct(){
            session_start();

            $this->UsuarioModelo = $this->modelo('UsuarioModelo');
        }
        //anunuciosUsuarios
        
        public function index(){

            $this->datos['anuncios'] = $this->UsuarioModelo->anunciosUsuarios();

            $this->datos['municipios'] = $this->UsuarioModelo->idmunicipios();

            
            $this->vista('/Misanuncios/anuncios', $this->datos);
        }

        //modifica un anuncio de alquiler
        public function modificarAnuncio(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $modificarAnuncio = [
                'titulo' => trim($_POST['titulo']),
                'descripcion' => trim($_POST['descripcion']),
                'metros_cuadrados' => trim($_POST['metros_cuadrados']),
                'precio' => trim($_POST['precio']),
                'distribucion' => trim($_POST['distribucion']),
                'caracteristicas' => trim($_POST['caracteristicas']),
                'direccion' => trim($_POST['direccion']),
                'id_oferta' => trim($_POST['id_oferta']),
                'id_municipio' => trim($_POST['id_municipio'])
                ];


                $this->UsuarioModelo->modificarAnuncio($modificarAnuncio);

                redireccionar('/Misanuncios');


            }else{
                echo "error";
                exit;   
            }
        }
    }