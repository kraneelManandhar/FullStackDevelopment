<?php
	
class Director {
    private PDO $pdo;
    
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo; 
    }

    public function getDirectors() {
        $sql = "SELECT * FROM director";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editDirector(int $id, string $name, string $best_movie) {
        $sql = "UPDATE director SET name = ?, best_movie = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $best_movie, $id]);
    }
}
?>