<style type="text/css">
    #header {border-radius: 0px;}
</style>
<nav class="navbar navbar-default" id="header">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navnav">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a  href="/DOJO/"><img src="assets/img/logo.png" style="width: 80px;height: 50px;"></a>
        </div>
        <div class="collapse navbar-collapse" id="navnav">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['login_user'])) { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-heart"></span> Favorite</a></li>
                    <li><a href="/DOJO/registration.php"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>
                    <li><a href="/DOJO/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } else { ?>
                    <li><a href="#"><span class="glyphicon glyphicon-heart"></span> Favorite</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    <li><a href="/DOJO/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
