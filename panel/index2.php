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
		color: #4E5054;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='#4E5054';"><strong>ADD CODE</strong></a>

      <a href="index2.php" style="
		position: absolute;
  		top: 53px;
 		left: 945px;
		font-size: 16px;
		font-family: Sans-Serif;
		color: #F13B40;"
		onMouseover="this.style.color='#F13B40';" 
		onMouseout="this.style.color='#F13B40';"><strong>CODE LIST</strong></a>
		
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

	<section id="main-content">
	  <section class="wrapper">
	     <div class="row mt">
		 
		  
		  
          <div class="col-md-12"
          style="position: absolute;
 		        left: 0px;
                padding-left: 100px;
                padding-right: 100px">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
				<colgroup>
			      <col width="400">
				  <col width="100">
				  <col width="80">
				  <col width="100">
				  <col width="100">
			    </colgroup>
                <thead>
                  <tr>
                    <th style="color: #F13B40;">코드</th>
                    <th style="color: #F13B40;">기간</th>
                    <th style="color: #F13B40;">하드락횟수</th>
					<th style="color: #F13B40;">하드번호</th>
					<th></th>
                  </tr>
                </thead>
                <tbody>
				
				<?php
			    if($dh = opendir('Data/'))
				{
					while(($file = readdir($dh)) !== false)
					{
						if($file == '.' || $file == '..')
							continue;
						$getID = str_replace('_', '/', $file);
						$readCode = fopen('Data/' . $file, 'r');
						$getInfo = explode('|', fgets($readCode));
						fclose($readCode);
						echo "<tr class=\"\"><td>" . $getID . "</td><td>" . $getInfo[0] . "</td><td>" . $getInfo[3] . "</td><td>" . $getInfo[2] . "</td><td><button class=\"btn btn-danger btn-xs\" onClick=\"location.href='admin.php?mode=deletecode&name=$file'\"><i class=\"fa fa-trash-o \"></i></button></td><tr>";
					}
				}
		    	?>
				
                </tbody>
              </table>
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