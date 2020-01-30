<?php 

$pca = $pca_controller->get();
$asig = '';
	for ($n=0; $n < count($pca); $n++) { 
	$asig .= '<option value="' . $pca[$n]['curso_asig_id'] .'">' . $pca[$n]['asignatura'] . '</option>';}


$template = '
<h2 class="p1">Seleccione Asignatura y curso</h2>
		
	<form action="notas">
				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg4">
				<input type="hidden" name="op" value="consultas" />
					<label for="asig">Asignatura: </label><br>
					<select name="asig" placeholder="Asignatura" >		
						<option value="">Asignatura</option>
						%s
					</select>
				</div>
					<input  class="button  add item  i-b lg-v-top flex-auto ph12  sm6  md3  lg4" type="submit" value="Seleccionar">
					<input type="hidden" name="r" value="select-set">
					</form>
		';
	printf($template,
			$asig);
if($_GET['asig'] !=null){
	$snt = $snt_controller->getasig($_GET['asig']);

	var_dump($snt);
if( empty($snt) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay notas para este curso y asignatura</p>
		</div>
	');
} 

	$template_users = '
	<div class="item">
	<fieldset>
	<legend>Cambios de cursos y materias</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Estudiante</th>
				<th>Año</th>
				<th>Corte</th>
				<th>Logro</th>
				<th>Nota</th>
				<th colspan="2">
					<form method="POST">
						<input type="hidden" name="r" value="notas-add">
						<input class="button  add" type="submit" value="Agregar">
					</form>
				</th>
					
			</tr>';

	for ($n=0; $n < count($snt); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $snt[$n]['notaestu_id'] . '</td>
				<td>' . $snt[$n]['documento_estu'] . '</td>
				<td>' . date("Y", strtotime($snt[$n]['año'])) . '</td>
				<td>' . $snt[$n]['corte'] . '</td>
				<td>' . $snt[$n]['logro'] . '</td>
				<td>' . $snt[$n]['nota'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="notas-edit">
						<input type="hidden" name="notaestu_id" value="' . $snt[$n]['notaestu_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
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