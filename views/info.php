<?php 
$cr_controller = new CursoController();
$cr = $cr_controller->get();
$st_controller = new StatusController();
$st = $st_controller->get();
$cc_controller = new CortesController();
$cc = $cc_controller->get();
$nt_controller = new NotaController();
$nt = $nt_controller->get();
$as_controller = new AsigController();
$as = $as_controller->get();
if( $_SESSION['role'] == 2 && !isset($_POST['crud'])){
/*error_reporting(E_ALL ^ E_NOTICE);*/

printf('<script type="text/javascript" src="./public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
function mostrar(id) {
    if (id == 1) {
        $("#1").show();
        $("#2").hide();
        $("#3").hide();
        $("#4").hide();
        $("#5").hide();
    }

    if (id == 2) {
        $("#1").hide();
        $("#2").show();
        $("#3").hide();
        $("#4").hide();
        $("#5").hide();
    }

    if (id == 3) {
        $("#1").hide();
        $("#2").hide();
        $("#3").show();
        $("#4").hide();
        $("#5").hide();
    }

    if (id == 4) {
        $("#1").hide();
        $("#2").hide();
        $("#3").hide();
        $("#4").show();
        $("#5").hide();
    }
    if (id == 5) {
        $("#1").hide();
        $("#2").hide();
        $("#3").hide();
        $("#4").hide();
        $("#5").show();
    }
}
</script>');
//----------------------------------------------------------------------------------------------------------------
printf('
		<form action="crear.php" method="post">
			<div class="p_25">
				<label for="contacto-lista">Cambios Generales: </label>
				<select name="gen" placeholder="Cmabios Generales" onChange="mostrar(this.value);" required>
					<option value="">Seleccione</option>		
					<option value="1">Curso</option>
					<option value="2">Status</option>
					<option value="3">Cortes</option>
					<option value="4">Nota</option>
					<option value="5">Asignaturas</option>
				</select>
			</div> 
			</form>');
		

printf('
<div id="1" style="display: none;" class="p_25 p1  f1_25">');
if( empty($cr) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Cursos</p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
		<table>
			<tr>
				<th>ID</th>
				<th>Curso</th>
					<form method="POST">
					<th colspan="2">
						<input type="hidden" name="r" value="info-add">
						<input type="hidden" name="c" value="curso">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($cr); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $cr[$n]['curso_id'] . '</td>
				<td>' . $cr[$n]['curso'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-edit">
						<input type="hidden" name="c" value="curso">
						<input type="hidden" name="curso_id" value="' . $cr[$n]['curso_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-delete">
						<input type="hidden" name="c" value="curso">
						<input type="hidden" name="curso_id" value="' . $cr[$n]['curso_id'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</div>
	</div>';

	print($template_users);
}
//----------------------------------------------------------------------------------------------------------------
printf('
<div id="2" style="display: none;" class="p_25 p1  f1_25">');
if( empty($st) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Status/p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
		<table>
			<tr>
				<th>ID</th>
				<th>Status</th>
					<form method="POST">
					<th colspan="2">
						<input type="hidden" name="r" value="info-add">
						<input type="hidden" name="st" value="status">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($st); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $st[$n]['status_id'] . '</td>
				<td>' . $st[$n]['status'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-edit">
						<input type="hidden" name="st" value="status">
						<input type="hidden" name="status_id" value="' . $st[$n]['status_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-delete">
						<input type="hidden" name="st" value="status">
						<input type="hidden" name="status_id" value="' . $st[$n]['status_id'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</div>
	</div>';

	print($template_users);
}
//----------------------------------------------------------------------------------------------------------------
printf('
<div id="3" style="display: none;" class="p_25 p1  f1_25">');
if( empty($cc) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Cortes/p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
		<table>
			<tr>
				<th>ID</th>
				<th>Cortes</th>
					<form method="POST">
					<th colspan="2">
						<input type="hidden" name="r" value="info-add">
						<input type="hidden" name="cc" value="corte">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($cc); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $cc[$n]['corte_id'] . '</td>
				<td>' . $cc[$n]['corte'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-edit">
						<input type="hidden" name="cc" value="corte">
						<input type="hidden" name="corte_id" value="' . $cc[$n]['corte_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-delete">
						<input type="hidden" name="cc" value="corte">
						<input type="hidden" name="corte_id" value="' . $cc[$n]['corte_id'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</div>
	</div>';

	print($template_users);
}
//----------------------------------------------------------------------------------------------------------------
printf('
<div id="4" style="display: none;" class="p_25 p1  f1_25">');
if( empty($nt) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Notas asignadas</p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
		<table>
			<tr>
				<th>ID</th>
				<th>Nota</th>
				<th>Concepto</th>
					<form method="POST">
					<th colspan="2">
						<input type="hidden" name="r" value="info-add">
						<input type="hidden" name="nt" value="nota">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($nt); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $nt[$n]['nota_id'] . '</td>
				<td>' . $nt[$n]['nota'] . '</td>
				<td>' . $nt[$n]['concepto'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-edit">
						<input type="hidden" name="nt" value="nota">
						<input type="hidden" name="nota_id" value="'. $nt[$n]['nota_id'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-delete">
						<input type="hidden" name="nt" value="nota">
						<input type="hidden" name="nota_id" value="' . $nt[$n]['nota_id'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</div>
	</div>';

	print($template_users);
}
//----------------------------------------------------------------------------------------------------------------
printf('
<div id="5" style="display: none;" class="p_25 p1  f1_25">');
if( empty($as) ) {
	
	printf('
		<div class="container">
			<p class="item  error">No hay Asignaturas</p>
		</div>
	');
} else {
	$template_users = '
	<div class="item">
		<table>
			<tr>
				<th>ID</th>
				<th>Asignaturas</th>
					<form method="POST">
					<th colspan="2">
						<input type="hidden" name="r" value="info-add">
						<input type="hidden" name="as" value="asig">
						<input class="button  add" type="submit" value="Agregar">
					</form>
					</th>
			</tr>';

	for ($n=0; $n < count($as); $n++) { 
		$template_users .= '
			<tr>
				<td>' . $as[$n]['id_asig'] . '</td>
				<td>' . $as[$n]['asignatura'] . '</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-edit">
						<input type="hidden" name="as" value="asig">
						<input type="hidden" name="id_asig" value="'. $as[$n]['id_asig'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>
				</td>
				<td>
					<form method="POST">
						<input type="hidden" name="r" value="info-delete">
						<input type="hidden" name="as" value="asig">
						<input type="hidden" name="id_asig" value="' . $as[$n]['id_asig'] . '">
						<input class="button  delete" type="submit" value="Eliminar">
					</form>
				</td>
			</tr>
		'; 
	}

	$template_users .= '
		</table>
	</div>
	</div>';

	print($template_users);
}
}
