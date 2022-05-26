<?php require_once 'layouts/nav.html'; 
      require_once 'api.php'; ?>
<?php  $films =  Api::showFilms(); ?>

    <div class="container p-3">

      <div class="row vista" id="films">
        <?php foreach($films as $film):  ?>  
          
          <div class="col-sm-4 p-2">
            <div class="card border-light mb-3" style="max-width: 18rem; text-align: center;">
              <div class="card-header bg-dark text-white">Película</div>
              <div class="card-body  text-dark">
                <h5 class="card-title"><a id="txt" href="" onclick="pageCall('detail'); "><?php echo $film->title;?></a></h5>
                <h6 class="card-title">
                  Director: <?php echo $film->director; ?>
                </h6>
                <p class="card-text">Episodio: <?php echo $film->episode_id; ?></p>
                <p class="card-text" style="color:red;"><?php echo $film->release_date; ?> </p>
              </div>
              <div class="card-footer bg-dark"></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="vista text-center" id="detail">
        <h3 class="">Detalle de la película</h3>
        <div class="row p-2">
          <div class="col-sm-6 p-2">
            <div class="card w-75 offset-1">
              <div class="card-header text-white bg-danger text-center" >
                Naves:
              </div>
              <div class="card-body ">
                <p class="card-title">
                  <?php echo $film->starships[0];?> 
                  </br> <?php echo $film->starships[1]; ?>
                  </br> <?php echo $film->starships[2];?> 
                  </br> <?php echo $film->starships[3];?>
                  </br> <?php echo $film->starships[4];?> 
                  </br> <?php echo $film->starships[5];?>
              </p> 
              </div>
            </div>
          </div>
       

       
        <div class="col-sm-6 p-2 ">
          <div class="card w-75 offset-1">
            <div class="card-header text-white bg-danger text-center" >
              Personajes:
            </div>
            <div class="card-body">
              <p class="card-title">
                <?php echo $film->characters[0];?> 
                </br> <?php echo $film->characters[1];?> 
                </br> <?php echo $film->characters[2];?> 
                </br> <?php echo $film->characters[3];?>
                </br> <?php echo $film->characters[4];?> 
                </br> <?php echo $film->characters[5];?>
              </p> 
            </div>
          </div>
        </div>

        <div class="col-sm-6 p-2 offset-3">
          <div class="card w-75 offset-1">
            <div class="card-header text-white bg-danger text-center" >
              Planetas:
            </div>
            <div class="card-body">
              <p class="card-title">
                  <?php echo $film->planets[0];?> 
                </br> <?php echo $film->planets[1];?> 
                </br> <?php echo $film->planets[2];?> 
                </br> <?php echo $film->planets[3];?>
                </br> <?php echo $film->planets[4];?> 
                </br> <?php echo $film->planets[5];?>
              </p> 
            </div>
          </div>
        </div>
        </div>
      </div>


      <div class="vista" id="formulario">
        <div class="container p-4">
          <div class="row">
            <div class="card border-danger w-75 offset-1">
              <div class="card-header text-center text-white bg-danger">
                  Formulario
              </div>
              <div class="card-body border-2">
                <form class="row g-1" id="form-id">
                  <div class="mb-3 row p-1">
                    <input type="text" class="form-control border-danger" id="nombre" onchange="validate()" placeholder="Nombre" required>
                    <span class="spanColor" id="errorLetter">Introduzca solo letras</span>
                  </div>
                  <div class="mb-3 row p-1">
                    <input type="text" class="form-control border-danger" id="apellidos" onchange="validate()" placeholder="Apellidos">
                    <span class="spanColor" id="errorAp">Introduzca solo letras</span>
                  </div>
                  <div class="mb-3 row p-1">
                    <label for="fecha">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control border-danger" id="fecha" onchange="validate()" placeholder="Fecha de Nacimiento">
                    <span class="spanColor" id="errorMa">No es mayor edad</span>
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" id="btn-send" class="btn btn-danger btn-end">Guardar</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-muted bg-danger" > </div>
            </div>
          </div>
        </div>        
      </div>

    </div>

<script type="text/javascript">
  function validate(){
    //  $(".btn-end").hide();
    var nombre, ap, fecha = false ;
    var name    = document.getElementById('nombre').value;
    var surname = document.getElementById('apellidos').value;
    var fecha   = document.getElementById('fecha').value;

    var result  = /^[a-zA-Z]'?([a-zA-Z]|\.| |-)+$/.test(name);
    var result1 = /^[a-zA-Z]'?([a-zA-Z]|\.| |-)+$/.test(surname);

    if(result){
      nombre = true;
      $("#errorLetter").hide();
    }else{
      nombre = false;
      $("#errorLetter").show();
    }

    if(result1){
      ap = true;
      $("#errorAp").hide();
    }else{
      ap = false;
      $("#errorAp").show();
    }

    
    var hoy = new Date();
    var cumpleanos = new Date(fecha);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

      if(edad > 18){
          fecha = true;
          $("#errorMa").hide();
      }else{
        fecha = false;
        $("#errorMa").show();
      }

      if(nombre && fecha && ap){
        $(".btn-end").show();
      }
    }


const taskForm = document.getElementById('form-id');
taskForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const nombre =  taskForm['nombre'].value;
    const fecha  =  taskForm['fecha'].value
    const ap     =  taskForm['apellidos'].value;

    console.log(nombre, ap, fecha);
    taskForm.reset();
    
});

</script>

<?php require_once 'layouts/footer.html'; ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>