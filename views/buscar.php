<?php 

if( ($_SESSION['role'] == 1 or $_SESSION['role'] == 2) && !isset($_POST['crud'])){
/*error_reporting(E_ALL ^ E_NOTICE);*/
$rl_controller = new RoleController();
$rl = $rl_controller->get();
$st_controller = new StatusController();
$st = $st_controller->get();
$cg_controller = new CargoController();
$cg = $cg_controller->get();
$cr_controller = new CursoController();
$cr = $cr_controller->get();
$users_controller = new UsersController();

//include('form_cambio.php');
printf(' 
	
	<div class="p_25 p1  f1_25">
	<form action="" method="POST">
	<label for="doc">Documento: </label>
	<input type="text" id="doc" class="cambio" name="doc_txt" placeholder="Escribe el documento" title="documento" required/>
	<input type="submit" id="enviar-buscar" class="button add cambio" name="enviar_btn" value="Buscar" />
	</form>
	</div> 
	 ');
$doc = $_POST["doc_txt"];
//echo $doc;
if($doc!=null){
$user = $users_controller->get($doc);
$registros = array();
foreach ($user as $row) {
						$registro['documento'] = $row['documento'];
						$registro['nombres'] = $row['nombres'];
						$registro['apellidos'] = $row['apellidos'];
						$registro['curso'] = $row['curso'];
						$registro['acudiente'] = $row['acudiente'];
						$registro['direccion'] = $row['direccion'];
						$registro['estudios'] = $row['estudios'];
						$registro['experiencia'] = $row['experiencia'];
						$registro['referencias'] = $row['Referencias'];
						$registro['nacimiento'] = $row['nacimiento'];
						$registro['sexo'] = $row['sexo'];
						$registro['status'] = $row['status'];
						$registro['fecha_ingreso'] = $row['fecha_ingreso'];
						$registro['role'] = $row['role'];
						$registro['pass'] = $row['pass'];
						$registro['cargo'] = $row['cargo'];
						$registro['imagen'] = $row['imagen'];
					}
$sexM = ($registro['sexo'] == 'M') ? 'checked' : '';
$sexF = ($registro['sexo'] == 'F') ? 'checked' : '';

$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		$selected = ($cr[$n]['curso_id'] == $registro['curso']) ? 'selected' : '';
		$curso .= '<option value="' . $cr[$n]['curso_id'] .'"'.$selected.'>' . $cr[$n]['curso'] . '</option>';}


$st_select = '';

	for ($n=0; $n < count($st); $n++) {
		$selected = ($st[$n]['status_id'] == $registro['status']) ? 'selected' : ''; 
		$st_select .= '<option value="' . $st[$n]['status_id'] . '"'.$selected.'>' . $st[$n]['status'] . '</option>';}

$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$selected = ($rl[$n]['role_id'] == $registro['role']) ? 'selected' : '';
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '"'.$selected.'>' . $rl[$n]['role'] . '</option>';}
$im = 'public/img/fotos/'.$registro["imagen"];

$cargo = '';

	for ($n=0; $n < count($cg); $n++) { 
		$selected = ($cg[$n]['cargo_id'] == $registro['cargo']) ? 'selected' : '';
		$cargo .= '<option value="' . $cg[$n]['cargo_id'] . '"'.$selected.'>' . $cg[$n]['cargo'] . '</option>';}

//$template_ms =
printf('
	<h2 class="p1">Cambiar datos de Usuario</h2>	
	<form id="alta-contacto" name="alta_frm" method="post"  class="item" enctype="multipart/form-data">
		<fieldset>
			<legend>Cambios de Contacto</legend>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="documento">Documento: </label>
					<input type="text" id="documento" class="cambio" name="documento" placeholder="documento" title="Documento" value="'); echo $registro['documento']; printf('" disabled required />	<input type="hidden" name="documento" value="'); echo $registro['documento']; printf('"/>
				</div>

				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="nombres">Nombres: </label>
					<input type="text" id="nombres" class="cambio" name="nombres" placeholder="Escribe los nombre" title="nombres" value="'); echo $registro['nombres']; printf('" disabled required />
				</div>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="apellidos">Apellidos: </label>
					<input type="text" id="apellidos" class="cambio" name="apellidos" placeholder="Escribe los apellidos" title="apellidos" value="'); echo $registro['apellidos']; printf('" disabled required />
				</div>');
				
				printf('<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center">
					<label for="curso">Curso: </label>
					<select name="curso" placeholder="Curso" disabled >		
						<option value="0">Curso</option>
						%s
					</select>
				</div>',$curso);
				printf('
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="acudiente">Acudiente: </label>
					<input type="text" id="acudiente" class="cambio" name="acudiente" placeholder="Escribe el acudiente" title="acudiente" value="'); echo $registro['acudiente']; printf('" disabled required />
				</div>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="direccion">Dirección: </label>
					<input type="text" id="direccion" class="cambio" name="direccion" placeholder="Escribe la dirección" title="direccion" value="'); echo $registro['direccion']; printf('" disabled required />
				</div>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="estudios">Estudios: </label><br>
					<textarea id="estudios" class="cambio" name="estudios" cols="50" rows="5" placeholder="Estudios realizados" title="estudios" disabled >'); echo $registro['estudios']; printf('</textarea>
				</div>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="experiencia">Experiencia: </label><br>
					<textarea id="experiencia" class="cambio" name="experiencia" cols="50" rows="5" placeholder="Experiencia" title="experiencia" disabled >'); echo $registro['experiencia']; printf('</textarea>
				</div>
				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="referencias">Referencias: </label><br>
					<textarea id="referencias" class="cambio" name="referencias" cols="50" rows="5" placeholder="referencias" title="referencias" disabled >'); echo $registro['referencias']; printf('</textarea>
				</div>

				<div div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="nacimiento">Fecha de nacimiento: </label>
					<input type="date" id="nacimiento" class="cambio" name="nacimiento" title="fecha nacimiento" value="'); echo $registro['nacimiento']; printf('" disabled required />
				</div>

				<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="m">Sexo: </label>
					<input type="radio" id="m" name="sexo" title="tipo de sexo" value="M"'); echo $sexM; printf(' disabled required />&nbsp;<label for="m">Masculino</label>
					&nbsp;&nbsp;&nbsp;
					<input type="radio" id="f" name="sexo" title="tipo de sexo" value="F" '); echo $sexF; printf(' disabled required />&nbsp;<label for="f">Femenino</label>
				</div>');

				printf('<div div class="item  i-b  v-middle  ph12  sm12  md12  lg-center>
					<label for="status">Status: </label>
					<select name="status" placeholder="Status" disabled required>		
						<option value="0">Status</option>
						%s
					</select>
				</div>',$st_select);

				printf('<div class="item  i-b  v-middle  ph12  sm12  md12 lg-center">
					<label for="fecha_ingreso">Fecha de Ingreso: </label>
					<input type="date" id="fecha_ingreso" class="cambio" name="fecha_ingreso" title="fecha de ingreso" value="'); echo $registro['fecha_ingreso']; printf('" disabled required />
				</div>');

				printf('<div class="item  i-b  v-middle  ph12  sm12  md12 lg-center">
					<label for="role">Role: </label>
					<select name="role" placeholder="role" disabled required>		
						<option value="0">Role</option>
						%s
					</select>
				</div>',$rl_select); 
						
				printf('<div class="item  i-b  v-middle  ph12  sm12  md12 lg-center">
					<label for="cargo">Cargo: </label>
				<select name="cargo" placeholder="Cargo" disabled required>		
					<option value="0">Cargo</option>
					%s
				</select>
			</div>', $cargo); 
			
				printf('<div class="item  i-b  v-middle  ph12  sm12  md12  lg-center">
					<label for="foto">Foto: </label><br>
					<div class="imagen">
						<img src="'); echo $im; printf('" />
					</div>
				</div>
				
		</fieldset>
	</form>

');
/*printf(
		$template_ms,
		$registro['documento'],
		$registro['documento'],
		$registro['nombres'],
		$registro['apellidos'],
		$curso,
		$registro['acudiente'],
		$registro['direccion'],
		$registro['estudios'],
		$registro['experiencia'],
		$registro['referencias'],
		$registro['nacimiento'],
		$sexM,
		$sexF,
		$st_select,
		$registro['fecha_ingreso'],
		$rl_select,
		$registro['pass'],
		$cargo,
		$im
	);*/
	
}

	
}
