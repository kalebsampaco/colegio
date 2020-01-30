<?php
$pca_controller = new PcaController();
$cc_controller = new CortesController();
$log_controller = new LogController();
if( $_POST['r'] == 'logros-add' && $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {

		
		$log = $log_controller->get($_SESSION['documento']);
		$cc = $cc_controller->get();
		$pca = $pca_controller->getdoc($_SESSION['documento']);

	$curso = '';

	for ($n=0; $n < count($pca); $n++) { 
		
		$curso .= '<option value="'.$pca[$n]['curso_asig_id'].'">' . $pca[$n]['curso'] . '</option>';}
	$asig = '';

	for ($n=0; $n < count($pca); $n++) { 
		
		$asig .= '<option value="'.$pca[$n]['curso_asig_id'].'">' . $pca[$n]['asignatura'] . '</option>';}
	$corte= '';

	for ($n=0; $n < count($log); $n++) { 
		
		$corte .= '<option value="'.$log[$n]['id_logro'].'">' . $log[$n]['corte'] . '</option>';}

	$template_logro = '
		<h2 class="p1">Agregar Logro</h2>
		<form method="POST" class="item">
			
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
					<textarea id="logro" class="cambio" name="logro" cols="50" rows="5" placeholder="Logro" title="Logro"></textarea>
				</div>
				<div class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="corte">Corte: </label><br>
					<select name="corte" placeholder="Corte" >		
						<option value="">Corte</option>
						%s
					</select>
				</div>
				<div class="p_25">
					<input type="hidden" name="documento" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="logros-add">
				<input type="hidden" name="crud" value="set">
			</div>
		</form>
	';
		printf($template_logro,
				$asig,
				$curso,
				$corte,	
				$_SESSION['documento']);
} else if( $_POST['r'] == 'logros-add' && $_SESSION['role'] == 3 && $_POST['crud'] == 'set' ) {
	$log_controller = new LogController();
	
	
	$new_logro = array(
		'id_logro' => 0,
		'asig' => intval($_POST['asig']),
		'curso' => intval($_POST['curso']),
		'logro' => $_POST['logro'],
		'documento' => $_POST['documento']
	);

//var_dump($new_logro);
	$log = $log_controller->set($new_logro);

	$template = '
		<div class="container">
			<p class="item  add">logro subido por <b>%s</b> salvado</p>
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