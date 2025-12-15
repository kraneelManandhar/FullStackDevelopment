<?php
// Open the file in READ mode ("r")
// This allows us to read the current contents of the file
if (file_exists("library_log.txt")) {
$file = fopen("library_log.txt", "r") or die("Unable to open file!");
// Read the entire file content
// echo $file;
// filesize() tells PHP how many bytes to read


$fileSize = filesize("library_log.txt");
$existingLogs = $fileSize > 0 ? fread($file, $fileSize) : "";


// Close the file after reading
fclose($file);
} else {
$existingLogs = "";
}

// Display existing logs in the browser
echo "<h3>Existing Logs:</h3>";
echo nl2br($existingLogs); // nl2br converts \n to <br>
// New log message to be added
$logMessage = "Sarayu maam taught us Full Stack Development\n";
// Open the file again, this time in APPEND mode ("a")
// Append mode allows us to add new content at the end of the file
$file = fopen("library_log.txt", "w") or die("Unable to open file!");
// Write the new log message into the file
fwrite($file, $logMessage);


// Close the file to save the changes
fclose($file);
// Confirmation message
echo "<p><strong>Log updated successfully.</strong></p>";
?>