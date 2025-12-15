<?php
$tbr = "Full Stack <br>";
$fileName = "wishlist.txt";
$laugh = "Haha";

if (file_exists($fileName)){
	$file = fopen("wishlist.txt",'w') or die("Unable to open");
	fwrite($file, $tbr);
	echo $tbr. " has been added to ". $fileName;
	echo file_get_contents("wishlist.txt");
	}else{
		echo "Not found";
	}
?>