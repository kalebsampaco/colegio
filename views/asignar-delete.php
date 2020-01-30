<?php 
$pca_controller = new PcaController();
$pca = $pca_controller->get($_POST['curso_asig_id']);
if( $_POST['r'] == 'asignar-delete' && $_SESSION['role'] == 2 && !isset($_POST['crud']) ) {

		
		
		if( empty($pca) ) {
		$template = '
			<div class="container">
				<p class="item  error">No existe el curso_id <b>%s</b></p>
			</div>
			<script>
				window.onload = function (){
					reloadPage("asignar")
				}
			</script>
		';

		printf($template, $_POST['curso_asig_id']);
		} else {
			$template_curso = '
			<h2 class="p1">Eliminar Curso y asignatura</h2>
			<form method="POST" class="item">
				<div class="p1  f2">
					¿Estas seguro de eliminar el Curso y: 
					<mark class="p1">%s</mark> y la asignatura <mark class="p1">%s</mark>?
					para la identificación <mark class="p1">%s</mark>
				</div>
				<div class="p_25">
					<input  class="button  delete" type="submit" value="SI">
					<input class="button  add" type="button" value="NO" onclick="history.back()">
					<input type="hidden" name="curso_asig_id" value="%s">
					<input type="hidden" name="r" value="asignar-delete">
					<input type="hidden" name="crud" value="del">
					
				</div>
			</form>
		';
		printf($template_curso,
			$pca[0]['curso'],
			$pca[0]['asignatura'],
			$pca[0]['documento_profe'],
			$pca[0]['curso_asig_id']);
			
			
		
	}}else if( $_POST['r'] == 'asignar-delete' && $_SESSION['role'] == 2 && $_POST['crud'] == 'del' ) {
	


	
	$asigpca = $pca_controller->del($_POST['curso_asig_id']);

	$template = '
		<div class="container">
			<p class="item  add">Curso y asignatura <b>%s y %s</b> Eliminado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("asignar")
			}
		</script>
	';

	printf($template, $pca[0]['curso'], $pca[0]['asignatura']);
	} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}