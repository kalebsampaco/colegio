<?php 
if( $_POST['r'] == 'asignar-edit' && $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

			$pca_controller = new PcaController();
			$pca = $pca_controller->get($_POST['curso_asig_id']);
			$cr_controller = new CursoController();
			$cr = $cr_controller->get();
			$as_controller = new AsigController();
			$as = $as_controller->get();	
			$users_controller = new UsersController();
			$user = $users_controller->get();

			$registro = array();
foreach ($pca as $row) {
						$registro['curso_asig_id'] = $row['curso_asig_id'];
						$registro['documento_profe'] = $row['documento_profe'];
						$registro['curso'] = $row['curso'];
						$registro['año'] = $row['año'];
						$registro['asignatura'] = $row['asignatura'];
						}

$usu = '';

	for ($n=0; $n < count($user); $n++) { 
		if($user[$n]['role'] == 3){
			$selected = ($user[$n]['documento'] == $registro['documento_profe']) ? 'selected' : '';
		$usu .= '<option value="' . $user[$n]['documento'] .'"'.$selected.'>' . $user[$n]['nombres'].' '.$user[$n]['apellidos'] . '</option>';}}

$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		$selected = ($cr[$n]['curso_id'] == $registro['curso']) ? ' selected' : '';
		$curso .= '<option value="'.$cr[$n]['curso_id'].'"'.$selected.'>' . $cr[$n]['curso'] . '</option>';}
$asig = '';

	for ($n=0; $n < count($as); $n++) { 
		$selected = ($as[$n]['id_asig'] == $pca[$n]['asignatura']) ? ' selected' : '';
		$asig .= '<option value="' . $as[$n]['curso_asig_id'] .'"'.$selected.'>' . $as[$n]['asignatura'] . '</option>';}


		if( empty($pca) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Cursos, ni asignaturas </p>
		</div>
			');
		} else{
			$template_curso = '
		
		<h2 class="p1">Editar Cursos y asignaturas</h2>
		<form method="POST" class="item">
			<div class="p_25">
			<label for="profe">ID: </label><br>
				<input type="text" name="curso_asig_id" placeholder="id" value="%s"required>
				<input type="hidden" name="curso_asig_id" value="%s">
			</div>
			<div class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="profe">Profesor: </label><br>
					<select name="documento_profe" placeholder="Profesor" >		
						<option value="">Profesor</option>
						%s
					</select>
				</div>
				<div class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="curso">Curso: </label><br>
					<select name="curso" placeholder="Curso" >		
						<option value="">Curso</option>
						%s
					</select>
				</div>

				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="year">Año: </label><br>
					<input type="date" id="year" class="cambio" name="year" title="Año" value="%s" required />
				</div>

				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="asig">Asignatura: </label><br>
					<select name="asig" placeholder="Asignatura" >		
						<option value="">Asignatura</option>
						%s
					</select>
				</div>

			<div class="p_25">
				<input  class="button  add" type="submit" value="Editar">
				<input type="hidden" name="r" value="asignar-edit">
				<input type="hidden" name="crud" value="set">
				
			</div>
		</form>';
		printf($template_curso,
			$pca[0]['curso_asig_id'],
			$pca[0]['curso_asig_id'],
			$usu,
			$curso,
			$pca[0]['año'],
			$asig);


	}}else if($_POST['r'] == 'asignar-edit' && $_SESSION['role'] == 2 && $_POST['crud'] == 'set' ) {

	$pca_controller = new PcaController();
	$id = $_POST["curso_asig_id"];
	$profe = $_POST["documento_profe"];
	$curso = $_POST["curso"];
	$year = $_POST["year"];
	$asig= $_POST["asig"];
	
	

	$new_pca = array(
		'id' 	=> $id,
		'profe' =>  $profe, 
		'curso' =>  $curso,
		'year' =>  $year, 
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