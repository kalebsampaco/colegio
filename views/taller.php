<?php 
if( $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {

	$ta_controller = new TController();
$ta = $ta_controller->get($_SESSION['documento']);


if( empty($ta) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay talleres asignados</p>
		</div>
	');
} 

	$template_users = '
	<div class="item">
	<fieldset>
	<legend>Taller</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>curso</th>
				<th>asignatura</th>
				<th>corte</th>
				<th>trabajo</th>
				<th>documento</th>
					<th colspan="2">
					<form method="POST">
						<input type="hidden" name="r" value="taller-add">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($ta); $n++) { 

		$template_users .= '
			<tr>
				<td>' . $ta[$n]['no_trab'] . '</td>
				<td>' . $ta[$n]['curso'] . '</td>
				<td>' . $ta[$n]['asignatura'] . '</td>
				<td>' . $ta[$n]['corte'] . '</td>
				<td>' . $ta[$n]['trabajo'] . '</td>
				<td>' . $ta[$n]['documento'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="taller-edit">
						<input type="hidden" name="no_trab" value="' . $ta[$n]['no_trab'] . '">
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

	print($template_users);}

