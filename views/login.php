<?php


error_reporting(E_ALL ^ E_NOTICE);
$op = $_GET["op"];
switch($op)
{
	case "somos":
		$contenido = "quienes_somos.php";
		$titulo = "Quienes Somos";
		break;

	case "vision":
		$contenido = "visionMision.php";
		$titulo = "Visión y Misión";
		break;

	case "contacto":
		$contenido = "contactenos.php";
		$titulo = "Contáctenos";
		break;
	
	default:
		$contenido = "inicio.php";
		$titulo = "colegio";
		break;
}

	print('
		
	<section id="contenido">
		<nav class="container clear item  i-b  v-middle  ph2  sm6 lg10  lg-left  menu  flex  flex-wrap">
			<ul class="item  floatl  ph12  sm6  md4  lg9">
				<li class="nobullet  item  inline item  flex-auto  ph12  sm12  md12 lg9"><a class="cambio" href="./">Home</a></li>
				<li class="nobullet  item  inline item  flex-auto  ph12  sm12  md12 lg9"><a class="cambio" href="?op=somos">Quienes somos</a></li>
				<li class="nobullet  item  inline item  flex-auto  ph12  sm12  md12 lg9"><a class="cambio" href="?op=vision">Visión y Misión</a></li>
				<li class="nobullet  item  inline item  flex-auto  ph12  sm12  md12 lg9"><a class="cambio" href="?op=contacto">Contáctenos</a></li>
			</ul>
			
<ul class="item  item floatl flex-auto  ph12  sm12  md4 lg3 lg-rigth">
	<form class="item i-b menu" method="post">
		<div class="p_25 item  flex-auto  ph12  sm6  md12 lg3">
			<input type="text" name="user" placeholder="usuario" required>
		</div>
		<div class="p_25 item  flex-auto  ph12  sm6  md12 lg3">
			<input type="password" name="pass" placeholder="password" required>
		</d lg3iv>
		<div class="p_25 item  flex-auto  ph12  sm6  md12 lg3">
			<input type="submit" class="button cambio" value="Enviar">
		</div>
	</form>
	</ul>
	<ul class="item  item floatl flex-auto  ph12  sm6  md4 lg3 lg-rigth">
');

if( isset($_GET['error']) ) {
	$template = '
		<div class="container">
			<p class="item  error">%s</p>
		</div>
	';

	printf($template, $_GET['error']);
}

print('
</ul>
		</nav>
		<section id="principal">');
			include($contenido);
print('
		</section>
	</section>

	');

