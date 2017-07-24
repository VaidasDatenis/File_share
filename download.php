<?php
	include 'Classes/db.php';
	define("SITEURL", "//localhost/VaidasD/File_share/");
	$result = DB::query("SELECT * FROM files WHERE crypt = '" . $_GET['crypt'] . "'")[0];



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
			    <h2>Your file has been downloaded! <?= $result->original_file_name; ?></h2>
					<p>Your file: <?= $result->original_file_name; ?></p>
					<p>File size: <?= $result->file_size; ?></p>
					<p>Uploaded at  <?= $result->Upload_time; ?></p>
					<p>File link: <a download class="btn btn-primary" downlaod href="<?= SITEURL; ?>files/=<?= $result->encoded_file_name; ?>">Download</a></p>
			  </div>
			</div>


		</div>
	</div>
</div>

</body>
</html>