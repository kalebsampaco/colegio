<?php 
class Router {
	public $route;

	public function __construct($route) {
		//http://php.net/manual/es/function.session-start.php
		//http://php.net/manual/es/session.configuration.php
		//buscar opciones en el PHP.INI
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);

		if( !isset($_SESSION) )  session_start($session_options);

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok'] && $_SESSION['role'] == 1) {
			//Aquí va toda la programación de nuestra webapp
			
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
			switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;

				case 'cambiar':
					if( !isset( $_POST['r'] ) ) $controller->load_view('cambiar');
					else if( $_POST['r'] == 'user-edit' )  $controller->load_view('form_cambio');
					/*else if( $_POST['r'] == 'movieserie-edit' )  $controller->load_view('movieserie-edit');*/
					break;

				case 'buscar':
					if( !isset( $_POST['r'] ) )  $controller->load_view('buscar');
					/*else if( $_POST['r'] == 'user-add' )  $controller->load_view('user-add');
					else if( $_POST['r'] == 'user-edit' )  $controller->load_view('user-edit');
					else if( $_POST['r'] == 'user-delete' )  $controller->load_view('user-delete');*/
					break;

				case 'graficos':
					if( !isset( $_POST['r'] ) )  $controller->load_view('graficos');
					else if( $_POST['r'] == 'graficos' )  $controller->load_view('graficos');
					/*else if( $_POST['r'] == 'status-edit' )  $controller->load_view('status-edit');*/
					break;

				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
			}} else if($_SESSION['ok'] && $_SESSION['role'] == 2){
				$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
				switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;

				case 'crear':
					$controller->load_view('crear');
					/*else if( $_POST['r'] == 'movieserie-add' )  $controller->load_view('movieserie-add');
					else if( $_POST['r'] == 'movieserie-edit' )  $controller->load_view('movieserie-edit');
					else if( $_POST['r'] == 'movieserie-delete' )  $controller->load_view('movieserie-delete');
					else if( $_POST['r'] == 'movieserie-show' )  $controller->load_view('movieserie-show');*/
					break;

				case 'cambiar':
					if( !isset( $_POST['r'] ) )  $controller->load_view('cambiar');
					else if( $_POST['r'] == 'user-edit' )  $controller->load_view('form_cambio');
					/*else if( $_POST['r'] == 'user-add' )  $controller->load_view('user-add');
					else if( $_POST['r'] == 'user-delete' )  $controller->load_view('user-delete');*/
					break;

				case 'buscar':
					if( !isset( $_POST['r'] ) )  $controller->load_view('buscar');
					/*else if( $_POST['r'] == 'status-add' )  $controller->load_view('status-add');
					else if( $_POST['r'] == 'status-edit' )  $controller->load_view('status-edit');
					else if( $_POST['r'] == 'status-delete' )  $controller->load_view('status-delete');*/
					break;

				case 'asignar':
					if( !isset( $_POST['r'] ) )  $controller->load_view('asignar');
					else if( $_POST['r'] == 'asignar-set' )  $controller->load_view('asignar-set');
					else if( $_POST['r'] == 'asignar-edit' )  $controller->load_view('asignar-edit');
					else if( $_POST['r'] == 'asignar-delete' )  $controller->load_view('asignar-delete');
					break;

				case 'info':
					if( !isset( $_POST['r'] ) )  $controller->load_view('info');
					else if( $_POST['r'] == 'info-add' )  $controller->load_view('info-add');
					else if( $_POST['r'] == 'info-edit' )  $controller->load_view('info-edit');
					else if( $_POST['r'] == 'info-delete' )  $controller->load_view('info-delete');
					/*else if( $_POST['r'] == 'status-delete' )  $controller->load_view('status-delete');*/
					break;

				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
		}} else if($_SESSION['ok'] && $_SESSION['role'] == 3){
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
				switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;

				case 'logros':
					if( !isset( $_POST['r'] ) )  $controller->load_view('logros');
					else if( $_POST['r'] == 'logros-add' )  $controller->load_view('logros-add');
					else if( $_POST['r'] == 'logros-edit' )  $controller->load_view('logros-edit');
					/*else if( $_POST['r'] =='movieserie-delete')  $controller->load_view('movieserie-delete');
					else if( $_POST['r'] == 'movieserie-show' )  $controller->load_view('movieserie-show');*/
					break;

				case 'taller':
					if( !isset( $_POST['r'] ) ) $controller->load_view('taller');
					else if( $_POST['r'] == 'taller-add' )  $controller->load_view('taller-add');
					else if( $_POST['r'] == 'taller-edit' )  $controller->load_view('taller-edit');
					break;

				case 'notas':
					if( !isset( $_POST['r'] ) ) $controller->load_view('notas');
					else if( $_POST['r'] == 'notas-add' )  $controller->load_view('notas-add');
					else if( $_POST['r'] == 'notas-edit' )  $controller->load_view('notas-edit');
					break;

				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
		}}else if($_SESSION['ok'] && $_SESSION['role'] == 4){
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
			
			$controller = new ViewController();
				switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;

				case 'mtaller':
					$controller->load_view('mtaller');
					break;

				case 'enotas':
					$controller->load_view('enotas');
					break;
				
				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
					break;
		}


		} else {
			if( !isset($_POST['user']) && !isset($_POST['pass']) ) {
				//mostrar un formulario de autenticación
				$login_form = new ViewController();
				$login_form->load_view('login');
			}
			else {
				$user_session = new SessionController();
				$session = $user_session->login($_POST['user'], $_POST['pass']);

				if( empty($session) ) {
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewController();
					$login_form->load_view('login');
					header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password proporcionado no coinciden');
					
					} else if($session['status'] == 2){
						$login_form = new ViewController();
					$login_form->load_view('login');
					header('Location: ./?error=El usuario ' . $_POST['user'] . ' no esta activado');
				} else {
					//echo 'El usuario y el password son correctos';
					//var_dump($session);
					

					$_SESSION['ok'] = true;
					


					foreach ($session as $row) {
						$_SESSION['documento'] = $row['documento'];
						$_SESSION['nombres'] = $row['nombres'];
						$_SESSION['apellidos'] = $row['apellidos'];
						$_SESSION['curso'] = $row['curso'];
						$_SESSION['acudiente'] = $row['acudiente'];
						$_SESSION['direccion'] = $row['direccion'];
						$_SESSION['estudios'] = $row['estudios'];
						$_SESSION['experiencia'] = $row['experiencia'];
						$_SESSION['referencias'] = $row['referencias'];
						$_SESSION['nacimiento'] = $row['nacimiento'];
						$_SESSION['sexo'] = $row['sexo'];
						$_SESSION['status'] = $row['status'];
						$_SESSION['fecha_ingreso'] = $row['fecha_ingreso'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['pass'] = $row['pass'];
						$_SESSION['cargo'] = $row['cargo'];
						$_SESSION['imagen'] = $row['imagen'];
					}

					header('Location: ./');
				}
			}
		}
	}

	public function __destruct() {
		$this;
	}
}