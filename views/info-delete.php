<?php 
$cr_controller = new CursoController();

$st_controller = new StatusController();

$cc_controller = new CortesController();

$as_controller = new AsigController();

$nt_controller = new NotaController();

if( $_POST['r'] == 'info-delete' && $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

	if($_POST['c'] == 'curso'){

		$cr = $cr_controller->get($_POST['curso_id']);
		if( empty($cr) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el curso_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("info")
				}
			</script>
		';

		printf($template, $_POST['curso_id']);
		} else {
			$template_curso = '
			<h2 class="p1">Eliminar Curso</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Curso: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="curso_id" value="%s">
					<input type="hidden" name="r" value="info-delete">
					<input type="hidden" name="crud" value="del">
					<input type="hidden" name="c" value="curso">
				</div>
			</form>
		';

		printf(
			$template_curso,
			$cr[0]['curso'],
			$cr[0]['curso_id']
		);


	}}else if($_POST['st'] == 'status'){

		$st = $st_controller->get($_POST['status_id']);
		if( empty($st) ) {
	
	$template = '
			<div class="container">
				<p class="item  error">No existe el status_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("info")
				}
			</script>
		';

		printf($template, $_POST['status_id']);
		} else {
			$template_status = '
			<h2 class="p1">Eliminar Status</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Status: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="status_id" value="%s">
					<input type="hidden" name="r" value="info-delete">
					<input type="hidden" name="crud" value="del">
					<input type="hidden" name="st" value="status">
				</div>
			</form>
		';

		printf(
			$template_status,
			$st[0]['status'],
			$st[0]['status_id']
		);


	}}else if($_POST['cc'] == 'corte'){

		$cc = $cc_controller->get($_POST['corte_id']);
		if( empty($cc) ) {
	
	$template = '
			<div class="container">
				<p class="item  error">No existe el corte_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("info")
				}
			</script>
		';

		printf($template, $_POST['corte_id']);
		} else {
			$template_corte = '
			<h2 class="p1">Eliminar Corte</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Corte: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="corte_id" value="%s">
					<input type="hidden" name="r" value="info-delete">
					<input type="hidden" name="crud" value="del">
					<input type="hidden" name="cc" value="corte">
				</div>
			</form>
		';

		printf(
			$template_corte,
			$cc[0]['corte'],
			$cc[0]['corte_id']
		);


}}else if($_POST['nt'] == 'nota'){

	$nt = $nt_controller->get($_POST['nota_id']);
	if( empty($nt) ) {
	
	$template = '
			<div class="container">
				<p class="item  error">No existe el nota_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("info")
				}
			</script>
		';

		printf($template, $_POST['nota_id']);
		} else {
			$template_asig= '
			<h2 class="p1">Eliminar Nota</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar la Nota: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="nota_id" value="%s">
					<input type="hidden" name="r" value="info-delete">
					<input type="hidden" name="crud" value="del">
					<input type="hidden" name="nt" value="nota">
				</div>
			</form>
		';

		printf(
			$template_asig,
			$nt[0]['concepto'],
			$nt[0]['nota_id']
		);

	}}else if($_POST['as'] == 'asig'){

	$as = $as_controller->get($_POST['id_asig']);
	if( empty($as) ) {
	
	$template = '
			<div class="container">
				<p class="item  error">No existe el id_asig <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("info")
				}
			</script>
		';

		printf($template, $_POST['id_asig']);
		} else {
			$template_asig= '
			<h2 class="p1">Eliminar Asignatura</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Asignatura: 
					<mark class="p1">%s</mark>?
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="id_asig" value="%s">
					<input type="hidden" name="r" value="info-delete">
					<input type="hidden" name="crud" value="del">
					<input type="hidden" name="as" value="asig">
				</div>
			</form>
		';

		printf(
			$template_asig,
			$as[0]['asignatura'],
			$as[0]['id_asig']
		);

	}}
} else if( $_POST['r'] == 'info-delete' && $_SESSION['role'] == 2 && $_POST['crud'] == 'del' ) {
	

if($_POST['c'] == 'curso'){
	
	$curso = $cr_controller->del($_POST['curso_id']);

	$template = '
		<div class="container">
			<p class="item  add">Curso <b>%s</b> Eliminado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['curso']);

}else if($_POST['st'] == 'status'){
	
$status = $st_controller->del($_POST['status_id']);

	$template = '
		<div class="container">
			<p class="item  add">Status <b>%s</b> Eliminado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['status']);

}else if($_POST['cc'] == 'corte'){
	
$corte = $cc_controller->del($_POST['corte_id']);

	$template = '
		<div class="container">
			<p class="item  add">Corte <b>%s</b> Eliminado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['corte']);



}else if($_POST['nt'] == 'nota'){
	
	$nt = $nt_controller->del($_POST['nota_id']);
	$template = '
		<div class="container">
			<p class="item  add">Nota<b>%s</b> Eliminada</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("info")
			}
		</script>
	';

	printf($template, $_POST['concepto']);}
}else if($_POST['as'] == 'asig'){
	
	$asig = $as_controller->del($_POST['id_asig']);

	$template = '
		<div class="container">
			<p class="item  add">Asignatura <b>%s</b> Eliminado</p>
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