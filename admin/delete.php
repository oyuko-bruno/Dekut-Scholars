<?php
include "../inc/db.php";

// Check if the ID parameter is set in the URL
if (isset($_GET["id"])) {
  $file_id = $_GET["id"];

  // Delete the file from the database
  $delete_sql = "DELETE FROM pdf_files WHERE id = '$file_id'";
  if ($conn->query($delete_sql) === TRUE) {
    // Delete the physical file from the server
    $select_sql = "SELECT file_path FROM pdf_files WHERE id = '$file_id'";
    $result = $conn->query($select_sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $file_path = $row["file_path"];
      if (file_exists($file_path)) {
        unlink($file_path);
      }
    }
    echo "File deleted successfully.";
  } else {
    echo "Error deleting file: " . $conn->error;
  }

  $conn->close();
} else {
  echo "Invalid request.";
}
?>