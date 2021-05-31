<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STON PANEL</title>
  <link href="img/favicon.png" rel="icon">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
</head>

<body>
<?php

if(isset($_COOKIE['adminid']))
{
	setcookie("adminid", "", time() - 3600);
	setcookie("adminpw", "", time() - 3600);
}
?>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="index.php" method="POST">
        <h2 class="form-login-heading">STON PANEL</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="ID" autofocus name="id">
          <br>
          <input type="password" class="form-control" placeholder="PASSWORD" name="pw">
		  <br>
          <button class="btn btn-theme btn-block" href="index.php" type="submit">SIGN IN</button>
          <hr>
          <div class="registration">
			<br/>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
</body>

</html>
