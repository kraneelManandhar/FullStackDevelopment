<?php
try{
	if (fopen("booklist.txt", 'r')){
		$file = fopen("booklist.txt", "r") or die("Error: Unable to open the file.");
		echo "File open successfully<br>";
	}else {
		throw new Exception("Error: Unable to open file.<br>");
	}
	
}catch(Exception $e){
	echo $e->getMessage();
}finally{
	if (isset($file)){
		fclose($file);
		echo "File Handling process completed";
	}
	}
	
?>