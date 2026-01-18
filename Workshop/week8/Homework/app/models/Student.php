
<?php
class Student {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email, $course) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
        );
        return $stmt->execute([$name, $email, $course]);
    }

    public function update($id, $name, $email, $course) {
        $stmt = $this->pdo->prepare(
            "UPDATE students SET name=?, email=?, course=? WHERE id=?"
        );
        return $stmt->execute([$name, $email, $course, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
