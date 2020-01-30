<?php 
$rl_controller = new RoleController();
$rl = $rl_controller->get();
$st_controller = new StatusController();
$st = $st_controller->get();
$cg_controller = new CargoController();
$cg = $cg_controller->get();
$cr_controller = new CursoController();
$cr = $cr_controller->get();
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
    }

    if (id == 2) {
        $("#1").hide();
        $("#2").show();
        $("#3").hide();
        $("#4").hide();
    }

    if (id == 3) {
        $("#1").hide();
        $("#2").hide();
        $("#3").show();
        $("#4").hide();
    }

    if (id == 4) {
        $("#1").hide();
        $("#2").hide();
        $("#3").hide();
        $("#4").show();
    }
}
</script>');
/*foreach ($rl as $row){
						$rl['role_id'] = $row['role_id'];
						$rl['role'] = $row['role'];
					}
					/*echo 'role'.$rl['role_id'].' '.$rl['role'];
	for ($n=0; $n < count($rl); $n++){
	echo 'role'.$rl[$n]['role_id'].' '.$rl[$n]['role'];}*/
				/*$i=0;
				while($i<=count($rl)) { 
					
					echo '<option value= "'.utf8_encode($rl[$i]["role_id"]).'"'; 
					if($rl[$i]["role_id"]==$i){ echo' selected';}
						echo '>'.utf8_encode($rl[$i]["role"]).'</option>';
					$i++;
				}*/
	$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '">' . $rl[$n]['role'] . '</option>';}
printf('
		<form action="crear.php" method="post">
			<div class="p_25">
				<label for="contacto-lista">Role: </label>
				<select name="role" placeholder="role" onChange="mostrar(this.value);" required>		
					<option value="">Role</option>
					%s
				</select>
			</div> 
			</form>', $rl_select);
		
/*(documento, nombres, apellidos, curso, acudiente, direccion, estudios, experiencia, referencias, nacimiento, sexo, status, fecha_ingreso, role, pass, cargo, imagen) */

printf('
<div id="1" style="display: none;" class="p_25 p1  f1_25">
	<h2 class="p1">Crear Usuario Administrativo</h2>	
	<form id="alta-contacto" name="alta_frm"  method="post" class="item" enctype="multipart/form-data">
		<fieldset>
			<legend>Alta de Contacto</legend>
				<div class="p_25">
					<label for="documento">Documento: </label>
					<input type="text" id="documento" class="cambio" name="documento" placeholder="documento" title="Documento" required />
				</div>

				<div class="p_25">
					<label for="nombres">Nombres: </label>
					<input type="text" id="nombres" class="cambio" name="nombres" placeholder="Escribe los nombre" title="nombres" required />
				</div>
				<div class="p_25">
					<label for="apellidos">Apellidos: </label>
					<input type="text" id="apellidos" class="cambio" name="apellidos" placeholder="Escribe los apellidos" title="apellidos" required />
				</div>
				<div class="p_25" >
					<label for="curso" style="display:none;">Curso: </label>
					<input type="hidden" id="curso" class="cambio" name="curso" placeholder="Escribe el curso" title="curso" value="4" disabled />
				</div>
				<div class="p_25" >
					<label for="acudiente" style="display:none;">Acudiente: </label>
					<input type="hidden" id="acudiente" class="cambio" name="acudiente" placeholder="Escribe el acudiente" title="acudiente" value="null" disabled />
				</div>
				<div class="p_25">
					<label for="direccion">Dirección: </label>
					<input type="text" id="direccion" class="cambio" name="direccion" placeholder="Escribe la dirección" title="direccion" required />
				</div>
				<div class="p_25">
					<label for="estudios">Estudios: </label><br>
					<textarea id="estudios" class="cambio" name="estudios" cols="50" rows="5" placeholder="Estudios realizados" title="estudios"></textarea>
				</div>
				<div class="p_25">
					<label for="experiencia">Experiencia: </label><br>
					<textarea id="experiencia" class="cambio" name="experiencia" cols="50" rows="5" placeholder="Experiencia" title="experiencia"></textarea>
				</div>
				<div class="p_25">
					<label for="referencias">Referencias: </label><br>
					<textarea id="referencias" class="cambio" name="referencias" cols="50" rows="5" placeholder="referencias" title="referencias"></textarea>
				</div>

				<div>
					<label for="nacimiento">Fecha de nacimiento: </label>
					<input type="date" id="nacimiento" class="cambio" name="nacimiento" title="fecha nacimiento" required />
				</div>

				<div>
					<label for="m">Sexo: </label>
					<input type="radio" id="m" name="sexo" title="tipo de sexo" value="M" required />&nbsp;<label for="m">Masculino</label>
					&nbsp;&nbsp;&nbsp;
					<input type="radio" id="f" name="sexo" title="tipo de sexo" value="F" required />&nbsp;<label for="f">Femenino</label>
				</div>');
$st_select = '';

	for ($n=0; $n < count($st); $n++) { 
		$st_select .= '<option value="' . $st[$n]['status_id'] . '">' . $st[$n]['status'] . '</option>';}
				printf('
		
			<div class="p_25">
				<label for="contacto-lista">Status: </label>
				<select name="status" placeholder="Status" required>		
					<option value="">Status</option>
					%s
				</select>
			</div>', $st_select);
			printf('
				<div>
					<label for="fecha_ingreso">Fecha de Ingreso: </label>
					<input type="date" id="fecha_ingreso" class="cambio" name="fecha_ingreso" title="fecha de ingreso" required />
				</div>');
				$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '">' . $rl[$n]['role'] . '</option>';}
printf('
			<div class="p_25">
				<label for="contacto-lista">Role: </label>
				<select name="role" placeholder="role" required>		
					<option value="">Role</option>
					%s
				</select>
			</div> 
			', $rl_select);
printf('
				<div class="p_25">
				<label for="password">Ingresa el Password: </label>
				<input type="password" name="pass" placeholder="password" required>
				</div>');
$cargo = '';

	for ($n=0; $n < count($cg); $n++) { 
		$cargo .= '<option value="' . $cg[$n]['cargo_id'] . '">' . $cg[$n]['cargo'] . '</option>';}
printf('
		
			<div class="p_25">
				<label for="contacto-lista">Cargo: </label>
				<select name="cargo" placeholder="Cargo" required>		
					<option value="">Cargo</option>
					%s
				</select>
			</div>', $cargo);
			printf('
				<div>
					<label for="foto">Foto: </label>
					<div class="adjuntar-archivo cambio">
						<input type="file" id="foto" name="foto" title="Sube tu foto" />
					</div>
				</div>
				<div>
					<input type="submit" id="enviar-alta" class="button add cambio" name="enviar_btn" value="Agregar" />
					<input type="hidden" name="r" value="user-add">
					<input type="hidden" name="crud" value="set">
				</div>
		</fieldset>
	</form>
</div>

');


printf('
<div id="2" style="display: none;" class="p_25 p1  f1_25">
	<h2 class="p1">Crear Usuario</h2>	
	<form id="alta-contacto" name="alta_frm"  method="post" class="item" enctype="multipart/form-data">
		<fieldset>
			<legend>Alta de Contacto</legend>
				<div class="p_25">
					<label for="documento">Documento: </label>
					<input type="text" id="documento" class="cambio" name="documento" placeholder="documento" title="Documento" required />
				</div>

				<div class="p_25">
					<label for="nombres">Nombres: </label>
					<input type="text" id="nombres" class="cambio" name="nombres" placeholder="Escribe los nombre" title="nombres" required />
				</div>
				<div class="p_25">
					<label for="apellidos">Apellidos: </label>
					<input type="text" id="apellidos" class="cambio" name="apellidos" placeholder="Escribe los apellidos" title="apellidos" required />
				</div>
				<div class="p_25">
					<label for="curso" style="display:none;">Curso: </label>
					<input type="hidden" id="curso" class="cambio" name="curso" placeholder="Escribe el curso" title="curso" value="4" disabled />
				</div>
				<div class="p_25">
					<label for="acudiente" style="display:none;">Acudiente: </label>
					<input type="hidden" id="acudiente" class="cambio" name="acudiente" placeholder="Escribe el acudiente" title="acudiente" value="null" disabled />
				</div>
				<div class="p_25">
					<label for="direccion">Dirección: </label>
					<input type="text" id="direccion" class="cambio" name="direccion" placeholder="Escribe la dirección" title="direccion" required />
				</div>
				<div class="p_25">
					<label for="estudios">Estudios: </label><br>
					<textarea id="estudios" class="cambio" name="estudios" cols="50" rows="5" placeholder="Estudios realizados" title="estudios"></textarea>
				</div>
				<div class="p_25">
					<label for="experiencia">Experiencia: </label><br>
					<textarea id="experiencia" class="cambio" name="experiencia" cols="50" rows="5" placeholder="Experiencia" title="experiencia"></textarea>
				</div>
				<div class="p_25">
					<label for="referencias">Referencias: </label><br>
					<textarea id="referencias" class="cambio" name="referencias" cols="50" rows="5" placeholder="referencias" title="referencias"></textarea>
				</div>

				<div>
					<label for="nacimiento">Fecha de nacimiento: </label>
					<input type="date" id="nacimiento" class="cambio" name="nacimiento" title="fecha nacimiento" required />
				</div>

				<div>
					<label for="m">Sexo: </label>
					<input type="radio" id="m" name="sexo" title="tipo de sexo" value="M" required />&nbsp;<label for="m">Masculino</label>
					&nbsp;&nbsp;&nbsp;
					<input type="radio" id="f" name="sexo" title="tipo de sexo" value="F" required />&nbsp;<label for="f">Femenino</label>
				</div>');
$st_select = '';

	for ($n=0; $n < count($st); $n++) { 
		$st_select .= '<option value="' . $st[$n]['status_id'] . '">' . $st[$n]['status'] . '</option>';}
				printf('
		
			<div class="p_25">
				<label for="contacto-lista">Status: </label>
				<select name="status" placeholder="Status" required>		
					<option value="">Status</option>
					%s
				</select>
			</div>', $st_select);
			printf('
				<div>
					<label for="fecha_ingreso">Fecha de Ingreso: </label>
					<input type="date" id="fecha_ingreso" class="cambio" name="fecha_ingreso" title="fecha de ingreso" required />
				</div>');
				$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '">' . $rl[$n]['role'] . '</option>';}
printf('
			<div class="p_25">
				<label for="contacto-lista">Role: </label>
				<select name="role" placeholder="role" required>		
					<option value="">Role</option>
					%s
				</select>
			</div> 
			', $rl_select);
printf('
				<div class="p_25">
				<label for="password">Ingresa el Password: </label>
				<input type="password" name="pass" placeholder="password" required>
				</div>');
$cargo = '';

	for ($n=0; $n < count($cg); $n++) { 
		$cargo .= '<option value="' . $cg[$n]['cargo_id'] . '">' . $cg[$n]['cargo'] . '</option>';}
printf('
		
			<div class="p_25">
				<label for="contacto-lista">Cargo: </label>
				<select name="cargo" placeholder="Cargo" required>		
					<option value="">Cargo</option>
					%s
				</select>
			</div>', $cargo);
			printf('
				<div>
					<label for="foto">Foto: </label>
					<div class="adjuntar-archivo cambio">
						<input type="file" id="foto" name="foto" title="Sube tu foto" />
					</div>
				</div>
				<div>
					<input type="submit" id="enviar-alta" class="button add cambio" name="enviar_btn" value="Agregar" />
					<input type="hidden" name="r" value="user-add">
					<input type="hidden" name="crud" value="set">
				</div>
		</fieldset>
	</form>
</div>

');

printf('
<div id="3" style="display: none;" class="p_25 p1  f1_25">
	<h2 class="p1">Crear Profesor</h2>	
	<form id="alta-contacto" name="alta_frm"  method="post" class="item" enctype="multipart/form-data">
		<fieldset>
			<legend>Alta de Contacto</legend>
				<div class="p_25">
					<label for="documento">Documento: </label>
					<input type="text" id="documento" class="cambio" name="documento" placeholder="documento" title="Documento" required />
				</div>

				<div class="p_25">
					<label for="nombres">Nombres: </label>
					<input type="text" id="nombres" class="cambio" name="nombres" placeholder="Escribe los nombre" title="nombres" required />
				</div>
				<div class="p_25">
					<label for="apellidos">Apellidos: </label>
					<input type="text" id="apellidos" class="cambio" name="apellidos" placeholder="Escribe los apellidos" title="apellidos" required />
				</div>
				<div class="p_25">
					<label for="curso" style="display:none;">Curso: </label>
					<input type="hidden" id="curso" class="cambio" name="curso" placeholder="Escribe el curso" title="curso" value="4" disabled />
				</div>
				<div class="p_25">
					<label for="acudiente" style="display:none;">Acudiente: </label>
					<input type="hidden" id="acudiente" class="cambio" name="acudiente" placeholder="Escribe el acudiente" title="acudiente" value="null" disabled />
				</div>
				<div class="p_25">
					<label for="direccion">Dirección: </label>
					<input type="text" id="direccion" class="cambio" name="direccion" placeholder="Escribe la dirección" title="direccion" required />
				</div>
				<div class="p_25">
					<label for="estudios">Estudios: </label><br>
					<textarea id="estudios" class="cambio" name="estudios" cols="50" rows="5" placeholder="Estudios realizados" title="estudios"></textarea>
				</div>
				<div class="p_25">
					<label for="experiencia">Experiencia: </label><br>
					<textarea id="experiencia" class="cambio" name="experiencia" cols="50" rows="5" placeholder="Experiencia" title="experiencia"></textarea>
				</div>
				<div class="p_25">
					<label for="referencias">Referencias: </label><br>
					<textarea id="referencias" class="cambio" name="referencias" cols="50" rows="5" placeholder="referencias" title="referencias"></textarea>
				</div>

				<div>
					<label for="nacimiento">Fecha de nacimiento: </label>
					<input type="date" id="nacimiento" class="cambio" name="nacimiento" title="fecha nacimiento" required />
				</div>

				<div>
					<label for="m">Sexo: </label>
					<input type="radio" id="m" name="sexo" title="tipo de sexo" value="M" required />&nbsp;<label for="m">Masculino</label>
					&nbsp;&nbsp;&nbsp;
					<input type="radio" id="f" name="sexo" title="tipo de sexo" value="F" required />&nbsp;<label for="f">Femenino</label>
				</div>');
$st_select = '';

	for ($n=0; $n < count($st); $n++) { 
		$st_select .= '<option value="' . $st[$n]['status_id'] . '">' . $st[$n]['status'] . '</option>';}
				printf('
		
			<div class="p_25">
				<label for="contacto-lista">Status: </label>
				<select name="status" placeholder="Status" required>		
					<option value="">Status</option>
					%s
				</select>
			</div>', $st_select);
			printf('
				<div>
					<label for="fecha_ingreso">Fecha de Ingreso: </label>
					<input type="date" id="fecha_ingreso" class="cambio" name="fecha_ingreso" title="fecha de ingreso" required />
				</div>');
				$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '">' . $rl[$n]['role'] . '</option>';}
printf('
			<div class="p_25">
				<label for="contacto-lista">Role: </label>
				<select name="role" placeholder="role" required>		
					<option value="">Role</option>
					%s
				</select>
			</div> 
			', $rl_select);
printf('
				<div class="p_25">
				<label for="password">Ingresa el Password: </label>
				<input type="password" name="pass" placeholder="password" required>
				</div>');
$cargo = '';

	for ($n=0; $n < count($cg); $n++) { 
		$cargo .= '<option value="' . $cg[$n]['cargo_id'] . '">' . $cg[$n]['cargo'] . '</option>';}
printf('
		
			<div class="p_25">
				<label for="contacto-lista">Cargo: </label>
				<select name="cargo" placeholder="Cargo" required>		
					<option value="">Cargo</option>
					%s
				</select>
			</div>', $cargo);
			printf('
				<div>
					<label for="foto">Foto: </label>
					<div class="adjuntar-archivo cambio">
						<input type="file" id="foto" name="foto" title="Sube tu foto" />
					</div>
				</div>
				<div>
					<input type="submit" id="enviar-alta" class="button add cambio" name="enviar_btn" value="Agregar" />
					<input type="hidden" name="r" value="user-add">
					<input type="hidden" name="crud" value="set">
				</div>
		</fieldset>
	</form>
</div>

');

printf('
<div id="4" style="display: none;" class="p_25 p1  f1_25">
	<h2 class="p1">Crear Estudiante</h2>	
	<form id="alta-contacto" name="alta_frm"  method="post" class="item" enctype="multipart/form-data">
		<fieldset>
			<legend>Alta de Contacto</legend>
				<div class="p_25">
					<label for="documento">Documento: </label>
					<input type="text" id="documento" class="cambio" name="documento" placeholder="documento" title="Documento" required />
				</div>

				<div class="p_25">
					<label for="nombres">Nombres: </label>
					<input type="text" id="nombres" class="cambio" name="nombres" placeholder="Escribe los nombre" title="nombres" required />
				</div>
				<div class="p_25">
					<label for="apellidos">Apellidos: </label>
					<input type="text" id="apellidos" class="cambio" name="apellidos" placeholder="Escribe los apellidos" title="apellidos" required />
				</div>');
$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		$curso .= '<option value="' . $cr[$n]['curso_id'] . '">' . $cr[$n]['curso'] . '</option>';}
		printf('
				<div class="p_25">
				<label for="contacto-lista">Curso: </label>
				<select name="curso" placeholder="Curso" required>		
					<option value="">Curso</option>
					%s
				</select>
			</div>', $curso);
		printf('
				<div class="p_25">
					<label for="acudiente">Acudiente: </label>
					<input type="text" id="acudiente" class="cambio" name="acudiente" placeholder="Escribe el acudiente" title="acudiente" required />
				</div>
				<div class="p_25">
					<label for="direccion">Dirección: </label>
					<input type="text" id="direccion" class="cambio" name="direccion" placeholder="Escribe la dirección" title="direccion" required />
				</div>
				<div class="p_25">
					<label for="estudios">Estudios: </label><br>
					<textarea  id="estudios" class="cambio" name="estudios" cols="50" rows="5" placeholder="Estudios realizados" title="estudios" value="null" disabled>null</textarea>
					<input type="hidden" name="estudios" value="null">
				</div>
				<div class="p_25">
					<label for="experiencia">Experiencia: </label><br>
					<textarea id="experiencia" class="cambio" name="experiencia" cols="50" rows="5" placeholder="Experiencia" title="experiencia" value="null" disabled>null</textarea>
					<input type="hidden" name="experiencia" value="null">
				</div>
				<div class="p_25">
					<label for="referencias">Referencias: </label><br>
					<textarea id="referencias" class="cambio" name="referencias" cols="50" rows="5" placeholder="referencias" title="referencias" value="null" disabled>null</textarea>
					<input type="hidden" name="referencias" value="null">
				</div>

				<div>
					<label for="nacimiento">Fecha de nacimiento: </label>
					<input type="date" id="nacimiento" class="cambio" name="nacimiento" title="fecha nacimiento" required />
				</div>

				<div>
					<label for="m">Sexo: </label>
					<input type="radio" id="m" name="sexo" title="tipo de sexo" value="M" required />&nbsp;<label for="m">Masculino</label>
					&nbsp;&nbsp;&nbsp;
					<input type="radio" id="f" name="sexo" title="tipo de sexo" value="F" required />&nbsp;<label for="f">Femenino</label>
				</div>');
$st_select = '';

	for ($n=0; $n < count($st); $n++) { 
		$st_select .= '<option value="' . $st[$n]['status_id'] . '">' . $st[$n]['status'] . '</option>';}
				printf('
		
			<div class="p_25">
				<label for="contacto-lista">Status: </label>
				<select name="status" placeholder="Status" required>		
					<option value="">Status</option>
					%s
				</select>
			</div>', $st_select);
			printf('
				<div>
					<label for="fecha_ingreso">Fecha de Ingreso: </label>
					<input type="date" id="fecha_ingreso" class="cambio" name="fecha_ingreso" title="fecha de ingreso" required />
				</div>');
				$rl_select = '';

	for ($n=0; $n < count($rl); $n++) { 
		$rl_select .= '<option value="' . $rl[$n]['role_id'] . '">' . $rl[$n]['role'] . '</option>';}
printf('
			<div class="p_25">
				<label for="contacto-lista">Role: </label>
				<select name="role" placeholder="role" required>		
					<option value="">Role</option>
					%s
				</select>
			</div> 
			', $rl_select);
printf('
				<div class="p_25">
				<label for="password">Ingresa el Password: </label>
				<input type="password" name="pass" placeholder="password" required>
				</div>');
$cargo = '';

	for ($n=0; $n < count($cg); $n++) { 
		$cargo .= '<option value="' . $cg[$n]['cargo_id'] . '">' . $cg[$n]['cargo'] . '</option>';}
printf('
		
			<div class="p_25">
				<label for="contacto-lista">Cargo: </label>
				<select name="cargo" placeholder="Cargo" required>		
					<option value="">Cargo</option>
					%s
				</select>
			</div>', $cargo);
			printf('
				<div>
					<label for="foto">Foto: </label>
					<div class="adjuntar-archivo cambio">
						<input type="file" id="foto" name="foto" title="Sube tu foto" />
					</div>
				</div>
				<div>
					<input type="submit" id="enviar-alta" class="button add cambio" name="enviar_btn" value="Agregar" />
					<input type="hidden" name="r" value="user-add">
					<input type="hidden" name="crud" value="set">
				</div>
		</fieldset>
	</form>
</div>

');
/*(documento, nombres, apellidos, curso, acudiente, direccion, estudios, experiencia, referencias, nacimiento, sexo, status, fecha_ingreso, role, pass, cargo, imagen) */
}else if($_POST['r'] == 'user-add' && $_SESSION['role'] == 2 && $_POST['crud'] == 'set' ) {
	$users_controller = new UsersController();

	$documento = $_POST["documento"];
	$nombres = $_POST["nombres"];
	$apellidos = $_POST["apellidos"];
	$curso = $_POST["curso"];
	$acudiente = $_POST["acudiente"];
	$direccion = $_POST["direccion"];
	$estudios = $_POST["estudios"];
	$experiencia = $_POST["experiencia"];
	$referencias = $_POST["referencias"];
	$nacimiento = $_POST["nacimiento"];
	$sexo = $_POST["sexo"];
	$status = $_POST["status"];
	$fecha_ingreso = $_POST["fecha_ingreso"];
	$role = $_POST["role"];
	$pass = $_POST["pass"];
	$cargo = $_POST["cargo"];


	$imagen_generica = ($sexo=="M")?"amigo.png":"amiga.png";
	

	/*echo $documento.'-'.$nombres.'-'.$apellidos.'-'.$curso.'-'.$acudiente.'-'.$direccion.'-'.$estudios.'-'.$experiencia.'-'.$referencias.'-'.$nacimiento.'-'.$sexo.'-'.$status.'-'.$fecha_ingreso.'-'.$role.'-'.$pass.'-'.$cargo;*/
	$userg = $users_controller->get($documento);
		
	if(empty($userg)){

		include("funciones.php");
	$tipo = $_FILES["foto"]["type"];
	$archivo = $_FILES["foto"]["tmp_name"];
	$se_subio_imagen = subir_imagen($tipo,$archivo,$documento);

	//Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica, sino entonces el nombre de la foto que se subio.
	$imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;
	

	$new_user = array(
		'documento' =>  $documento, 
		'nombres' =>  $nombres, 
		'apellidos' =>  $apellidos,
		'curso' =>  $curso,
		'acudiente' =>  $acudiente, 
		'direccion' =>  $direccion,
		'estudios' =>  $estudios, 
		'experiencia' =>  $experiencia, 
		'referencias' =>  $referencias,
		'nacimiento' =>  $nacimiento,
		'sexo' =>  $sexo,
		'status' =>  $status,
		'fecha_ingreso' =>  $fecha_ingreso,
		'role' =>  $role,    
		'pass' =>  $pass,
		'cargo' =>  $cargo,
		'imagen' =>  $imagen 
		
	);
	

	$user = $users_controller->set($new_user);
	if(!isset($user)){
		$template = '
			<div class="container">
				<p class="item  add">Usuario <b>%s</b> salvado</p>
			</div>
			<script>
				window.onload = function () {
					reloadPage("crear")
				}
			</script>
		';

		printf($template, $documento);
	}else
		echo "No se pudo dar de alta al contacto con el documento <b>$documento</b> :(";
}else

{
	echo '<div class="container">
			<p class="item  error">No se pudo dar  de alta al contacto con el documento <b>$documento</b> por que ya existe :/</p>
			</div>';
}

}
else {
	$controller = new ViewController();
	$controller->load_view('error401');
}