<?php 
	include("config.php");
?>
<html>
<head>
	<title>Dekut StudyRoom</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
     <link rel="icon" href="http://dkutscholar.onlinewebshop.net/icon.png" type="image/x-icon">

	<script>
	$(document).ready(function(){
		load_data();
		function load_data(query)
		{
			$.ajax({
			url:"search.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
		$('#search').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
		});
	});
	</script>
</head>
<body>
<div class="container-fluid">       
<div class="content-wrapper">
	<div class="container">
		<h1>Dekut StudyRoom Live Search</h1>
		<div class="row">
		<div class="col-xs-12">
			<input type="text" name="search" id="search" placeholder="Search" class="form-control" />
			<div id="result"></div>
		</div>
		</div>	
	</div>
</div>
</div>
        <style>
                /* Style the container-fluid */
.container-fluid {
    background-color: #f0f0f0;
    padding: 20px;
}

/* Style the content wrapper */
.content-wrapper {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the h1 */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style the search input */
#search {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-shadow: none;
}

/* Style the search result container */
#result {
    margin-top: 10px;
}

/* Style the search result items (you can customize further) */
.result-item {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 5px;
    background-color: #f9f9f9;
}

/* Style the search result link (you can customize further) */
.result-item a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

/* Add hover effect to the search result items */
.result-item:hover {
    background-color: #e0e0e0;
}

        </style>
</body>
</html>
