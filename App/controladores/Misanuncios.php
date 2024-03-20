<?php

    class Misanuncios extends Controlador{
        private $UsuarioModelo;
        private $AnuncioModelo;

        public function __construct(){
            Session::IniciarSesion($this->datos);

            $this->UsuarioModelo = $this->modelo('UsuarioModelo');
            $this->AnuncioModelo = $this->modelo('AnuncioModelo');

        }
        //anunuciosUsuarios
        
        public function index(){

            $this->datos['anuncios'] = $this->UsuarioModelo->anunciosUsuarios();

            $this->datos['anunciosTraspasos'] = $this->UsuarioModelo->anunciosUsuariosTraspasos();

            $this->datos['municipios'] = $this->UsuarioModelo->idmunicipios();

            $this->datos['estados'] = $this->UsuarioModelo->idestados();
            
            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();

            // $this->datos['imagenes'] = $this->AlquilerModelo->ImagenesAlquiler($id);

            // $this->datos['datosinmueble'] = $this->AlquilerModelo->DatosInmueble($id);

            // $this->datos['datosoferta'] = $this->AlquilerModelo->DatosOferta($id);
            
            $this->vista('/Misanuncios/anuncios', $this->datos);

           
        }

        //modifica un anuncio de alquiler
        public function modificarAnuncio(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $modificarAnuncio = [
                //'titulo' => trim($_POST['titulo']),
                'descripcion' => trim($_POST['descripcion']),
                'metros_cuadrados' => trim($_POST['metros_cuadrados']),
                'precio' => trim($_POST['valoradoen']),
                'distribucion' => trim($_POST['distribucion']),
                'caracteristicas' => trim($_POST['caracteristicas']),
                'equipamiento' => trim($_POST['equipamiento']),
                'direccion' => trim($_POST['direccion']),
                'id_estado' => trim($_POST['id_estado']),
                'id_municipio' => trim($_POST['id_municipio']),
                'id_inmueble' => trim($_POST['id_inmueble']),
                'num_habitaciones' => trim($_POST['num_habitaciones']),
                'tipo_vivienda' => trim($_POST['tipo_vivienda']),
                'id_vivienda' => trim($_POST['id_vivienda']),
                ];

                $this->UsuarioModelo->modificarAnuncio($modificarAnuncio);

                redireccionar('/Misanuncios');

            }else{
                echo "error";
                exit;   
            }
        }

        public function modificarAnuncioOferta(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $modificarAnuncioOferta = [
                'titulooferta' => trim($_POST['titulooferta']),
                'iniciooferta' => trim($_POST['iniciooferta']),
                'finoferta' => trim($_POST['finoferta']),
                'precio_oferta' => trim($_POST['precio_oferta']),
                'condicionesoferta' => trim($_POST['condicionesoferta']),
                'descripcionoferta' => trim($_POST['descripcionoferta']),
                'id_oferta' => trim($_POST['id_oferta'])
                ];

                $this->UsuarioModelo->modificarAnuncioOferta($modificarAnuncioOferta);

                redireccionar('/Misanuncios');

            }else{
                  
            }
        }

        public function modificarAnuncioOfertaNegocio(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $modificarAnuncioOfertaNegocio = [
                'titulo_negocio' => trim($_POST['titulo_negocio']),
                'motivo_traspaso_negocio' => trim($_POST['motivo_traspaso_negocio']),
                'coste_traspaso_negocio' => trim($_POST['coste_traspaso_negocio']),
                'coste_mensual_negocio' => trim($_POST['coste_mensual_negocio']),
                'descripcion_negocio' => trim($_POST['descripcion_negocio']),
                'capital_minimo_negocio' => trim($_POST['capital_minimo_negocio']),
                'id_inmueble' => trim($_POST['id_inmueble']),
                'id_negocio' => trim($_POST['id_negocio'])

                ];

                $this->UsuarioModelo->modificarAnuncioOfertaNegocio($modificarAnuncioOfertaNegocio);

                redireccionar('/Misanuncios');

            }else{
                  
            }
        }

        public function modificarAnuncioOfertaLocal(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                $modificarAnuncioOfertaLocal = [
                'nombre_local' => trim($_POST['nombre_local']),
                'capacidad_local' => trim($_POST['capacidad_local']),
                'recursos_local' => trim($_POST['recursos_local']),
                'id_inmueble' => trim($_POST['id_inmueble'])

                ];

                $this->UsuarioModelo->modificarAnuncioOfertaLocal($modificarAnuncioOfertaLocal);

                redireccionar('/Misanuncios');

            }else{
                  
            }
        }

        public function eliminarAnuncio(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $eliminarAnuncio = [
                    'id_oferta' => $_POST['id_oferta']
                ];
                            
                $this->UsuarioModelo->eliminarAnuncio($eliminarAnuncio);

                redireccionar('/Misanuncios');


            }else{

            }
            
        }

        public function subirAnuncio(){

            $this->vista('/Subiranuncios/subiranuncio', $this->datos);
        }

        public function anuncioInmueble(){
            $this->datos['municipios'] = $this->UsuarioModelo->idmunicipios();

            $this->datos['estados'] = $this->UsuarioModelo->idestados();

            $this->datos['entidades'] = $this->UsuarioModelo->identidad();

            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();


            $this->vista('/Subiranuncios/subirInmueble', $this->datos);
        
        }

        public function cargarDatosInmueble() {
            try {
                $anuncios = $this->UsuarioModelo->anunciosUsuarios();
                $this->vistaApi($anuncios);
            } catch (Exception $e) {
                // En caso de error, devolver un mensaje de error con un código de estado 500
                http_response_code(500);
                echo json_encode(array('error' => 'Ocurrió un error al cargar los datos del inmueble.'));
            }
        }
        

        public function anuncioTraspaso(){

            $this->datos['municipios'] = $this->UsuarioModelo->idmunicipios();

            $this->datos['estados'] = $this->UsuarioModelo->idestados();

            $this->datos['entidades'] = $this->UsuarioModelo->identidad();

            $this->datos['noti']  = $this->UsuarioModelo->NumeroNotificacionesActivas();


            $this->vista('/Subiranuncios/subirTraspaso', $this->datos);

        }

        public function subirAnunciobd(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $imagenes = $_FILES['fotos_inmueble'];
                $rutas_de_imagenes = [];
                $info_imagenes = [];
               
                $dni = $this->datos['UsuarioSesion']->nif;
               
                $id_inmueble = $this->AnuncioModelo->obtenerUltimoIdInmueble();
                $ultimo_id_objeto = $id_inmueble[0];
                $ultimo_id = $ultimo_id_objeto->ultimo_id;
               
                $nuevo_id = $ultimo_id + 1;
               
          
                $ruta_base_bd = RUTA_IMMUEBLESBD;


                $directorio_inmueble = RUTA_IMMUEBLES.$dni .'/'. $nuevo_id . '/';
                if (!file_exists($directorio_inmueble)) {
                    mkdir($directorio_inmueble, 0777, true);
                }
       
                foreach ($imagenes['tmp_name'] as $key => $archivoTemporal) {
                    $nombreArchivo = $imagenes['name'][$key];
                    $archivoTemporal = $imagenes['tmp_name'][$key];
                    $nombre_final = uniqid() . '_' . $nombreArchivo;
       
                    if (move_uploaded_file($archivoTemporal, $directorio_inmueble . $nombre_final)) {
                        $rutas_de_imagenes[] = $nombre_final;
                        $info_imagenes[] = [
                            'nombre' => $nombreArchivo,
                            'formato' => $_FILES['fotos_inmueble']['type'][$key],
                            'ruta' => $ruta_base_bd . $dni . '/' . $nuevo_id . '/' . $nombre_final
                        ];
                    } else {
                       echo ("ha ocurrido un error al subir las imagenes");
                    }
                }

       
                $subirAnunciobd = [
                    'titulo' => trim($_POST['titulo']),
                    'inicio_oferta' => trim($_POST['inicio_oferta']),
                    'fin_oferta' => trim($_POST['fin_oferta']),
                    'condiciones_oferta' => trim($_POST['condiciones_oferta']),
                    'descripcion_oferta' => trim($_POST['descripcion_oferta']),
                    'precio_oferta' => trim($_POST['precio_oferta']),
                    'metros_cuadrados_inmueble' => trim($_POST['metros_cuadrados_inmueble']),
                    'distribucion_inmueble' => nl2br(trim($_POST['distribucion_inmueble'])),
                    'equipamiento_inmueble' => nl2br(trim($_POST['equipamiento_inmueble'])),
                    'descripcion_inmueble' => nl2br(trim($_POST['descripcion_inmueble'])),
                    'precio_inmueble' => trim($_POST['precio_inmueble']),
                    'direccion_inmueble' => trim($_POST['direccion_inmueble']),
                    'caracteristicas_inmueble' => nl2br(trim($_POST['caracteristicas_inmueble'])),
                    //'latitud_inmueble' => trim($_POST['latitud_inmueble']),
                    //'longitud_inmueble' => trim($_POST['longitud_inmueble']),
                    'municipio' => trim($_POST['municipio']),
                    'estado' => trim($_POST['estado']),
                    'id_entidad' => $_POST['id_entidad'],
                    'crear_id_entidad' => $_POST['crear_id_entidad'],
                    'imagenes' => $info_imagenes,
                    'nombre_local' => trim($_POST['nombre_local']),
                    'capacidad_local' => trim($_POST['capacidad_local']),
                    'recursos_local' => trim($_POST['recursos_local']),
                    'num_habitaciones' => trim($_POST['num_habitaciones']),
                    'tipo_vivienda' => trim($_POST['tipo_vivienda']),
                ];


               
               
                $this->AnuncioModelo->subirAnunciobd($subirAnunciobd);
                $this->AnuncioModelo->addNotificacionReserva();



                redireccionar('/Misanuncios');
               
            }
        }




        public function subirTraspasobd(){

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $imagenes = $_FILES['fotos_inmueble'];
                $rutas_de_imagenes = [];
                $info_imagenes = [];
               
                $dni = $this->datos['UsuarioSesion']->nif;
               
                $id_inmueble = $this->AnuncioModelo->obtenerUltimoIdInmueble();
                $ultimo_id_objeto = $id_inmueble[0];
                $ultimo_id = $ultimo_id_objeto->ultimo_id;
               
                $nuevo_id = $ultimo_id + 1;
               
          
                $ruta_base_bd = RUTA_IMMUEBLESBD;


                $directorio_inmueble = RUTA_IMMUEBLES.$dni .'/'. $nuevo_id . '/';
                if (!file_exists($directorio_inmueble)) {
                    mkdir($directorio_inmueble, 0777, true);
                }
       
                foreach ($imagenes['tmp_name'] as $key => $archivoTemporal) {
                    $nombreArchivo = $imagenes['name'][$key];
                    $archivoTemporal = $imagenes['tmp_name'][$key];
                    $nombre_final = uniqid() . '_' . $nombreArchivo;
       
                    if (move_uploaded_file($archivoTemporal, $directorio_inmueble . $nombre_final)) {
                        $rutas_de_imagenes[] = $nombre_final;
                        $info_imagenes[] = [
                            'nombre' => $nombreArchivo,
                            'formato' => $_FILES['fotos_inmueble']['type'][$key],
                            'ruta' => $ruta_base_bd . $dni . '/' . $nuevo_id . '/' . $nombre_final
                        ];
                    } else {
                       echo ("ha ocurrido un error al subir las imagenes");
                    }
                }

                $subirTraspasobd = [
                    'titulo_oferta' => trim($_POST['titulo_oferta']),
                    'inicio_oferta' => trim($_POST['inicio_oferta']),
                    'fin_oferta' => trim($_POST['fin_oferta']),
                    'precio_inm' => nl2br(trim($_POST['precio_oferta'])),
                    'condiciones_oferta' => nl2br(trim($_POST['condiciones_oferta'])),
                    'descripcion_oferta' => nl2br(trim($_POST['descripcion_oferta'])),
                    'titulo_negocio' => trim($_POST['titulo_negocio']),
                    'motivo_traspaso_negocio' => nl2br(trim($_POST['motivo_traspaso_negocio'])),
                    'coste_traspaso_negocio' => trim($_POST['coste_traspaso_negocio']),
                    'coste_mensual_negocio' => trim($_POST['coste_mensual_negocio']),
                    'descripcion_negocio' => nl2br(trim($_POST['descripcion_negocio'])),
                    'capital_minimo_negocio' => trim($_POST['capital_minimo_negocio']),
                    'metros_cuadrados_inmueble' => trim($_POST['metros_cuadrados_inmueble']),
                    'descripcion_inmueble' => nl2br(trim($_POST['descripcion_inmueble'])),
                    'distribucion_inmueble' => nl2br(trim($_POST['distribucion_inmueble'])),
                    'precio_inmueble' => trim($_POST['precio_inmueble']),
                    'direccion_inmueble' => trim($_POST['direccion_inmueble']),
                    'caracteristicas_inmueble' => nl2br(trim($_POST['caracteristicas_inmueble'])),
                    'equipamiento_inmueble' => nl2br(trim($_POST['equipamiento_inmueble'])),
                    //'latitud_inmueble' => trim($_POST['latitud_inmueble']),
                    //'longitud_inmueble' => trim($_POST['longitud_inmueble']),
                    'municipio' => trim($_POST['municipio']),
                    'estado' => trim($_POST['estado']),
                    'nombre_local' => trim($_POST['nombre_local']),
                    'capacidad_local' => trim($_POST['capacidad_local']),
                    'recursos_local' => trim($_POST['recursos_local']),
                    'imagenes' => $info_imagenes,
                    'id_entidad' => $_POST['id_entidad'],
                    'crear_id_entidad' => $_POST['crear_id_entidad']
                    
                    ];

                
                $this->AnuncioModelo->subirTraspasobd($subirTraspasobd);
                $this->AnuncioModelo->addNotificacionReservaTraspasobd();


                redireccionar('/Misanuncios');

            }
        }

    }