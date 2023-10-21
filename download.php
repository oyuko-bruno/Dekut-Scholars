<?php
require('config.php');

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Fetch file information from the database
    $query = "SELECT * FROM pdf_files WHERE id = $fileId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $fileName = $row['file_path']; // Assuming you have a 'file_name' column in your database
        $filePath = 'uploads/' . $fileName; // Construct the file path

        // Check if the file exists on the server
        if (file_exists($filePath)) {
            // Set appropriate headers for file download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filePath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output it to the user
            readfile($filePath);
            exit;
        } else {
            // File not found
            echo 'File not found.';
        }
    } else {
        // Record with the given ID not found in the database
        echo 'Record not found in the database.';
    }
} else {
    // No file ID provided
    echo 'Invalid request.';
}
?>
