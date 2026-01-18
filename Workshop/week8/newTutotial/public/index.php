<?php

require_once "../app/controllers/DirectorController.php";

	$directorController = new DirectorController();
	$directorController -> getDirectors();

?>