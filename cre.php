<?php
include "inc/db.php";
?>
<?php
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
      // User is not logged in, redirect to login page
      header("Location: login.php");
      exit(); // Stop executing further
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dekut StudyRoom</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include Font Awesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <link rel="icon" href="http://dkutscholar.onlinewebshop.net/icon.png" type="image/x-icon">
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
  </style>
</head>
<body>
        
        
<!-- Updated HTML structure -->
<div class="search-bar">
    <form method="POST" action="live.php" class="form-inline">
        <div class="form-group mx-sm-3">
            <label for="search_query" class="sr-only">Search </label>
            <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Search any unit eg CIT 3102">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>
</div>


        <style>/* CSS to move the search button to the right */
/* CSS to style the search button and input field */
.search-bar form {
    display: flex;
    align-items: center;
}

/* Style the input field */
.search-bar .form-group {
    flex-grow: 1; /* Allow the input field to grow and take up remaining space */
    margin-right: 10px;
}

/* Style the search button and move it to the right */
.search-bar button {
    background-color: #007bff; /* Change the button background color */
    color: #fff; /* Change the text color */
    border: none;
    border-radius: 0;
    margin-left: auto; /* Move the button to the right */
}
                /* Center-align the text in the search input field */
.search-bar .form-group input {
    text-align: center; /* Center-align the text */
}



</style>
  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center">Student's Dashboard</h3>
    <ul class="list-unstyled">
            <li>
        <a href=""><i class="fas fa-home"></i> Home</a>
      </li>
      
       <li>
        <a href="index.php"><i class="fa-solid fa-network-wired"></i> BBIT</a>
      </li>
      <li>
        <a href="history.php"><i class="fa-solid fa-network-wired"></i> IT</a>
      </li>
      <li>
        <a href="geo.php"><i class="fa-solid fa-network-wired"></i> CS</a>
      </li>
      <li>
        <a href="cre.php"><i class="fa-regular fa-money-check-dollar"></i> BCOM</a>
      </li>
      <hr/>
      <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
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
   <div class="container-fluid">
     <!-- Sample Table -->
     <table class="table">
  <thead>
    <tr>
      <?php $i = 1;?>
      <th>SNo.</th>
      <th>Title</th>
      <th>File Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Fetch data from the database
    $sql = "SELECT * FROM pdf_files WHERE cat='4'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        
        $file_id = $row["id"];
        $file_name = $row["file_name"];
        $title = $row["title"];        
        $file_path = ".../../".$row["file_path"]."";
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $title; ?></td>
         <td><?php echo $file_name; ?></td>
          <td>
            <a href="<?php echo $file_path; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i>View PDF</a>
            <a href="<?php echo $file_path; ?>" download class="btn btn-danger"><i class="fas fa-download"></i>Download PDF</a>
          </td>
        </tr>
    <?php
    $i++;
      }
    } else {
      echo '<tr><td colspan="3">No files available</td></tr>';
      $conn->close();
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