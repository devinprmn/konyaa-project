<?php 

	$search = "";

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$search = test_input($_GET["s"]);
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

 ?>

 <h1><?php echo $search ?></h1>