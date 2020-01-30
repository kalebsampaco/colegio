<?php 
$pca_controller = new PcaController(); 

if( $_POST['r'] == 'logros-edit' && $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {
			$log_controller = new LogController();
			
			$log = $log_controller->getl($_POST['id_logro']);
			$pca = $pca_controller->getdoc($_SESSION['documento']);
			
		
$reg = array();
foreach ($log as $row) {
						$reg['id_logro'] = $row['id_logro'];
						$reg['asignatura'] = $row['asignatura'];
						$reg['curso'] = $row['curso'];
						$reg['logro'] = $row['logro'];
						$reg['documento'] = $row['documento'];
						}


	$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		$selected = ($cr[$n]['curso_id'] == $reg['curso']) ? ' selected' : '';
		$curso .= '<option value="'.$pca[$n]['curso_asig_id'].'"'.$selected.'>' . $pca[$n]['curso'] . '</option>';}
$asig = '';

	for ($n=0; $n < count($as); $n++) { 
		$selected = ($as[$n]['id_asig'] == $reg['asignatura']) ? ' selected' : '';
		$asig .= '<option value="'.$pca[$n]['curso_asig_id'].'"'.$selected.'>' . $pca[$n]['asignatura'] . '</option>';}

	$template_logro = '
		<h2 class="p1">Editar Logro</h2>
		<form method="POST" class="item">
			<div class="p_25">
			
				<input type="hidden" name="id_logro" value="%s">
			</div>
			<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="asig">Asignatura: </label><br>
					<select name="asig" placeholder="Asignatura" >		
						<option value="">Asignatura</option>
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
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="logro">Logro: </label><br>
					<textarea id="logro" class="cambio" name="logro" cols="50" rows="5" placeholder="Logro" title="Logro">%s</textarea>
				</div>
				<div class="p_25">
					<input type="hidden" name="documento" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Editar">
				<input type="hidden" name="r" value="logros-edit">
				<input type="hidden" name="crud" value="set">
			</div>
		</form>
	';
		printf($template_logro,
				$log[0]['id_logro'],
				$asig,
				$curso,
				$log[0]['logro'],
				$log[0]['documento']);
} else if( $_POST['r'] == 'logros-edit' && $_SESSION['role'] == 3 && $_POST['crud'] == 'set' ) {
	
	
	
	$new_logro = array(
		'id_logro' => $_POST['id_logro'],
		'asig' => intval($_POST['asig']),
		'curso' => intval($_POST['curso']),
		'logro' => $_POST['logro'],
		'documento' => $_POST['documento']
	);
$log_controller = new LogController();
//var_dump($new_logro);
	$logro= $log_controller->set($new_logro);

	$template = '
		<div class="container">
			<p class="item  add">logro editado por <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("logros")
			}
		</script>
	';

	printf($template, $_POST['documento']);


} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}