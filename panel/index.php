<?php
include 'encrypt.php';
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STON PANEL</title>
  
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
    <script>
		
function openwin1() {
window.open('about:blank','popwin','width=400,height=300');
f1.submit();
}
</script>
</head>
<body>
<?php

if(($_POST['id'] == $adminID && $_POST['pw'] == $adminPW) || ($_COOKIE['adminid'] == AesEncrypt($adminID) && $_COOKIE['adminpw'] == AesEncrypt($adminPW)))
{
	if(!isset($_COOKIE['adminid']))
	{
        SetCookie("adminid", AesEncrypt($_POST['id']));
        SetCookie("adminpw", AesEncrypt($_POST['pw']));
	}

?>

  <section id="container">
    <header class="header black-bg">
	<ul style="
    background-color: #f33d3d;
    height: 3px;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: 100;">
	<a href="index.php" style="
		position: absolute;
  		top: 16px;
 		left: 920px;
		font-size: 22px;
		font-family: Sans-Serif;
		color: white;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='white';"><strong>STON </strong></a>

	<a href="index.php" style="
		position: absolute;
  		top: 16px;
 		left: 987px;
		font-size: 22px;
		font-family: Sans-Serif;
		color: #F13B40;"><strong>PANEL</strong></a>

	  <a href="index.php" style="
		position: absolute;
  		top: 53px;
 		left: 825px;
		font-size: 16px;
		font-family: Sans-Serif;
		color: #F13B40;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='#F13B40';"><strong>ADD CODE</strong></a>

      <a href="index2.php" style="
		position: absolute;
  		top: 53px;
 		left: 945px;
		font-size: 16px;
		font-family: Sans-Serif;
		color: #4E5054;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='#4E5054';"><strong>CODE LIST</strong></a>
		
		<a href="login.php" style="
		position: absolute;
  		top: 53px;
 		left: 1065px;
		font-size: 16px;
		font-family: Sans-Serif;
		color: #4E5054;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='#4E5054';"><strong>LOGOUT</strong></a>

	
	</header>

	<section id="main-content"
	style="position: absolute;
			top: 100px;
 		    left: 220px;>
	  <section class="wrapper">
	     <div class="row mt">
		 
		  <div class="col-md-4">
            <div class="form-panel" style="
    		padding-right: 30px;
  			border-right-width: ‒100;
  			border-right-width: 33px;
  			width: 1116px;
			margin-left: 0px;
			">
		      
		  	  <form name="f1" action="admin.php" class="form-horizontal style-form" target="popwin">
			    <input type="hidden" name="mode" value="createcode">
			    <select name="date" class="form-control">
			      <option value="1">1DAY</option>
			      <option value="7">7DAY</option>
			      <option value="14">14DAY</option>
			      <option value="30">30DAY</option>
                </select>
			    <br />
			    <input type="text" name="count" class="form-control" placeholder="AMOUNT">
			    <br />
			    <input type="button" class="btn btn-theme btn-block" onClick="openwin1()" value="ADD">
		      </form>
		    </div>
		  </div>
		  
        </div>
		
	  </section>
	</section>
  </section>
<?php
 } else { echo "<script>alert(\"Please log in.\");history.back();</script>"; }
 ?>
</body>
</html>