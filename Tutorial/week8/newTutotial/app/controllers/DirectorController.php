<?php
require_once 'file:///C:/xampp/htdocs/week8/newTutotial/app/models/Director.php';

class DirectorController {
    private Director $director;

    public function __construct() {
        require_once "file:///C:/xampp/htdocs/week8/newTutotial/config/db.php";
        $this->director = new Director($pdo);
    }

    public function getDirectors() {
        try {
            $directors = $this->director->getDirectors();
            require "file:///C:/xampp/htdocs/week8/newTutotial/app/views/movies.php";
        } catch(PDOException $e) {
            die("Couldn't fetch directors! " . $e->getMessage());
        }
    }

    public function editDirector() {
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit'])) {
            try {
                $id = $_POST['edit'];
                $name = $_POST['name'];
                $best_movie = $_POST['best_movie'];
                
                // Call the correct method with parameters
                $success = $this->director->editDirector($id, $name, $best_movie);
                
                // Redirect after successful edit
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } catch(PDOException $e) {
                die("Couldn't edit director! " . $e->getMessage());
            }
        }
    }
}
?>