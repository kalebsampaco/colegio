<?php 

if( $_SESSION['role'] == 3) {
$pca_controller = new PcaController();
$snt_controller = new SnotaController();
$users_controller = new UsersController();
$cc_controller = new CortesController();
$cc = $cc_controller->get();

$pca = $pca_controller->getdoc($_SESSION['documento']);
$curso = '';

	for ($n=0; $n < count($pca); $n++) { 
		$selected = ($pca[$n]['curso_id']==$_POST["curso"])? ' selected':'';  
		$curso .= '<option value="' . $pca[$n]['curso_id'] .'"'.$selected.'>' . $pca[$n]['curso'] . '</option>';}

$corte = '';

	for ($n=0; $n < count($cc); $n++) { 
		 $selected = ($cc[$n]['corte_id']==$_POST["corte"])? ' selected':''; 
		$corte .= '<option value="' . $cc[$n]['corte_id'] .'">' . $cc[$n]['corte'] . '</option>';}

$template = '<h2 class="p1">Seleccione el curso</h2>
		
	
				<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
					<form action="" method="post">
						<input type="hidden" name="op" value="consultas" />
						<label for="curso">Curso: </label><br>
						<select name="curso" placeholder="Curso" >		
							<option value="">Curso</option>
							%s
						</select>
					
						<input  class="button  add" type="submit" value="Seleccionar">
					</form>
				</div>
		';
	printf($template,
			$curso);

if(isset($_POST['curso'])){
$userg = $users_controller->getcurso($_POST['curso']);

	$snt = $snt_controller->getcurso($_POST['curso']);
	
if( empty($userg) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay notas para este curso y asignatura</p>
		</div>
	');
} 

	$template_users = '
	<div class="item">
	<fieldset>
	<legend>Editar o subir Notas del estudiante</legend>
		<table>
			<tr>
				<th>Documento</th>
				<th>Estudiante</th>
				<th>Curso</th>
			</tr>';

	for ($n=0; $n < count($userg); $n++) { 
		if($userg[$n]['role']==4 && $pca[$n]['documento_profe']==$_SESSION['documento']){
		$template_users .= '
			<tr>
				<td>' . $userg[$n]['documento'] . '</td>
				<td>' . $userg[$n]['nombres'].' '.$userg[$n]['apellidos'].'</td>
				<td>' . $userg[$n]['curso'] . '</td>
				<td><form method="POST">
						<input type="hidden" name="r" value="notas-edit">
						<input type="hidden" name="documento" value="' . $userg[$n]['documento'] . '">
						<input type="hidden" name="curso" value="' . $userg[$n]['curso'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>

				</td>
				<td>
					<form method="POST">
					<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
						<input type="hidden" name="op" value="consultas" />
						<label for="corte">Corte: </label><br>
						<select name="corte" placeholder="Corte" >		
							<option value="">Corte</option>
							'.$corte.'
							
						</select>
					</div>
						<input type="hidden" name="r" value="notas-add">
						<input type="hidden" name="documento" value="' . $userg[$n]['documento'] . '">
						<input type="hidden" name="curso" value="' . $userg[$n]['curso'] . '">
						<input class="button  edit" type="submit" value="Subir Nota">
					</form>
				</td>
			</tr>
		'; }
	}

	$template_users .= '
		</table>
	</fieldset>
	</div>';

	print($template_users);
}
} 