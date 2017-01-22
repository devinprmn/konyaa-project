<?php 
	$n = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$n = $_POST['txtNum'];
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<select name="txtNum">
				<?php for ($i=1; $i < 32; $i++) { ?>
					<option value="<?php $i; ?>"><?php echo $i; ?></option>
				<?php } ?>	
			</select>
			<button type="submit">Submit</button>
		</form>
	</body>
</html>