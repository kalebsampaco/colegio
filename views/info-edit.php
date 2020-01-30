<?php 
$cr_controller = new CursoController();

$st_controller = new StatusController();

$cc_controller = new CortesController();

$as_controller = new AsigController();

$nt_controller = new NotaController();
	

if( $_POST['r'] == 'info-edit' && $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

	if($_POST['c'] == 'curso'){

		$cr = $cr_controller->get($_POST['curso_id']);
		if( empty($cr) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Curso/p>
		</div>
			');
		} else {
			$template_curso = '
		<h2 class="p1">Editar Curso</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="curso_id" placeholder="Curso" value="%s"required>
				<input type="hidden" name="curso_id" value="%s">
			</div>
			<div class="p_25">
					<input type="text" name="curso" placeholder="Curso" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Editar">
				<input type="hidden" name="r" value="info-edit">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="c" value="curso">
			</div>
		</form>';
		printf($template_curso,
			$cr[0]['curso_id'],
			$cr[0]['curso_id'],
			$cr[0]['curso']);


	}}else if($_POST['st'] == 'status'){

		$st = $st_controller->get($_POST['status_id']);
		if( empty($st) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Status/p>
		</div>
			');
		} else {
	$template_status = '
		<h2 class="p1">Editar Status</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="status_id" placeholder="Status" value="%s" required>
				<input type="hidden" name="status_id" value="%s">
			</div>
			<div class="p_25">
					<input type="text" name="status" placeholder="status" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Editar">
				<input type="hidden" name="r" value="info-edit">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="st" value="status">
			</div>
		</form>';
		printf($template_status,
			$st[0]['status_id'],
			$st[0]['status_id'],
			$st[0]['status']);


	}}else if($_POST['cc'] == 'corte'){

		$cc = $cc_controller->get($_POST['corte_id']);
		if( empty($cc) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Cortes/p>
		</div>
			');
		} else {
	$template_corte = '
		<h2 class="p1">Editar Corte</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="corte_id" placeholder="Corte" value="%s" disabled>
				<input type="hidden" name="corte_id" value="%s">
			</div>
			<div class="p_25">
					<input type="text" name="corte" placeholder="Corte" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Editar">
				<input type="hidden" name="r" value="info-edit">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="cc" value="corte">
			</div>
		</form>';
		printf($template_corte,
			$cc[0]['corte_id'],
			$cc[0]['corte_id'],
			$cc[0]['corte']);


}}else if($_POST['nt'] == 'nota'){

	$nt = $nt_controller->get($_POST['nota_id']);
	if( empty($nt) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay notas/p>
		</div>
			');
		} else {
	$template_asig = '
		<h2 class="p1">Editar Notas</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="number" name="nota_id" placeholder="nota_id" value="%s" required>
				<input type="hidden" name="nota_id" value="%s">
			</div>
			<div class="p_25">
					<input type="number" name="nota" placeholder="nota" value="%s" required>
				</div>
			<div class="p_25">
					<input type="text" name="concepto" placeholder="concepto" value="%s" required>
			</div>
			<div class="p_25">
				<input  class="button  edit" type="submit" value="Editar">
				<input type="hidden" name="r" value="info-edit">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="nt" value="nota">
			</div>
		</form>';
		printf($template_asig,
			$nt[0]['nota_id'],
			$nt[0]['nota_id'],
			$nt[0]['nota'],
			$nt[0]['concepto']);

	}}else if($_POST['as'] == 'asig'){

	$as = $as_controller->get($_POST['id_asig']);
	if( empty($as) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Asignaturas/p>
		</div>
			');
		} else {
	$template_asig = '
		<h2 class="p1">Editar Asignatura</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="id_asig" placeholder="Asignatura" value="%s" required>
				<input type="hidden" name="id_asig" value="%s">
			</div>
			<div class="p_25">
					<input type="text" name="asignatura" placeholder="Asignatura" value="%s" required>
				</div>
			<div class="p_25">
				<input  class="button  edit" type="submit" value="Editar">
				<input type="hidden" name="r" value="info-edit">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="as" value="asig">
			</div>
		</form>';
		printf($template_asig,
			$as[0]['id_asig'],
			$as[0]['id_asig'],
			$as[0]['asignatura']);

	}}
} else if( $_POST['r'] == 'info-edit' && $_SESSION['role'] == 2 && $_POST['crud'] == 'set' ) {
	

if($_POST['c'] == 'curso'){
	$new_curso = array(
		'curso_id' => $_POST['curso_id'],
		'curso' => $_POST['curso']
	);

	$curso = $cr_controller->set($new_curso);

	$template = '
		<div class="container">
			<p class="item  add">Curso <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['curso']);

}else if($_POST['st'] == 'status'){
	$new_status = array(
		'status_id' => $_POST['status_id'],
		'status' => $_POST['status']
	);

$status = $st_controller->set($new_status);

	$template = '
		<div class="container">
			<p class="item  add">Status <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['status']);

}else if($_POST['cc'] == 'corte'){
	$new_corte = array(
		'corte_id' => $_POST['corte_id'],
		'corte' => $_POST['corte']
	);

$corte = $cc_controller->set($new_corte);

	$template = '
		<div class="container">
			<p class="item  add">Corte <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['corte']);



}else if($_POST['nt'] == 'nota'){
	$new_nota = array(
		'nota_id' => intval($_POST['nota_id']),
		'nota' => intval($_POST['nota']),
		'concepto' => $_POST['concepto']
	);

	$nota= $nt_controller->set($new_nota);

	$template = '
		<div class="container">
			<p class="item  add">Nota <b>%s</b> salvada</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['concepto']);
}else if($_POST['as'] == 'asig'){
	$new_asig = array(
		'id_asig' => $_POST['id_asig'],
		'asignatura' => $_POST['asignatura']
	);

	$asig = $as_controller->set($new_asig);

	$template = '
		<div class="container">
			<p class="item  add">Asignatura <b>%s</b> salvada</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['asignatura']);}
} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}