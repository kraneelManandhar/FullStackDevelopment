<?php
// Read the entire file into a variable
$existingLogs = file_get_contents("library_log.txt");
// Display existing logs
echo "<h3>Existing Logs:</h3>";
echo nl2br($existingLogs);
// New log message to add
$logMessage = "Sarayu borrowed '11/22/63'\n";
// Append the new log entry to the file
file_put_contents("library_log.txt", $logMessage, FILE_APPEND);
// Confirmation message
echo "<p><strong>Log updated successfully.</strong></p>";
?>