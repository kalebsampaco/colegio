<?php 
print('
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Colegio</title>
	<meta name="description" content="Bienvenid@s a Colegio">
	<link rel="shortcut icon" type="image/png" href="./public/img/favicon.png">
	<link rel="stylesheet" href="./public/css/responsimple.min.css">
	<link rel="stylesheet" href="./public/css/mexflix.css">
</head>
<body>
	<header class="container  center  header">
		<div class="item  i-b  v-middle  ph12  lg2  lg-left">
			<h1 class="logo">Colegio</h1>
		</div>
');

if($_SESSION['ok'] && $_SESSION['role'] == 1)
{
	print('
		<nav class="item  i-b  v-middle  ph12  lg10  lg-right  menu">
			<ul class="container">
				<li class="nobullet  item  inline"><a href="./">Inicio</a></li>
				<li class="nobullet  item  inline"><a href="cambiar">Cambio de Datos</a></li>
				<li class="nobullet  item  inline"><a href="buscar">Buscar funcionario</a></li>
				<li class="nobullet  item  inline"><a href="graficos">Gráficos</a></li>
				<li class="nobullet  item  inline"><a href="salir">Salir</a></li>
			</ul>
		</nav>
	');
}else if($_SESSION['ok'] && $_SESSION['role'] == 2)
{
	print('
		<nav class="item  i-b  v-middle  ph12  lg10  lg-right  menu" methos="POST">
			<ul class="container">
				<li class="nobullet  item  inline"><a href="./">Inicio</a></li>
				<li class="nobullet  item  inline" value="crear"><a href="crear" value="crear">Crear Usuario</a></li>
				<li class="nobullet  item  inline"><a href="cambiar">Cambiar Datos</a></li>
				<li class="nobullet  item  inline"><a href="buscar">Buscar funcionario</a></li>
				<li class="nobullet  item  inline"><a href="asignar">Asignaciones</a></li>
				<li class="nobullet  item  inline"><a href="info">Creación y cambios generales</a></li>
				<li class="nobullet  item  inline"><a href="salir">Salir</a></li>
			</ul>
		</nav>
	');
} else if($_SESSION['ok'] && $_SESSION['role'] == 3)
{
	print('
		<nav class="item  i-b  v-middle  ph12  lg10  lg-right  menu">
			<ul class="container">
				<li class="nobullet  item  inline"><a href="./">Inicio</a></li>
				<li class="nobullet  item  inline"><a href="logros">Logros</a></li>
				<li class="nobullet  item  inline"><a href="taller">Subir taller</a></li>
				<li class="nobullet  item  inline"><a href="notas">subir Notas</a></li>
				<li class="nobullet  item  inline"><a href="salir">Salir</a></li>
			</ul>
		</nav>
	');
}else if($_SESSION['ok'] && $_SESSION['role'] == 4)
{
	print('
		<nav class="item  i-b  v-middle  ph12  lg10  lg-right  menu">
			<ul class="container">
				<li class="nobullet  item  inline"><a href="./">Inicio</a></li>
				<li class="nobullet  item  inline"><a href="mtaller">Mirar Taller</a></li>
				<li class="nobullet  item  inline"><a href="enotas">Mirar Notas</a></li>
				<li class="nobullet  item  inline"><a href="salir">Salir</a></li>
			</ul>
		</nav>
	');
}

print('
	</header>
	<main class="container  center  main">
');