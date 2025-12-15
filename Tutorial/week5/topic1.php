<?php
// First we declare the function to determine book category based on length
function categorizeBook($pages) {
if ($pages < 100) {
return "Light Read";
} elseif ($pages < 300) {
return "Standard Novel";
} else {
return "Epic Saga";
}
}


function recommendBook($genre){
	if ($genre === "A Game of Thrones"){
		return "Fantasy Game";
	} else if ($genre === "Frankenstein"){
		return "Sci-Fi";
	}else if ($genre === "The Silent Patient"){
		return "Mystery";
	}else {
		return "Other genre";
	}
}

// Then we call that function to categorize a particular book
$harryPotterPages = 600;
$category = categorizeBook($harryPotterPages);
echo "Harry Potter is considered " . $category. "<br>";

$name = "Hello";


echo $name ." lies in ". recommendBook($name);
?>