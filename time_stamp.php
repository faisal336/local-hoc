<?php
// Define the file path for the timestamp log
$filePath = '/var/www/html/hoc-test/timestamp.log';

// Get the current timestamp (date and time)
$currentTimestamp = date('Y-m-d H:i:s');

// Check if the file exists, create it if not
if (!file_exists($filePath)) {
    // Attempt to create the file
    $createFile = touch($filePath); // This will create an empty file if it doesn't exist
    if (!$createFile) {
        echo "Error: Unable to create file.";
        exit(1);
    }
}

// Open the file in append mode (create if not exists)
$fileHandle = fopen($filePath, 'a');

if ($fileHandle === false) {
    // Error opening file
    echo "Error: Unable to open file.";
    exit(1);
}

// Write the current timestamp to the file
$writeResult = fwrite($fileHandle, $currentTimestamp . PHP_EOL);

if ($writeResult === false) {
    // Error writing to file
    echo "Error: Unable to write to file.";
    fclose($fileHandle); // Close file handle
    exit(1);
}

// Close the file handle
fclose($fileHandle);

// Success message
echo "Current timestamp has been stored in $filePath.";
?>
