<?php
include "../inc/db.php";
?>
<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
      // User is not logged in, redirect to login page
      header("Location: ../login.php");
      exit(); // Stop executing further
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 250px;
      background-color: #343a40;
      padding-top: 20px;
      color: white;
      transition: all 0.3s ease;
    }
    .sidebar.active {
      margin-left: -250px;
    }
    .sidebar a {
      padding: 10px 20px;
      text-decoration: none;
      color: white;
      display: block;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s ease;
    }
    .content.active {
      margin-left: 0;
    }

    /* Media Query for Small Screens */
    @media (max-width: 768px) {
      .sidebar {
        margin-left: -250px;
      }
      .content {
        margin-left: 0;
      }
      .sidebar.active {
        margin-left: 0;
      }
    }
    .upload-box {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center">Admin Dashboard</h3>
    <ul class="list-unstyled">
      <li>
        <a href="../admin/index.php"><i class="fas fa-home"></i> BBIT</a>
      </li>
      <li>
        <a href="../admin/history.php"><i class="fas fa-list"></i> IT</a>
      </li>
      <li>
        <a href="../admin/geo.php"><i class="fas fa-share"></i> CS</a>
      </li>
      <li>
        <a href="../admin/cre.php"><i class="fas fa-building"></i> BCOM</a>
      </li>
      <hr/>
      <a href="../logout.php"><i class="fas fa-building"></i> LOGOUT</a>
    </ul>
  </div>

  <!-- Page Content -->
  <div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button type="button" id="sidebarCollapse" class="btn btn-dark">
        <i class="fas fa-bars"></i>
      </button>
    </nav>
   <div>

   <div class="row">
   <div class="upload-box">
    <h2 class="text-center mb-4">File Upload</h2>
    <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">TITLE</label>
        <input type="text" class="form-control" id="title" name="title"  required>
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Select PDF File</label>
        <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
      </div>
      <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $upload_dir ="../uploads/"; // Directory to store uploaded files
        $target_file = $upload_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["file"]["size"] > 5000000) { // 5MB
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }

        // Allow only PDF files
        if ($fileType != "pdf") {
          echo "Sorry, only PDF files are allowed.";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        } else {
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $title = $_POST["title"];
            $file_name = $_FILES["file"]["name"];
            $file_path = $target_file;
            $cat = '3';

            $sql = "INSERT INTO pdf_files (title,cat,file_name, file_path) VALUES ('$title','$cat','$file_name', '$file_path')";

            if ($conn->query($sql) === TRUE) {
              echo "The file $file_name has been uploaded and saved in the database.";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
      }
    ?>
      
  </div>
   </div>
   <div class="row">
   <div class="container-fluid">
     
     <!-- Sample Table -->
     <table class="table">
  <thead>
    <tr>
    <th>SNo.</th>
      <th>Title</th>
      <th>File Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Fetch data from the database
    $sql = "SELECT * FROM pdf_files WHERE cat='3'";
    $result = $conn->query($sql);
$i =1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $file_id = $row["id"];
        $file_name = $row["file_name"];
        $title = $row["title"];
        $file_path = ".../../../".$row["file_path"]."";  
    ?>
        <tr>
          <td><?php echo $file_id; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo $file_name; ?></td>
          <td>
          <a href="<?php echo $file_path; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>View PDF</a>
            <a href="<?php echo $file_path; ?>" download class="btn btn-warning"><i class="fas fa-download"></i>Download PDF</a>
            <a href="delete.php?id=<?php echo $file_id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Delete PDF</a>
          </td>
        </tr>
    <?php
    $i++;
      }
    } else {
      echo '<tr><td colspan="3">No files available</td></tr>';
    }
    ?>
  </tbody>
</table>
   </div>
   </div>
   </div>
  </div>

  <!-- Include Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle sidebar
    $("#sidebarCollapse").on("click", function () {
      $(".sidebar").toggleClass("active");
      $(".content").toggleClass("active");
    });
  </script>
</body>
</html>