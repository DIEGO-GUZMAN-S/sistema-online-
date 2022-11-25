<?php
error_reporting (0);
include 'includes/conecta.php';
/* consulta para el genero  */
$genero = "SELECT * FROM genero"; 
$guardar = $conecta->query($genero);
if(isset($_POST['rejistrar'])){
	$mensaje ="";
	$Nombre = $conecta->real_escape_string($_POST['Nombres']);
	$Apellido1 = $conecta->real_escape_string($_POST['ApellidoP']);
	$Apellido2 = $conecta->real_escape_string($_POST['ApellidoM']);
	$genero = $conecta->real_escape_string($_POST['genero']);
	$gmail = $conecta->real_escape_string($_POST['Gmail']); 
	$idT = "2";
	$nick = $conecta->real_escape_string($_POST['Nickname']);
	$pas = $conecta->real_escape_string($_POST['Password']);
	// se declara la consulta 
	$consulta = "INSERT INTO usuarios (Nombre, ApellidoP, ApellidoM, Id_Genero, Email, Id_Tusuario, Nick, Password) 
	VALUES ('$Nombre','$Apellido1','$Apellido2','$genero','$gmail','$idT','$nick','$pas')";
	$guardarcon = $conecta->query($consulta);
	if($guardarcon < 0){
		$mensaje.= "<h3 class='text-danger'> Tu rejistro no se realizo con exito </h3>";
	}
	else{
		$mensaje.= "<h3 class='text-success'> Tu rejistro se realizo con exito </h3>";
	}
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<title>Registro</title>
</head>
<body>
		<img  src="img/vfast.jpg" alt="Logotipo del Desarrollador" class="text-center" width="15%" height="15%" >
	<!--Es el comiemso del codigo -->
      <div class="container text-center">
			<p class="text-muted py-2"> <h4>Registro de Usuario</h4></p>
			<p class="text-muted py-2">Por favor ingrea los datos que se te piden a continuación</p>
		</div>
         <!--Justificasion -->
         <div class="row justify-content-center h-100 ">
		    <div class="col-sm-8 col-md-6 rounded">
			   <div class="row">
				  <div class="col-sm-10 col-md-12 col-lg-12">

				  	 <!--Formulario-->
                    <form class="needs-validation"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#envelope-fill"/>
                                 </svg>
								
							</span>
							<input type="gmail" name="Gmail" class ="form-control" placeholder ="Gmail" aria-label ="gmail" aria-describedaby="gmail" required>
							<div class="valid-feedback"> Gmail Valido</div>
							<div class="invalid-feedback"> Agregar Gmail</div>

						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#key-fill"/>
                                 </svg>
								
							</span>
							<input type="password" name="Password" id="ver" class ="form-control " placeholder ="Password" aria-label ="pass" aria-describedaby="pass" required>
							<div class="valid-feedback"> Password Valido</div>
							<div class="invalid-feedback"> Agregar Password</div>

						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#journal-text"/>
                                 </svg>
								
							</span>
							<input type="text" name="Nickname" class ="form-control" placeholder ="Nick Name" aria-label ="text" aria-describedaby="text" required>
							<div class="valid-feedback"> Nick Name Valido</div>
							<div class="invalid-feedback"> Ingresa un Nick Name</div>
							
						</div>
                        <div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#journal-bookmark-fill"/>
                                 </svg>
								
							</span>
							<input type="text" name="Nombres" class ="form-control" placeholder ="Nombre(s)" aria-label ="text" aria-describedaby="text" required>
							<div class="valid-feedback"> Nombre(s) Valido(s)</div>
							<div class="invalid-feedback"> Ingresa tu(s) Nombre(s)</div>
							
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#journal-bookmark-fill"/>
                                 </svg>
								
							</span>
							<input type="text" name="ApellidoP" class ="form-control" placeholder ="Apellido Paterno" aria-label ="text" aria-describedaby="text" required>
							<div class="valid-feedback"> Apellido Valido</div>
							<div class="invalid-feedback"> Ingresa tu Apellido</div>

                        </div>
                        <div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#journal-bookmark-fill"/>
                                 </svg>
								
							</span>
							<input type="text" name="ApellidoM" class ="form-control" placeholder ="Apellido Materno" aria-label ="text" aria-describedaby="text" required>
							<div class="valid-feedback"> Apellido Valido</div>
							<div class="invalid-feedback"> Ingresa tu Apellido</div>

						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="registro">
								<svg class="bi" width="32" height="32" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#check2-circle"/>
                                 </svg>
								
							</span>

							<select  type="text" class ="form-control" aria-label ="text" aria-describedaby="text" required class='fomr-control' name='genero'>
								<option value="" >Selecciona un genero</option>
								<?php while($row = $guardar->fetch_assoc()){?>
									<option value="<?php echo $row['Id_Genero']; ?>" ><?php echo $row['NomGenero']; ?></option>
								<?php } ?>
							</select>
						</div>

                        <div name= "rejistrar" class="d-grid gap-2">
                        	<button class="btn btn-outline-danger btn-sm " name= "rejistrar" type="submit" > Inicio </button>
                        </div>

						<div class="container text-center">
							<p class="text-muted text-dark py-0" >ya creaste tu cuenta?... inicia seción <a href="index.php" class="link-dark"> Regresar </a></p>
						</div>
                        

					</form>

                  </div>
				  <?php echo $mensaje;  ?>
    
                </div>
             <div class="row">
						<div class="col">
							<svg class="bi" width="15" height="15" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#facebook"/>
                                 </svg>
                       
                        <svg class="bi" width="15" height="15" fill="currentColor">
                                 <use xlink:href="main/icons/bootstrap-icons.svg#google"/>
                                 </svg> 
							
						</div>
					</div>
             </div>
        </div>
</body>
</html>