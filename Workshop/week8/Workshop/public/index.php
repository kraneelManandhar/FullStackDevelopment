<?php

	require  __DIR__. "/../vendor/autoload.php";
	require_once __DIR__ . "/../app/controllers/StudentController.php";

	use Jenssegers\Blade\Blade;

	$views = __DIR__ . "/../app/views";
	$cache = __DIR__ . "/../cache";

	$blade = new Blade($views,$cache);

	// Create controller instance
$controller = new StudentController($blade);

// Call the index method to get students
$students = $controller->index();

// Render the view with the students data
echo $blade->render('index', ["students" => $students]);
?>