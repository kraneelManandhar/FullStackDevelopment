<?php
class Student {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $sql = "SELECT * FROM students";
        $stmt = $this->pdo->query($sql);  // Fixed this line
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Added fetch mode for clarity
        return $students;
    }
}
?>