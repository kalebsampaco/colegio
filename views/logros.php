<?php 

$log_controller = new LogController();

$cc_controller = new CortesController();
$cc = $cc_controller->get();
$pca_controller = new PcaController();
$pca = $pca_controller->getdoc($_SESSION['documento']);
$curso = '';

	for ($n=0; $n < count($pca); $n++) { 
		$selected = ($pca[$n]['curso_asig_id']==$_POST["curso"])? ' selected':'';  
		$curso .= '<option value="' . $pca[$n]['curso_asig_id'] .'"'.$selected.'>' . $pca[$n]['curso'] . '</option>';}

$corte = '';

	for ($n=0; $n < count($cc); $n++) { 
		$selected = ($cc[$n]['corte_id']==$_POST["corte"])? ' selected':'';  
		$corte .= '<option value="' . $cc[$n]['corte_id'] .'"'.$selected.'>' . $cc[$n]['corte'] . '</option>';}

$template = '<h2 class="p1">Seleccione el curso o el corte</h2>
		
				<form action="" method="post">
					<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
						<input type="hidden" name="op" value="consultas" />
						<label for="curso">Curso: </label><br>
						<select name="curso" placeholder="Curso" >		
							<option value="">Curso</option>
							%s
						</select>
					</div>
					<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
						<label for="corte">Corte: </label><br>
						<select name="corte" placeholder="Corte" >		
							<option value="">Corte</option>
							%s
						</select>
					</div>
					<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
						<input  class="button  add" type="submit" value="Seleccionar">
					</div>
					</form>
				
		';
	printf($template,
			$curso,
			$corte);

	$curso_slc = $_POST['curso'];
	$corte_slc = $_POST['corte'];
echo $curso_slc.'_curso <br>';
echo $corte_slc.'_corte <br>';
if(empty($curso_slc)&&empty($corte_slc)){
$log = $log_controller->get($_SESSION['documento']);

if( empty($log) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay logros asignados</p>
		</div>
	');}
	$template_users = '
	<div class="item">
	<fieldset>
	<legend>Logros</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Asignatura</th>
				<th>curso</th>
				<th>Logro</th>
				<th>Corte</th>
					<th colspan="2">
					<form method="POST">
						<input type="hidden" name="r" value="logros-add">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($log); $n++) { 

		$template_users .= '
			<tr>
				<td>' . $log[$n]['id_logro'] . '</td>
				<td>' . $log[$n]['asignatura'] . '</td>
				<td>' . $log[$n]['curso'] . '</td>
				<td>' . $log[$n]['logro'] . '</td>
				<td>' . $log[$n]['corte'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="logros-edit">
						<input type="hidden" name="id_logro" value="' . $log[$n]['id_logro'] . '">
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
}else if(!empty($curso_slc)){
$log = $log_controller->getcurso($curso_slc);
if( empty($log) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay logros asignados</p>
		</div>
	');}

$template_users = '
	<div class="item">
	<fieldset>
	<legend>Logros</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Asignatura</th>
				<th>curso</th>
				<th>Logro</th>
				<th>Corte</th>
					<th colspan="2">
					<form method="POST">
						<input type="hidden" name="r" value="logros-add">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($log); $n++) { 
		
		$template_users .= '
			<tr>
				<td>' . $log[$n]['id_logro'] . '</td>
				<td>' . $log[$n]['asignatura'] . '</td>
				<td>' . $log[$n]['curso'] . '</td>
				<td>' . $log[$n]['logro'] . '</td>
				<td>' . $log[$n]['corte'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="logros-edit">
						<input type="hidden" name="id_logro" value="' . $log[$n]['id_logro'] . '">
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

}else if(!empty($_POST['corte'])){
$log = $log_controller->getcurso($_POST['corte']);
if( empty($log) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay logros asignados</p>
		</div>
	');}

$template_users = '
	<div class="item">
	<fieldset>
	<legend>Logros</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Asignatura</th>
				<th>curso</th>
				<th>Logro</th>
				<th>Corte</th>
					<th colspan="2">
					<form method="POST">
						<input type="hidden" name="r" value="logros-add">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($log); $n++) { 
		
		$template_users .= '
			<tr>
				<td>' . $log[$n]['id_logro'] . '</td>
				<td>' . $log[$n]['asignatura'] . '</td>
				<td>' . $log[$n]['curso'] . '</td>
				<td>' . $log[$n]['logro'] . '</td>
				<td>' . $log[$n]['corte'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="logros-edit">
						<input type="hidden" name="id_logro" value="' . $log[$n]['id_logro'] . '">
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

