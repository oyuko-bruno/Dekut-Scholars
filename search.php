<?php
require('config.php');
$return = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "SELECT * FROM pdf_files
                WHERE id  LIKE '%" . $search . "%'
                OR title LIKE '%" . $search . "%' 
                OR file_name LIKE '%" . $search . "%' 
                OR cat LIKE '%" . $search . "%' 
            ";
} else {
    $query = "SELECT * FROM pdf_files";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $return .= '
    <div class="table-responsive" style="overflow-x: auto;">
    <table class="table table-bordered">
    <tr>
        <th>Download</th>
        <th>Title</th>
        <th>File Name</th>
        <th>ID</th> <!-- Add a new column for download links -->
    </tr>';
    while ($row1 = mysqli_fetch_array($result)) {
        $return .= '
        <tr>
         <td><a href="download.php?id=' . $row1["id"] . '">Download</a></td> <!-- Add download links here -->
        
        <td>' . $row1["title"] . '</td>
        <td>' . $row1["file_name"] . '</td>
       <td>' . $row1["id"] . '</td>
        </tr>';
            
    }
    echo $return;
} else {
    echo 'No results containing all your search terms were found.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
   
     /* Styles for the table and search results */
.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 8px;
    text-align: left;
}

/* Add responsive styles for different screen sizes */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }
    
    th, td {
        padding: 6px;
    }
}

@media (max-width: 576px) {
    table {
        font-size: 12px;
    }
    
    th, td {
        padding: 4px;
    }
}

/* Styles for search results message */
.no-results {
    font-size: 16px;
    text-align: center;
    margin-top: 10px;
    color: red;
}

  </style>
</head>
<body>