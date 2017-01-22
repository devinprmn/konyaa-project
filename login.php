<?php 
	error_reporting(0);
	include 'config.php';

	session_start();

	$email = $password = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = test_input($_POST["txtEmail"]);
		$password = test_input($_POST["txtPassword"]);
		loginTo_MySQL($email,$password);
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function loginTo_MySQL($email,$password) {
		$dbservername = "localhost"; //103.31.250.98;
		$dbusername = "root";//konyaane_admin;
		$dbpassword = "";//2va=BcW!R]8TXd-xgQ;
		$dbname = "konyaane_MsKonyaa";//konyaane_MsKonyaa;

		if (!empty($_POST)) {
			//Connect to MySQL
			$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

			//Check connection
			if ($conn->connect_errno) {
				die('Connection failed: '.$conn->connect_error);
			}
			else {//Select data
				$myEmail=mysqli_real_escape_string($conn,$email);
				$myPass=mysqli_real_escape_string($conn,$password);

				$sql = "SELECT name FROM msuser WHERE email = '$myEmail' AND password = '$myPass'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$count = $result->num_rows;
				if ($count == 1) {
				 	$_SESSION['login_user']=$row["name"];
				 	header("location: /DOJO/");
				}else {
					$_SESSION['err'] = "Login Failed! Invalid email or password!";
				}
				$conn->close();
			}
		}
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<?php include 'header-links.php' ?>
		<title>Login</title>
		<style>
			#login {
				text-align: center;
			}

		</style>
	</head>
	<body>
		<div>
			<?php include 'header.php' ?>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6" id="login" style="font-size: 23px;"><h1>Login</h1></div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
										<input type="email" name="txtEmail" required="" placeholder="Email" class="form-control">
									</div><br>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
										<input type="password" name="txtPassword" required="" placeholder="Password" class="form-control">
									</div><br><br>
									<div class="input-group">
										<button type="submit" class="btn btn-primary" style="width: 455px;">Login</button>
									</div>
								</div>
							</form>				
						</div>
						<div class="col-md-3"></div>
					</div>
					<?php if (isset($_SESSION['err'])) { ?>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<h3><?php echo $_SESSION['err']; ?></h3>
								<?php session_unset('err') ?>
							</div>
							<div class="col-md-3"></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>

