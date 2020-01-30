<?php 
$cr_controller = new CursoController();
$as_controller = new AsigController(); 
$cc_controller = new CortesController();

if( $_POST['r'] == 'taller-add' && $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {

			
			$cr = $cr_controller->get();
			
			$as = $as_controller->get();

			$cc = $cc_controller->get();

$curso = '';

	for ($n=0; $n < count($cr); $n++) { 
		
		$curso .= '<option value="'.$cr[$n]['curso_id'].'">' . $cr[$n]['curso'] . '</option>';}
$asig = '';

	for ($n=0; $n < count($as); $n++) { 
		
		$asig .= '<option value="'.$as[$n]['id_asig'].'">' . $as[$n]['asignatura'] . '</option>';}
$corte = '';

	for ($n=0; $n < count($cc); $n++) { 
		
		$corte .= '<option value="'.$cc[$n]['corte_id'].'">' . $cc[$n]['corte'] . '</option>';}

	$template_logro = '
	<div class="item">
	<fieldset>
		<h2 class="p1">Agregar Taller</h2>
		<form method="POST" class="item" enctype="multipart/form-data">
			
				<div class="item  i-b  lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="curso">Curso: </label><br>
					<select name="curso" placeholder="Curso" >		
						<option value="">Curso</option>
						%s
					</select>
				</div>
				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="asig">Asignatura: </label><br>
					<select name="asig" placeholder="Asignatura" >		
						<option value="">Asignatura</option>
						%s
					</select>
				</div>
				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="corte">Corte: </label><br>
					<select name="corte" placeholder="Corte" >		
						<option value="">Corte</option>
						%s
					</select>
				</div>
				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
					<label for="d-pdf">Subir taller</label>
					<div class="adjuntar-archivo cambio">
					<input type="file" name="d-pdf" id="d-pdf"></input>
					</div>
				</div>		
				<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg1">
					<input type="hidden" name="documento" value="%s" required>
				</div>
			<div class="item  i-b lg-v-top flex-auto ph12  sm6  md3  lg2">
				<input  class="button  add" type="submit" value="Agregar">
				<input type="hidden" name="r" value="taller-add">
				<input type="hidden" name="crud" value="set">
			</div>
		</form>
	</fieldset>
	</div>';
		printf($template_logro,
				$curso,
				$asig,
				$corte,
				$_SESSION['documento']);

} else if( $_POST['r'] == 'taller-add' && $_SESSION['role'] == 3 && $_POST['crud'] == 'set' ) {
	$ta_controller = new TController();
	
	$curso = $cr_controller->get($_POST['curso']);
	$asig = $as_controller->get($_POST['asig']);
	$corte = $cc_controller->get($_POST['corte']);

	
	
	$documento = $_POST['documento'];
/*foreach ($_FILES['d-pdf'] as $key => $value) {
	echo "Propiedad: $key --- Valor: $value<br>";
}*/
	$asig_curso = $curso[0]['curso'].'_'.$asig[0]['asignatura'];
 	$tamano = $_FILES["d-pdf"]['size']; 
    $tipo = $_FILES["d-pdf"]['type']; 
    $archivo = $_FILES["d-pdf"]['name']; 
    $tmp = $_FILES['d-pdf']['tmp_name'];
    $destino =  basename("/public/taller/".$asig_curso); 

    if ($tipo == "application/pdf" )  
    { 
        // guardamos el archivo a la carpeta ficheros 
         if(file_exists($destino))
				unlink($destino);
       move_uploaded_file($tmp,$destino);
         echo "Archivo subido"; 
          
         
 
	/*$archivo = $_FILES["d-pdf"]["tmp_name"];
	//$se_subio_taller= subir_taller($tipo,$archivo,$asig_curso);
 echo $archivo;
			
		
		
			//guardo la ruta que tendra en el servidor del pdf
            $destino= "/public/taller/".$asig_curso;
            //$subir_fichero = $destino.basename($_FILES['d-pdf']['name']);
            
            //Se sube la foto
            move_uploaded_file($_FILES["d-pdf"]["tmp_name"],$destino) or die("No se pudo subir pdf al Servidor :(");

            //Ejecuto la funcion para borrar posibles pdf dobles para el taller*/
            
           
	
           
	//echo '<br>'.$destino ;
	
	$new_taller = array(
		'no_trab' => 0,
		'curso' => intval($_POST['curso']),
		'asig' => intval($_POST['asig']),
		'corte' => intval($_POST['corte']),
		'trabajo' => $asig_curso,
		'documento' => $documento
	);

//var_dump($new_taller);
	$ta = $ta_controller->set($new_taller);

	$template = '
		<div class="container">
			<p class="item  add">Taller subido por <b>%s</b> salvado</p>
		</div>
		<script>
			window.onload = function () {
				reloadPage("taller")
			}
		</script>
	';

	printf($template, $documento);
	}else  
        { 
           echo "Error al subir el archivo no es un pdf 
           <script>
			window.onload = function () {
				reloadPage('taller')
			}
		</script>"; 
        }


} else {
	$controller = new ViewController();
	$controller->load_view('error401');
}
