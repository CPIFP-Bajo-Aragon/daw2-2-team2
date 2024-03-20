<?php cabecera($this->datos); ?>

<div class="mx-auto p-5">

<!--Migas de pan-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Inicio</a></li> 
          <!-- <li class="breadcrumb-item"><a href="#">Viviendas</a></li> -->
          <li class="breadcrumb-item active" aria-current="page">Alquiler</li>
        </ol>
      </nav>
<!--Migas de pan-->
<!-- Filtros -->
  <div class="row">
    <div class="col-3">
      <div class="input-group mb-3">
        <input id="buscador" type="text" class="form-control col-4" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-button" oninput="buscar()">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mt-2">
      <select class="form-select"  name="Filtro" id="filtroselect" onchange="ordenarMunicipio(this.value)">
      <?php foreach ($datos['municipios'] as $municipio): ?>
                    <option value="<?php echo $municipio->id_municipio ?>">
                        <?php echo $municipio->nombre_municipio ?>
                    </option>
                <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-6 mt-2">
      <select class="form-select"  name="Filtro1" id="filtroselect1" onchange="ordenar(this.value)">
          <option value="1">Precio Mayor</option>
          <option value="2">Precio Menor</option>
          <option value="3">Mas reciente</option>
          <option value="4">Mas antigua</option>
      </select>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-md-6">
      <label for="price" class="form-label">Rango de precios</label>
      <input
        class="form-range"
        type="range"
        name="price"
        id="price"
        min="50"
        max="5000"
        step="25"
        value="0"
        oninput="ordenarPorPrecio(this.value)">
      <!-- <output class="price-output" for="price"></output> -->
    </div>
    <div class="col-md-6 d-flex align-items-end mb-2">
      <output class="price-output" for="price"></output>
    </div>
  </div>
      

  <div class="spinner-border m-5" role="status" id="spiner" style="width: 3rem; height: 3rem;">
    <span class="visually-hidden">Loading...</span>
  </div>

<?php 

//No se puede hacer con $_datos['UsuarioSesion']
$sesion = "";
if (isset($datos['UsuarioSesion'])) {
  $sesion =   $datos['UsuarioSesion']->id_usuario;
}
?>



<!-- Filtros -->
<div id="contenidoload" class="d-none"> 

<div id="contenido" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4"> </div>

</div>




<script>
function ready() {
    mostrar();
}

  document.addEventListener("DOMContentLoaded", ready);

function mostrar() {
    var cont = document.getElementById('contenidoload'); 
    cont.setAttribute("class", "d-block"); 
    var cont = document.getElementById('spiner'); 
    cont.setAttribute("class", "d-none"); 
}


const sesion =  "<?php echo  $sesion ?>";
console.log(sesion);

window.onload = function() {
  ordenar(0);
};
</script>

</div>    
  

<script src="<?php echo RUTA_URL ?>/js/AsincronoAlquileres.js"></script>
<script src="https://unpkg.com/jcrop"></script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

