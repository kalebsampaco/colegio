<?php 

if($_POST['r'] == 'asignar-set' && $_SESSION['role'] == 2 && $_POST['crud'] == 'set' ) {
	$pca_controller = new PcaController();

	$profe = $_POST["profe"];
	$curso = $_POST["curso"];
	$fecha = $_POST["fecha"];
	$asig= $_POST["asig"];
	
	

	$new_pca = array(
		'id' 	=> 0,
		'profe' =>  $profe, 
		'curso' =>  $curso,
		'fecha' =>  $fecha, 
		'asig' =>  $asig
		);
	
//var_dump($new_pca);
	$pca = $pca_controller->set($new_pca);
	if(!isset($pca)){
		$template = '
			<div class="container">
				<p class="item  add">El curso <b>%s</b> y la asignatura 
				<b>%s</b> Asignados al profesor <b>%s</b></p>
			</div>
			<script>
				window.onload = function () {
					reloadPage("asignar")
				}
			</script>
		';

		printf($template, $curso, $asig, $profe);
	}else
		echo "No se pudo dar de alta al contacto con el documento <b>$documento</b> :(";
}

else {
	$controller = new ViewController();
	$controller->load_view('error401');
}