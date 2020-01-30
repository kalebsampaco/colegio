<?php 
if($_POST['r'] == 'user-edit' && ($_SESSION['role'] == 1 or $_SESSION['role'] == 2) && $_POST['crud'] == 'set' ) {

$users_controller = new UsersController();
	$documento = $_POST["documento"];
	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$curso = $_POST["curso"];
	$acudiente = $_POST["acudiente"];
	$direccion = $_POST["direccion"];
	$estudios = $_POST["estudios"];
	$experiencia = $_POST["experiencia"];
	$referencias = $_POST["referencias"];
	$nacimiento = $_POST["nacimiento"];
	$sexo = $_POST["sexo"];
	$status = $_POST["status"];
	$fecha_ingreso = $_POST["fecha_ingreso"];
	$role = $_POST["role"];
	$pass = $_POST["pass"];
	$cargo = $_POST["cargo"];


	$imagen_generica = ($sexo=="M")?"amigo.png":"amiga.png";
	

/*	echo $documento.'-'.$nombres.'-'.$apellidos.'-'.$curso.'-'.$acudiente.'-'.$direccion.'-'.$estudios.'-'.$experiencia.'-'.$referencias.'-'.$nacimiento.'-'.$sexo.'-'.$status.'-'.$fecha_ingreso.'-'.$role.'-'.$pass.'-'.$cargo;*/
	
	
	
		include("funciones.php");
	$tipo = $_FILES["foto"]["type"];
	$archivo = $_FILES["foto"]["tmp_name"];
	$se_subio_imagen = subir_imagen($tipo,$archivo,$documento);

	//Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica, sino entonces el nombre de la foto que se subio.
	$imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;
	

	$new_user = array(
		'documento' =>  $documento, 
		'nombres' =>  $nombres, 
		'apellidos' =>  $apellidos,
		'curso' =>  $curso,
		'acudiente' =>  $acudiente, 
		'direccion' =>  $direccion,
		'estudios' =>  $estudios, 
		'experiencia' =>  $experiencia, 
		'referencias' =>  $referencias,
		'nacimiento' =>  $nacimiento,
		'sexo' =>  $sexo,
		'status' =>  $status,
		'fecha_ingreso' =>  $fecha_ingreso,
		'role' =>  $role,    
		'pass' =>  $pass,
		'cargo' =>  $cargo,
		'imagen' =>  $imagen 
		
	);
	

	$user = $users_controller->set($new_user);
	if(!isset($user)){
		$template = '
			<div class="container">
				<p class="item  add">Usuario <b>%s</b> salvado</p>
			</div>
			<script>
				window.onload = function () {
					reloadPage("cambiar")
				}
			</script>
		';

		printf($template, $documento);
	}else
		echo "No se pudo dar de alta al contacto con el documento <b>$documento</b> :(";

}
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}