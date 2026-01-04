<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movies</title>
	<link rel="stylesheet" href="././public/css/style.css">
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
