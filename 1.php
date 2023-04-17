<html>
<head>
	<title>Koneksi Database MySQL</title>
</head>
<body>
	<h1>Demo Koneksi database MySQl</h1>
	<?php
	$con = mysqli_connect("localhost","root","","my_db");

	//Check connection

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MYSQL: " . mysqli_connect_error();
		exit;
	}
	?>
</body>
</html>
