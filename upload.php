<?php
include 'Classes/db.php';
define("SITEURL", "//localhost/VaidasD/File_share/");

$file_name = explode(".", $_FILES['file']['name']);

$encoded_file_name = md5($file_name[0]);
$target_file = "Files/" . $encoded_file_name . "." . $file_name[1];

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$db = new DB();

$db->store("INSERT INTO files (original_file_name, encoded_file_name, file_size) 
		VALUES ('" . $_FILES["file"]["name"] . "' ,'" . $encoded_file_name . "." . $file_name[1] . "','" . $_FILES["file"]["size"] ."')");

?>

<!DOCTYPE html>
<html>
<head>
	<title>File share!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-inverse bg-inverse">
	<a class="navbar-brand" href="#">File share!</a>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-3">File share!</h1>
			    <p class="lead">Here you can share your files!.</p>
			  </div>
			</div>

			<h2>Your file has been uploaded!</h2>
			<p>File name: <?php echo $_FILES['file']['name']; ?></p>
			<p>File size: <?= $_FILES['file']['size']; ?></p>
			<p>File link: <a href="<?= SITEURL; ?>Files/<?= $encoded_file_name; ?>.<?= $file_name[1]; ?> ">Download</a></p>
		</div>
	</div>
</div>

</body>
</html>