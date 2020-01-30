<?php 
if( $_POST['r'] == 'info-add' && $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

	if($_POST['c'] == 'curso'){
	print('
		<h2 class="p1">Agregar Curso</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="curso" placeholder="Curso" required>
			</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="info-add">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="c" value="curso">
			</div>
		</form>
	');}else if($_POST['st'] == 'status'){
	print('
		<h2 class="p1">Agregar Status</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="status" placeholder="Status" required>
			</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="info-add">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="st" value="status">
			</div>
		</form>
	');}else if($_POST['cc'] == 'corte'){
	print('
		<h2 class="p1">Agregar Corte</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="corte" placeholder="Corte" required>
			</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="info-add">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="cc" value="corte">
			</div>
		</form>
	');}else if($_POST['nt'] == 'nota'){
	print('
		<h2 class="p1">Agregar Nota</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="number" name="nota" placeholder="nota" required>
			</div>
			<div class="p_25">
				<input type="text" name="concepto" placeholder="concepto" required>
			</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="info-add">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="nt" value="nota">
			</div>
		</form>
	');}else if($_POST['as'] == 'asig'){
	print('
		<h2 class="p1">Agregar Asignatura</h2>
		<form method="POST" class="item">
			<div class="p_25">
				<input type="text" name="asignatura" placeholder="Asignatura" required>
			</div>
			<div class="p_25">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="info-add">
				<input type="hidden" name="crud" value="set">
				<input type="hidden" name="as" value="asig">
			</div>
		</form>
	');}
} else if( $_POST['r'] == 'info-add' && $_SESSION['role'] == 2 && $_POST['crud'] == 'set' ) {
	$cr_controller = new CursoController();
	$cr = $cr_controller->get();
	$st_controller = new StatusController();
	$st = $st_controller->get();
	$cc_controller = new CortesController();
	$cc = $cc_controller->get();
	$as_controller = new AsigController();
	$as = $as_controller->get();
	$nt_controller = new NotaController();
	$nt = $nt_controller->get();

if($_POST['c'] == 'curso'){
	$new_curso = array(
		'curso_id' => 0,
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
		'status_id' => 0,
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
		'corte_id' => 0,
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
		'nota_id' => 0,
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
		'id_asig' => 0,
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