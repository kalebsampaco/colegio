<?php

if($_SESSION['role'] == 1) {
printf('

<h1>Bienvedin@ Administrador</h1>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-left">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="documento">Cédula: </label><br>
		<input type="text" id="documento" class="cambio" name="documento_txt" placeholder="Escribe tu documento" title="Tu documento" value="');echo $_SESSION["documento"]; printf('" disabled required />	<input type="hidden" name="email_hdn" value="');
		echo $_SESSION["documento"]; 
		printf('"/>
	</div>
	
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="nombre">Nombre: </label><br>
		<input type="text" id="nombre" class="cambio " name="nombre_txt" placeholder="Escribe tu nombre" title="Tu nombre" value="'); echo $_SESSION["nombres"]; printf('" disabled required />
	</div>
	
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="apellidos">Apellidos: </label><br>
		<input type="text" id="apellidos" class="cambio" name="apellidos_txt" placeholder="Escribe tus apellidos" title="Tus apellidos" value="'); echo $_SESSION["apellidos"]; printf('" disabled required />
	</div>
	
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="direccion">Dirección: </label><br>
		<input type="text" id="direccion" class="cambio" name="direccion_txt" placeholder="Escribe tu dirección" title="Tu dirección" value="'); echo $_SESSION["direccion"]; printf('" disabled required />
	</div>
	
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="nacimiento">Fecha de nacimiento: </label><br>
		<input type="date" id="nacimiento" class="cambio" name="nacimiento_txt" title="Tu cumple" value="');echo $_SESSION["nacimiento"]; printf('" disabled required />
	</div>

	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="ingreso">Fecha de ingreso: </label><br>
		<input type="date" id="ingreso" class="cambio" name="ingreso_txt" placeholder="Tu fecha de ingreso" title="Tu fecha de ingreso" value="');echo $_SESSION["fecha_ingreso"]; printf('" disabled required />
	</div>
	
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
		<label for="cargo">Cargo: </label><br>
		<input type="text" id="cargo" class="cambio" name="cargo_txt" placeholder="Escribe el cargo" title="Tu cargo" value="'); echo $_SESSION["cargo"]; printf('" disabled required />
	</div>
</section>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-rigth">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-rigth">
		<label for="foto">Foto: </label>
		<br>
		<div class="imagen">
			<img src="');echo "public/img/fotos/".$_SESSION["imagen"];printf('" />
		</div>
	</div>
</section>
');
}else if($_SESSION['role'] == 2){
printf('
	<h1>Bienvedin@</h1>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-left">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="documento">Cédula: </label><br>
	<input type="text" id="documento" class="cambio" name="documento_txt" placeholder="Escribe tu documento" title="Tu documento" value="'); 
	echo $_SESSION["documento"]; printf('" disabled required />
	<input type="hidden" name="email_hdn" value="');
	echo $_SESSION["documento"]; 
	printf('"/>
	</div>

<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="nombre">Nombre: </label><br>
	<input type="text" id="nombre" class="cambio" name="nombre_txt" placeholder="Escribe tu nombre" title="Tu nombre" value="'); echo $_SESSION["nombres"]; printf('" disabled required />
</div>

<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="apellidos">Apellidos: </label><br>
	<input type="text" id="apellidos" class="cambio" name="apellidos_txt" placeholder="Escribe tus apellidos" title="Tus apellidos" value="'); echo $_SESSION["apellidos"]; printf('" disabled required />
</div>

<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="direccion">Dirección: </label><br>
	<input type="text" id="direccion" class="cambio" name="direccion_txt" placeholder="Escribe tu dirección" title="Tu dirección" value="'); echo $_SESSION["direccion"]; printf('" disabled required />
</div>

<div class="item  i-b  v-middle ph12  sm12  md12  lg-left">
	<label for="nacimiento">Fecha de nacimiento: </label><br>
	<input type="date" id="nacimiento" class="cambio" name="nacimiento_txt" title="Tu cumple" value="');echo $_SESSION["nacimiento"]; printf('" disabled required />
</div>

<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="ingreso">Fecha de ingreso: </label><br>
	<input type="date" id="ingreso" class="cambio" name="ingreso_txt" placeholder="Tu fecha de ingreso" title="Tu fecha de ingreso" value="');echo $_SESSION["fecha_ingreso"]; printf('" disabled required />
</div>

<div class="item  i-b  v-middle  ph12  sm12  md12 lg-left">
	<label for="cargo">Cargo: </label><br>
	<input type="text" id="cargo" class="cambio" name="cargo_txt" placeholder="Escribe el cargo" title="Tu cargo" value="'); echo $_SESSION["cargo"]; printf('" disabled required />
</div>
</section>	
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-rigth">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-rigth">
		<label for="foto">Foto: </label>
		<br>
		<div class="imagen">
			<img src="');echo "public/img/fotos/".$_SESSION["imagen"];printf('" />
		</div>
	</div>
</section>
');
}else
if($_SESSION['role'] == 3) {
printf('
	<h1>Bienvedin@ Profesor</h1>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-left">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="documento">Cédula: </label><br>
	<input type="text" id="documento" class="cambio" name="documento_txt" placeholder="Escribe tu documento" title="Tu documento" value="'); 
echo $_SESSION["documento"]; printf('" disabled required />
	<input type="hidden" name="email_hdn" value="');
	echo $_SESSION["documento"]; 
	printf('"/>
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="nombre">Nombre: </label><br>
	<input type="text" id="nombre" class="cambio" name="nombre_txt" placeholder="Escribe tu nombre" title="Tu nombre" value="'); echo $_SESSION["nombres"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="apellidos">Apellidos: </label><br>
	<input type="text" id="apellidos" class="cambio" name="apellidos_txt" placeholder="Escribe tus apellidos" title="Tus apellidos" value="'); echo $_SESSION["apellidos"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="nacimiento">Fecha de nacimiento: </label><br>
	<input type="date" id="nacimiento" class="cambio" name="nacimiento_txt" title="Tu cumple" value="');echo $_SESSION["nacimiento"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="ingreso">Fecha de ingreso: </label><br>
	<input type="date" id="ingreso" class="cambio" name="ingreso_txt" placeholder="Tu fecha de ingreso" title="Tu fecha de ingreso" value="');echo $_SESSION["fecha_ingreso"]; printf('" disabled required />
</div>
</section>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-rigth">
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="foto">Foto: </label><br>
	<div class="imagen">
		<img src="');echo "public/img/fotos/".$_SESSION["imagen"];printf('" />
	</div>
</div>
</section>
');
}else if($_SESSION['role'] == 4){
	printf('
	<h1>Bienvedin@ Estudiante</h1>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-left">
	<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="documento">Documento: </label><br>
	<input type="text" id="documento" class="cambio" name="documento_txt" placeholder="Escribe tu documento" title="Tu documento" value="'); 
echo $_SESSION["documento"]; printf('" disabled required />
	<input type="hidden" name="email_hdn" value="');
	echo $_SESSION["documento"]; 
	printf('"/>
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="nombre">Nombre: </label><br>
	<input type="text" id="nombre" class="cambio" name="nombre_txt" placeholder="Escribe tu nombre" title="Tu nombre" value="'); echo $_SESSION["nombres"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="apellidos">Apellidos: </label><br>
	<input type="text" id="apellidos" class="cambio" name="apellidos_txt" placeholder="Escribe tus apellidos" title="Tus apellidos" value="'); echo $_SESSION["apellidos"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="curso">Curso: </label><br>
	<input type="text" id="curso" class="cambio" name="curso_txt" title="Tu curso" value="');echo $_SESSION["curso"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="acudiente">Acudiente: </label><br>
	<input type="text" id="acudiente" class="cambio" name="acudiente_txt" title="Tu acudiente" value="');echo $_SESSION["acudiente"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="nacimiento">Fecha de nacimiento: </label><br>
	<input type="date" id="nacimiento" class="cambio" name="nacimiento_txt" title="Tu cumple" value="');echo $_SESSION["nacimiento"]; printf('" disabled required />
</div>
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="ingreso">Fecha de ingreso: </label><br>
	<input type="date" id="ingreso" class="cambio" name="ingreso_txt" placeholder="Tu fecha de ingreso" title="Tu fecha de ingreso" value="');echo $_SESSION["fecha_ingreso"]; printf('" disabled required />
</div>
</section>
<section class="item  i-b  v-middle  ph12  sm12  md6  lg-rigth">
<div class="item  i-b  v-middle  ph12  sm12  md12  lg-left">
	<label for="foto">Foto: </label><br>
	<div class="imagen">
		<img src="');echo "public/img/fotos/".$_SESSION["imagen"];printf('" />
	</div>
</div>
</section>
');
}