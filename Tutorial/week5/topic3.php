<?php
$quote = "Happiness can be found even in the darkest of times, if one only remembers to turn on the light.";
// Question 1: Use strlen() to display the total number of characters

$len = strlen($quote);
echo $len. "<br>";

// Question 2: Use str_word_count() to count how many words are in the quote
echo "WordCount = " . str_word_count($quote). "<br>";
// Question 3: Use strrev() to reverse the entire quotation

echo "Reverse = " . strrev($quote). "<br>";

// Question 4: Use strpos() to check if the word "light" appears in the quote
// If it appears, display its position. If not, display a message.

if (strpos($quote,"light")){
	echo "Replace = " . strpos($quote,"light"). "<br>";
	echo $quote;

}else{
	echo "Not found in the text.";
}

// Question 5: Use str_replace() to replace the word "darkest" with "terrible"
// Then display the updated quote

echo "WordCount = " . str_word_count($quote). "<br>";
?>