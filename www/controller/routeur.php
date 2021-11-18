<?php
session_start();
// $cookie_name = "user";
// $cookie_value = "John Doe";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
require_once(File::build_path(array('controller', 'ControllerSignin.php')));
require_once(File::build_path(array('controller', 'ControllerAccueil.php')));
require_once(File::build_path(array('controller', 'ControllerPiece.php')));
require_once(File::build_path(array('controller', 'ControllerCommande.php')));
require_once(File::build_path(array('controller', 'ControllerVoiture.php')));

$controller_default = 'accueil';

if (!isset($_GET['controller'])) {
	$controller = $controller_default;
} else {
	$controller = $_GET['controller'];
}

$controller_class = 'Controller' . ucfirst($controller);

if (class_exists($controller_class)) {

	if (!isset($_GET['action'])) {
		$action = 'readAll';
	} else {
		$action = $_GET['action'];
	}
	if (isset($action)) {

		$class_methods = get_class_methods($controller_class);

		if (in_array($action, $class_methods)) {
			$controller_class::$action();
		} else {
			$controller_class::errorAction();
		}
	}
} else {
	$controller_class = 'ControllerAccueil';
	$controller_class::errorClass();
}
