<?php 
	error_reporting(0);

	$name = $email = $userPassword = $gender = $location = "";
	$phone = $month = $day = $year = 0;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["txtName"]);
		$email = test_input($_POST["txtEmail"]);
		$userPassword = test_input($_POST["txtPassword"]);
		$gender = test_input($_POST["rbGender"]);
		$day = test_input($_POST["txtDay"]);
		$month = test_input($_POST["txtMonth"]);
		$year = test_input($_POST["txtYear"]);
		$phone = test_input($_POST["txtPhone"]);
		$location = test_input($_POST["lsLocation"]);
		
		$sDay = (string)$day;
		$sMonth = (string)$month;
		$sYear = (string)$year;
		$dob = $sYear.'-'.$sMonth.'-'.$sDay;

		$sPhone = (string)$phone;

		saveTo_MySQL($name,$email,$userPassword,$dob,$gender,$sPhone,$location);
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}	
	function saveTo_MySQL($name,$email,$userPassword,$dob,$gender,$sPhone,$location) {
		$servername = "localhost"; //103.31.250.98;
		$username = "root";//konyaane_admin;
		$password = "";//2va=BcW!R]8TXd-xgQ;
		$dbname = "konyaane_MsKonyaa";//konyaane_MsKonyaa;

		if (!empty($_POST)) {
			//Connect to MySQL
			$conn = new mysqli($servername, $username, $password, $dbname);

			//Check connection
			if ($conn->connect_error) {
				die('Connection failed: '.$conn->connect_error);
			}
			else {//Insert data
				$sql = "INSERT INTO msuser(name,email,password,dob,gender,phone,location) VALUES('$name','$email','$userPassword','$dob','$gender','$sPhone','$location')";
				$insert = $conn->query($sql);
				if ($insert) {
					$_SESSION['reg_status'] = "Successfully Registered!";
				} else {
					$_SESSION['reg_status'] = "Error: ".$sql."<br/>".$conn->error;
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
		<title>Register</title>
		<style>
			#phone::-webkit-outer-spin-button, #phone::-webkit-inner-spin-button {-webkit-appearance:none;margin:1;}
			#day,#month,#year {width: 92px;}
			#dayday {margin-left: -15px;}
			#male {margin-left: -15px;}
			#male,#female {margin-top:14px;width:217.3px;padding-right: 0px;}
			#pp {margin-top: 14px;margin-left: -15px;padding-right: 1px;width: 440px;}
			#ll {margin-top: 14px;margin-left: -15px;padding-right: 1px;width: 440px;}
			#ss {margin-top: 40px;margin-left: -15px;padding-right: 1px;}
		</style>
	 </head>
	<body>
		<div>
			<?php include 'header.php' ?>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8" style="font-size: 23px;"><h1>Registration</h1></div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form class="horizontal-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-console"></span></span>
								<input class="form-control" type="text" name="txtName" placeholder="Full Name" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<input class="form-control" type="email" name="txtEmail" placeholder="Email" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input class="form-control" type="password" name="txtPassword" placeholder="Password" required="">
							</div>
						</div>
						<div class="form-group" id="dayday">
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<input type="number" name="txtDay" placeholder="Day" min="1" max="31" class="form-control" id="day" required="">	
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<input type="number" name="txtMonth" placeholder="Month" min="1" max="12" class="form-control dob" id="month" required="">
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									<input type="number" name="txtYear" placeholder="Year" min="1990" max="2100" class="form-control" id="year" required="">
								</div>
							</div>
						</div>										
						<div class="form-group">
							<div class="col-md-6" id="male">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" name="rbGender" value="male" checked="" aria-label="">
									</span>
									<input type="text" name="txtGender" readonly="" value="Male" class="form-control">
								</div>
							</div>
							<div class="col-md-6" id="female">
								<div class="input-group">
									<span class="input-group-addon">
										<input type="radio" name="rbGender" value="female" aria-label="">
									</span>
									<input type="text" name="txtGender" readonly="" value="Female" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" id="pp">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
									<input class="form-control" type="number" name="txtPhone" id="phone" required="" placeholder="Phone Number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" id="ll">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
									<input list="locations" name="lsLocation" class="form-control" placeholder="Location" required="">
										<datalist id="locations">
											<option>Jakarta Barat</option>
											<option>Jakarta Utara</option>
											<option>Jakarta Timur</option>
											<option>Jakarta Selatan</option>
											<option>Jakarta Pusat</option>
											<option>Kota Bogor</option>
											<option>Kabupaten Bogor</option>
											<option>Kota Depok</option>
											<option>Kota Tangerang</option>
											<option>Kota Tangerang Selatan</option>
											<option>Kabupaten Tangerang</option>
											<option>Kota Bekasi</option>
										</datalist>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12" id="ss">
								<div class="input-group">
									<button type="submit" class="btn btn-primary" style="width: 425px;">Register</button>	
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
			<?php if (isset($_SESSION['reg_status'])) { ?>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<h3><?php echo $_SESSION['reg_status']; ?></h3>
						<?php session_unset('reg_status') ?>
						<?php header("location: /DOJO/login.php") ?>
					</div>
					<div class="col-md-4"></div>
				</div>
			<?php } ?>
		</div>
	</body>
</html>