<?php

require_once __DIR__ . "/../models/Student.php";
require_once __DIR__ . "/../../vendor/autoload.php";

use Jenssegers\Blade\Blade;

class StudentController {
    private Student $studentModel;
    private Blade $blade;

    public function __construct(Blade $blade) {
        $this->blade = $blade;
        
        // Include db.php and get the PDO connection
        require_once __DIR__ . "/../../db.php";
        // Make sure db.php sets up $pdo variable
        if (!isset($pdo)) {
            die("Database connection not established in db.php");
        }
        
        $this->studentModel = new Student($pdo);
    }

    public function index() {
        try {
            $students = $this->studentModel->all();
            return $students;
            
        } catch (PDOException $e) {
            die("Couldn't fetch students: " . $e->getMessage());
        }
    }
}
?>