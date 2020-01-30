<?php 
if( $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

$users_controller = new UsersController();
$user = $users_controller->get();

$cr_controller = new CursoController();
$cr = $cr_controller->get();

$as_controller = new AsigController();
$as = $as_controller->get();


$usu = '';

	for ($n=0; $n < count($user); $n++) { 
		if($user[$n]['role'] == 3){
		$usu .= '<option value="' . $user[$n]['documento'] .'">' . $user[$n]['nombres'].' '.$user[$n]['apellidos'] . '</option>';}}

$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		
		$curso .= '<option value="' . $cr[$n]['curso_id'] .'">' . $cr[$n]['curso'] . '</option>';}

$asig = '';

	for ($n=0; $n < count($as); $n++) { 
		
		$asig .= '<option value="' . $as[$n]['id_asig'] .'">' . $as[$n]['asignatura'] . '</option>';}


$template = '
<h2 class="p1">Agregar Asignatura y curso</h2>
		
	<form id="alta-contacto" name="alta_frm"  method="post" class="item" enctype="multipart/form-data"
		<section class="container flex  flex-wrap">
			<div class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="profe">Profesor: </label><br>
					<select name="profe" placeholder="Profesor" >		
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
					<label for="fecha">Año: </label><br>
					<input type="date" id="fecha" class="cambio" name="fecha" title="Año" value="%s" required />
				</div>

				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="asig">Asignatura: </label><br>
					<select name="asig" placeholder="Asignatura" >		
						<option value="">Asignatura</option>
						%s
					</select>
				</div>

			</section>
			<div class="item  i-b lg-v-middle flex-auto ph12  sm6  md2  lg2">
					<input  class="button  add" type="submit" value="Asignar">
					<input type="hidden" name="r" value="asignar-set">
					<input type="hidden" name="crud" value="set">
				</div>
		</form>';
	printf($template,
			$usu,
			$curso,
			date("Y-m-d"),
			$asig);

}

$pca_controller = new PcaController();
$pca = $pca_controller->get();


if( empty($pca) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Cursos ni asignaturas para ningun profesor</p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
	<fieldset>
	<legend>Cambios de cursos y materias</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Profesor</th>
				<th>Curso</th>
				<th>Año</th>
				<th>Asignatura</th>
					
			</tr>';

	for ($n=0; $n < count($pca); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $pca[$n]['curso_asig_id'] . '</td>
				<td>' . $pca[$n]['documento_profe'] . '</td>
				<td>' . $pca[$n]['curso'] . '</td>
				<td>' . date("Y", strtotime($pca[$n]['fecha'])) . '</td>
				<td>' . $pca[$n]['asignatura'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="asignar-edit">
						<input type="hidden" name="curso_asig_id" value="' . $pca[$n]['curso_asig_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="asignar-delete">
						<input type="hidden" name="curso_asig_id" value="' . $pca[$n]['curso_asig_id'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</fieldset>
	</div>';

	print($template_users);
}