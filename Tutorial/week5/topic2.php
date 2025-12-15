<?php
$hptags = "magic,wizards,school,friendship";
// Converts string to array. Each element is obtained by cutting the string atevery comma.
$tagsArray = explode(",", $hptags);
echo $tagsArray[0];
// We can use foreach method to loop through the array.
echo "<ul>";
foreach ($tagsArray as $tag) {
echo "<li>$tag</li>";
}
echo "</ul>";



$favAuthors = ["Oda","Kisimoto","Mikka"];

$implode = implode(" ", $favAuthors);

echo $implode;
?>