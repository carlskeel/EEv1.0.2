<?php
	
	//include ('dirFunctions.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Expression Engine Add-on Manager v1.0.2</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="description" content="Expression Engine Add-on Manager v1.0 - Program which includes ">
	<meta name="keywords" content="Expression,Engine,Expression Engine,ExpressionEngine,HTML,CSS,XML,JavaScript,PHP,Add-ons,AOM,Addons,Add-ons,Add on Manager">
	<meta name="author" content="Carl Skeel">
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
		
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">	
	<link href="data:text/css;charset=utf-8," data-href="../dist/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">
	
	
	<link type="text/css" href="EEcss/EEselect.css" rel="stylesheet">
	
	
	
	
</head>

<body>
	<form id="form2" method="post" action="EEselected2.php">
	
		<div class="container-fluid">
			<div class="row topA">
				<div class="col-md-2"> <img src="images/EE_logo75wl.png" width="75" height="75" alt="Expression Engine"></div>
				<div class="col-md-9">
					<h1 class="text-right">Expression Engine Add-on Manager v1.0.2</h1>
				</div>
				<div class="col-md-1">
					
				</div>
			</div><!--End row top A-->
			
			<div class="row topB">
				<div class="col-md-5">
					<div class="AppBar">
						<div class="container">
							<h3 class="text-left">Addons</h3>
													
						</div>
					</div><!--EndAppBar-->
				</div>
				<div class="col-md-7">
				
				</div>				
			</div><!--End row top B-->
			
			<div class="row content">
				<div class="col-md-4">
					<fieldset>
						These are the Selections.
						<!--<pre>
							<?php						
								// if ($_POST) {
									// //echo '<pre>';
									// echo htmlspecialchars(print_r($_POST, true));
									// //echo '</pre>';
								// }							
							?>
						</pre>-->
						<!-- -->
						<pre>
							<?php
								echo "\n";
								foreach($_POST['addons'] AS $key => $version){
									echo "The addon {$key} is selected. \nThe version selected is {$version} \n";
								}
								echo "\n";
							?>
						</pre>
						
					</fieldset>
					<p id="formbuttons">
						<input type="button" name="prevb" id="prevb" value="Previous" onclick="window.location='EEselect.html'" />
						<?php /**/include ('dirFunctions.php'); ?>
						<input type="submit" name="nextb" id="nextb" value="Next" onclick="<?php /*zipIt(); */?>" />
						<!--  <input type="submit" name="nextb" id="nextb" value="Next" />-->
						<!-- <input type="button" name="prevb" id="prevb" value="Down" onclick="" /> -->
						<!---->
					</p>
					
				</div><!--End col mid 4-->
				<div class="col-md-4">
					<!--Place to view actual files selected.-->
					<pre><!---->
							<?php						
								if ($_POST) {
									//echo '<pre>';
									echo htmlspecialchars(print_r($_POST, true));
									//echo '</pre>';
								}
								zipit();
								
							?>
							
					</pre>			
					<!--<pre>
						<?php/*
							echo "\n";
							
							$dir = "./zippedFolders";
							$dirEntries = scandir($dir);
							echo "<table border='1' width='100%' >\n";
							echo "<tr><th colspan='4'>Directory listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
							echo "<tr>";
								echo "<th><strong><em>Name</em></strong></th>";								
							echo "</tr>\n";
							foreach ($dirEntries as $entry) {
								if ((strcmp($entry, '.') != 0) && (strcmp($entry, '..') != 0)) {
									$fullEntryName = $dir . "/" . $entry;
									echo "<tr><td>";
									if (is_file($fullEntryName))
									echo "<a href=\"$FullEntryName\">" . htmlentities($entry). "</a>";
									//
									else
										echo htmlentities($entry);									
									echo "</td>";
									echo "</tr>\n";
								}
							}
							echo "</table>\n";
							
							echo "\n";	*/
													
						?>		
					</pre>	-->
				</div><!--End col mid 4-->
				<div class="col-md-4">
					<!--Place to view next or test area.-->
					<?php/*							
						if ($_POST) {
							echo '<pre>';
							echo htmlspecialchars(print_r($_POST, true));
							echo '</pre>';
						}	*/	
							
					?>	
					<!--<pre>-->
						<?php/*
							echo "\n";
							
							$dir = "./addons";
							$dirEntries = scandir($dir);
							echo "<table border='1' width='100%' >\n";
							echo "<tr><th colspan='4'>Directory listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
							echo "<tr>";
								echo "<th><strong><em>Name</em></strong></th>";								
							echo "</tr>\n";
							foreach ($dirEntries as $entry) {
								if ((strcmp($entry, '.') != 0) && (strcmp($entry, '..') != 0)) {
									$fullEntryName = $dir . "/" . $entry;
									echo "<tr><td>";
									if (is_file($fullEntryName))
									echo "<a href=\"$FullEntryName\">" . htmlentities($entry). "</a>";
									//
									else
										echo htmlentities($entry);									
									echo "</td>";
									echo "</tr>\n";
								}
							}
							echo "</table>\n";
							
							echo "\n";*/
						?>		
					<!--</pre>-->
				</div><!--End col mid 4-->
				
			</div><!--End row content-->
							
			
			<div class="row foot">
				
				<div class="col-md-12 footctr">
					<p class="ftp1">v1.0-1.0.2 Author: Carl Skeel</p>
				</div>
				
			</div><!--End row foot-->
			
			<!--test area-->
			
			
		</div><!--EndCfluid-->
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- <script src="http://code.jquery.com/jquery-1.11.1.js"></script> -->
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		
		<!-- jQuery & JS files Located here. -->
		<script src="EEjs/EE.js" type="text/javascript" ></script>	
		<!--  -->
	
	</form><!--End Form Content Selector-->
</body>

</html> 