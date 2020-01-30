<?php 
if( $_POST['r'] == 'notas-add' && $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {

$users_controller = new UsersController();
$log_controller = new LogController();
$nt_controller = new NotaController();
$nt = $nt_controller->get();
$nota= '';

	for ($n=0; $n < count($nt); $n++) { 
		 $selected = ($nt[$n]['nota_id']==$_POST["nota"])? ' selected':''; 
		$nota .= '<option value="' . $nt[$n]['nota_id'] .'">' . $nt[$n]['nota'] . '</option>';}

$userg = $users_controller->get($_POST['documento']);
	if(isset($userg)){

		
	$template_notas = '
		<h2 class="p1">Agregar Notas</h2>
		
			<div class="item">
	<fieldset>
	
	<legend>Agregar Nota a estudiante</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Estudiante</th>
			</tr>
			<tr>
				<td>'.$userg[0]['documento'].'</td>
				<td>' . $userg[0]['nombres'].' '.$userg[0]['apellidos'].'</td>				
			</tr>';
			$log = $log_controller->getcurso($_POST['curso']);
	
		//var_dump($log);
		for ($n=0; $n < count($log); $n++) {
		if($_POST['curso'] == $log[$n]['curso'] && $log[$n]['documento_profe']==$_SESSION['documento']){
			$template_notas .= '
			<tr>
			
				<th>Logro</th>
				<td><textarea row="4" name="" cols="50" form="envio" disabled>'.$log[$n]['logro'].'</textarea>
				<input type="hidden" name="logro"  form="envio" value="'.$log[$n]['id_logro'].'"></td>
				<th>Nota</th>
				<td><div id="nota" class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg4">
						<label for="nota">Nota: </label><br>
						<select name="nota" form="envio" placeholder="Curso" >		
							<option value="">Nota</option>
							'.$nota.'
						</select>
					
					</div>
				</td>

			</tr>
		';		
	}
	}
	$template_notas .= '
			<tr>
				<td>			
					<form method="POST" class="item" id="envio">
						<div id="curso" class="item  i-b  lg-v-top flex-auto ph12  sm6  md12  lg12">
							<input type="hidden" name="r" value="notas-add">
							<input type="hidden" name="crud" value="set">
							<input type="hidden" name="documento" value="'.$_POST['documento'].'">
							<input type="hidden" name="corte" value="'.$_POST['corte'].'">
							<input class="button  edit" type="submit" value="Subir Nota">
						</div>
					</form>
				</td>
			</tr>
		</table>

						
	</fieldset>
	</div>';

	print($template_notas);

}
}else if( $_POST['r'] == 'notas-add' && $_SESSION['role'] == 3 && $_POST['crud'] == 'set' ) {
$snt_controller = new SnotaController();

 $id_logro = $_POST['logro'];
 $documento = $_POST['documento'];
 $year = date('Y');
 $corte = intval($_POST['corte']);
 $logro = intval($_POST['logro']);
 $nota = intval($_POST['nota']);
$sntg = $snt_controller->getdoc($documento);
echo 'logro'.$sntg[0]['id_logro'];
echo 'corte'.$sntg[0]['corte_id'];
//var_dump($sntg);
if($id_logro == $sntg[0]['id_logro'] && $corte == $sntg[0]['corte_id']){
$template = '
		<div class="container">
			<p class="item  error">Ya existe una nota para este corte del estudiante <b>%s</b></p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("notas")
			}
		</script>
	';

	printf($template, $documento);

}else{
$new_nota = array(
		'nota_id' => 0,
		'documento' => $documento,
		'year' => $year,
		'corte' => $corte,
		'logro' => $logro,
		'nota' => $nota
	);
//var_dump($new_nota);
$snt = $snt_controller->set($new_nota);
$template = '
		<div class="container">
			<p class="item  add">Nota subida para <b>%s</b> salvada</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("notas")
			}
		</script>
	';

	printf($template, $documento);

}
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}