<?php 
	session_start();
	if(!isset($_SESSION['login_user'])) {
		$login_user = "Guest";
	}else {
		$login_user = $_SESSION['login_user'];
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<?php include 'header-links.php' ?>
		<style type="text/css">
			#jargon {
				text-align: center;
				color: black;
			}
			p {
				font-size: 35px;
			}
			strong	{
				color: #FFC107;
			}
		</style>
		<title>Konyaa Inc.</title>
	</head>
	<body>
		<div>
			<?php include 'header.php' ?>
		</div><br><br><br><br><br><br><br><br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4" id="jargon">
					<p>Cari kost <strong>idaman</strong><br>dengan harga <strong>terbaik</strong></p>
				</div>
				<div class="col-md-4"></div>
			</div><br><br>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form class="inline-form" action="result.php" method="get">
						<div class="form-group">
							<div class="input-group">
								<input type="text" class="form-control" name="s" placeholder="Binus University">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>	
								</span>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>

<!--
		<h2>Welcome <?php echo $login_user; ?></h2>
		<h3><a href="logout.php">Sign Out</a></h3>		
-->