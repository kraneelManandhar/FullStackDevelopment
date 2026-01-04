<?php
require 'db.php';

function getDirectors(){
	global $pdo;
	try{$sql = "SELECT * FROM director";
	$stmt = $pdo->query($sql);
	return $stmt->fetchAll();}
	catch(PDOException $e){
		die("Couldn't fetch directors! ".$e->getMessage());
	}
}

$directors = getDirectors();

if($_SERVER['REQUEST_METHOD']==="POST"&&isset($_POST['edit'])){
	try{
		$id = $_POST['edit'];
		$name = $_POST['name'];
		$best_movie = $_POST['best_movie'];
		$sql = "UPDATE director SET name = ?, best_movie = ? WHERE id = ?";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([$name, $best_movie, $id]);
		header("Location: " . $_SERVER['PHP_SELF']);
		exit;
	}catch(PDOException $e){
		die("Couldn't edit director! ".$e->getMessage());
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movies</title>
	<style>
		table {
			border: 2px solid #000;
			border-collapse: collapse;
			padding: 10px;
			margin: 10px;
			table-layout: auto;
		}
		th, td {
			border: 1px solid #000;
			padding: 8px;
      width: 15vw;
      text-align: center;
		}
		input{
			border: none;
      width: 15vw;
			outline: none;
		}
	</style>
</head>
<body>
	<?php if($directors):?>
	<table>
		<tr>
			<th>Director</th>
			<th>Best Movie</th>
			<th></th>
		</tr>
	<?php foreach ($directors as $director ): ?>
	<form method="post">
		<tr>
			<td>
				<input type="text" name="name" value="<?=$director['name']?>">
			</td>
			<td>
				<input type="text" name="best_movie" value="<?=$director['best_movie']?>">
			</td>
			<td><button type="submit" name="edit" value="<?=$director['id']?>">Edit</button></td>
		</tr>
	</form>
	<?php endforeach; ?>
	</table>
	<?php endif ?>
</body>
</html>
