<?php 

if( $_POST['r'] == 'notas-edit' && $_SESSION['role'] == 3 && !isset($_POST['crud']) ) {

$snt_controller = new SnotaController();

$snt = $snt_controller->getdoc($_POST['documento']);
$cc_controller = new CortesController();
$cc = $cc_controller->get();
$nt_controller = new NotaController();
$nt = $nt_controller->get();

$corte = '';

	for ($n=0; $n < count($cc); $n++) { 
		 $selected = ($cc[$n]['corte_id']==$snt[$n]['corte_id'])? ' selected':''; 
		$corte .= '<option value="' . $cc[$n]['corte_id'] .'"'.$selected.'>' . $cc[$n]['corte'] . '</option>';}

$nota= '';

	for ($n=0; $n < count($nt); $n++) { 
		 $selected = ($nt[$n]['nota_id']==intval($snt[$n]['nota_id']))? ' selected':''; 
		$nota .= '<option value="' . $nt[$n]['nota_id'] .'"'.$selected.'>' . $nt[$n]['nota'] . '</option>';}

$template_users = '
	<div class="item">
	<fieldset>
	<legend>Editar notas a Estudiante</legend>
		<table>
			<tr>
				<th>ID</th>
				<th>Documento</th>
				<th>Estudiante</th>
				<th>Año</th>
				<th>Corte</th>
				<th>Logro</th>
				<th>Nota</th>
			</tr>';

for ($n=0; $n < count($snt); $n++) {
$result=0; 
$div=++$n;
$result+=$snt[$n]['nota'];
$template_users .= '
			<tr>
				<td>' . $snt[$n]['notaestu_id'] . '</td>
				<td>' . $snt[$n]['documento'] . '</td>
				<td>' . $snt[$n]['nombres'].' '.$snt[$n]['apellidos'].'</td>
				<td>' . $snt[$n]['año'] . '</td>
				<td>
					<div id="curso" class="item  ph12  sm2  md2  lg2">
						<label for="corte">Corte: </label><br>
						 <select name="corte" form="envio" placeholder="Corte" >		
							<option value="">Corte</option>
							'.$corte.'
							
						</select>
					</div>
				</td>
				<td>
					<textarea row="4" name="" cols="50" form="envio" disabled>'.$snt[$n]['logro'].'</textarea>
					<input type="hidden" name="logro"  form="envio" value="'.$snt[$n]['id_logro'].'">
				</td>
				<td>
					<div id="curso" class="item ph12  sm2  md2  lg2">
						<label for="nota">Nota: </label><br>
						<select name="nota" form="envio" placeholder="Nota" >		
							<option value="">Nota</option>
							'.$nota.'
							
						</select>
					</div>
				</td>
				<td><form method="POST" class="item" id="envio">
						<input type="hidden" name="r" value="notas-edit">
						<input type="hidden" name="documento" value="' . $snt[$n]['documento'] . '">
						<input type="hidden" name="curso" value="' . $snt[$n]['curso'] . '">
						<input class="button  edit" type="submit" value="Editar">
					</form>

				</td>
			</tr>
			
			

		'; }
	
		$template_users .= '
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>acumulado de corte</td>
				<td>
					<output name="result" form="envio">'.$result/$div.'</output>
				</td>
			</tr>
		</table>
	</fieldset>
	</div>';
	print($template_users);
}