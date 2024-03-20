<?php cabecera($this->datos); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #mi_mapa {
        height: 400px;
        width: 600px;
    }
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <form action="/Servicio/Resena" method="POST">

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <select name="municipio" id="selectMunicipio" onchange="ServiciosAPI(this.value)" class="form-select"
                aria-label="SELECCIONA UN MUNICIPIO" required>
                <?php foreach ($datos['municipios'] as $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>">
                        <?php echo $municipio->nombre_municipio ?>
                    </option>
                <?php endforeach ?>
            </select>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Servicio</th>
                    </tr>
                </thead>
                <tbody id="contenido">
                </tbody>
            </table>
                    
            <!-- <button type="button" onclick="previousPage()"><<</button>
            <button type="button" onclick="nextPage()">>></button> -->
            <button type="button" id="previousButton" style="display: none" onclick="previousPage()"><<</button>
            <button type="button" id="nextButton" style="display: none" onclick="nextPage()">>></button>


        </div>
        <div class="col-xl-6 d-flex justify-content-center">
            <div id="mi_mapa">
            
            </div>
        </div>
        
    </div>

    
    <div class="row p-3">
        <div class=" col-xl-6 ">
            <div id="resenas"></div>
        </div>
        <div class=" col-xl-6 ">
            <?php 
                if(Session::ComprobarSesion() == true){
                    ?>
                    <div class="">
                    <h3>Di tu opinion sobre el pueblo!</h3>
                    <!-- <select name="municipio" id="selectMunicipio" class="form-select"
                        aria-label="SELECCIONA UN MUNICIPIO">
                        <option value="0" selected>SELECCIONA UN MUNICIPIO</option>
                        <?php foreach ($datos['municipios'] as $municipio): ?>
                            <option value="<?php echo $municipio->id_municipio ?>">
                                <?php echo $municipio->nombre_municipio ?>
                            </option>
                        <?php endforeach ?>
                    </select> -->

                    <div class="row">
                        <div class="col-xl-3">
                        
                            <p class="clasificacion ">
                            <p>
                                <input id="rat5" name="rate" value="1" type="radio" class="star"  required/>
                                <label class="star" for="rat5">★☆☆☆☆</label>
                            </p>
                            <p>
                                <input id="rat4" name="rate" value="2" type="radio" class="star"  required/>
                                <label class="star" for="rat4">★★☆☆☆</label>
                            </p>
                            <p>
                                <input id="rat3" name="rate" value="3" type="radio" class="star"  required/>
                                <label class="star" for="rat3">★★★☆☆</label>
                            </p>
                            <p>
                                <input id="rat2" name="rate" value="4" type="radio" class="star" required/>
                                <label class="star" for="rat2">★★★★☆</label>
                            </p>
                            <p>
                                <input id="rat1" name="rate" value="5" type="radio" class="star" required/>
                                <label class="star" for="rat1">★★★★★</label>
                            </p>

                            </p>
                        </div>
                     
                        <div class="col-xl-9">
                        <textarea name="resena" id="resena" class="form-control" rows="6" required></textarea>
                        <input class="btn btn-success mt-2" type="submit" value="Enviar">
                        </form>
                    </div>   
                    <?php
                    //echo "La sesion esta iniciada";
                }else{
                    //echo "La sesion no esta iniciada";
                }
            ?>

            

        </div>
    </div>
</div>

</div>
</div>

<!-- prettier-ignore -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="">
  
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo RUTA_URL ?>/js/AsincronoServicios.js"></script>
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>   