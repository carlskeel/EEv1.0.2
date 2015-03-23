<?php
function addDirToZip($path, $zipFile){
            $files = glob($path . '/*');
            foreach ($files as $file) {
              is_dir($file) ? addDirToZip($file) : $zipFile->addFile($file, $file);
            }
            return;
        }
		
		function addToZip($directories, $filename) {
            $zip = new ZipArchive();
            $zip->open($filename, ZipArchive::CREATE);
            foreach($directories as $value){
                addDirToZip($value, $zip);
            }
            $zip->close();
        }
		
		function getRelevantDirectory($path, $key, $version) {
            $files1 = glob($path . '/*');
            foreach ($files1 as $file) {
                if(strpos($file, $key) !== false){
                    $files2 = glob($file . '/*');
                    foreach ($files2 as $file) {
                        if(strpos($file, $version) !== false){
                            return $file;
                        }
                    }
                }
            }
        }
		
		function zipIt(){
            $callPath = './addons';
            $directoriesToZip = array();
            foreach($_POST['addons'] as $key => $version){
                $directoriesToZip[] = getRelevantDirectory($callPath, $key, $version);
            }
            $filename = './zippedFolders/zippedFolders1.zip';
            addToZip($directoriesToZip, $filename);
        }
		/**/


///
///
///
///
// function checkForAssets($assetsinput){
	// if ($assetsinput, $assets) > 0) 
	// {	
		// foreach($assets[0] as $assetV)
		// echo $assetV . " \n ";
	// }
	// else
		// echo "There were no Assets Versions selected!";
// }
// 






		function zipIt(){
            $callPath = './addons';
            $directoriesToZip = array();//Changed from [] because the brackets only work with php 5.4 or higher on the server
            foreach($_POST['addons'] as $key => $version){
                $directoriesToZip[] = getRelevantDirectory($callPath, $key, $version);
            }
            $filename = './zippedFolders/zippedFolders1.zip';
            addToZip($directoriesToZip, $filename);
        }
		/**/

<?php include ('dirFunctions.php'); ?>
<input type="button" name="zipb" id="zipb" value="Zip It" onclick="<?phpzipIt();?>" />

<input type="text" name="addons[assets]" value="2.5">

<input type="text" name="addons[structure]" value="2.1">

 

 

foreach($_POST['addons'] AS $key => $addons)

{

                echo "The addon selected is {$key} and the version is {$addons}";

}

 

 

// The addon selected is assets and the version is 2.5

// The addon selected is structure and the version is 2.1

 

 

$addons = array('assets'                               => 2.5,

                'structure'                           => 2.1,

                );

								  
								  
								  
								  
								  
?>
 
 <?php
 //old stuff before array change.
 
 if (in_array("assetsV", $_POST)) {
								echo "\n" . "Got Assets! " . "\n";
								echo "The Version is:" . $_POST['optionsRadiosAssets'] . "! \n";
							}												
							if (in_array("matrixV", $_POST)) {
								echo "\n" . "Got Matrix! " . "\n";
								echo "The Version is:" . $_POST['optionsRadiosMatrix'] . "! \n";
							}
							if (in_array("structureV", $_POST)) {
								echo "\n" . "Got Structure! " . "\n";
								echo "The Version is:" . $_POST['optionsRadiosStructure'] . "! \n";
							}
							if (in_array("wygwamV", $_POST)) {
								echo "\n" . "Got Wygwam! " . "\n";
								echo "The Version is:" . $_POST['optionsRadiosWygwam'] . "! \n";
							}
							echo "\n";
							foreach( $_POST as $addons => $val ) {
								if( is_array( $addons ) ) {
									foreach( $assets as $itemOf) {
										echo $itemOf . "\n";
									}
								} else {
									echo $assets;
									echo $val;
								}
							}
							echo "\n";
 
 ?>
 
 <?php
							$Dir = "./addons";
							$DirEntries = scandir($Dir);
							echo "<table border='1' width='100%' >\n";
							echo "<tr><th colspan='4'>Directory listing for <strong>" . htmlentities($Dir) . "</strong></th></tr>\n";
							echo "<tr>";
								echo "<th><strong><em>Name</em></strong></th>";
								echo "<th><strong><em>Owner ID</emb></strong></th>";
								echo "<th><strong><em>Permissions</em></strong></th>";
								echo "<th><strong><em>Size</em></strong></th>";
							echo "</tr>\n";
							foreach ($DirEntries as $Entry) {
								if ((strcmp($Entry, '.') != 0) && (strcmp($Entry, '..') != 0)) {
									$FullEntryName = $Dir . "/" . $Entry;
									echo "<tr><td>";
									if (is_file($FullEntryName))
									echo "<a href=\"$FullEntryName\">" . htmlentities($Entry). "</a>";
									//echo "<a href=\"EEselected.php?filename=$Entry\">" . htmlentities($Entry). "</a>";
									else
										echo htmlentities($Entry);
										echo "</td><td align='center'>" . fileowner($FullEntryName);
									if (is_file($FullEntryName)) {
										$perms = fileperms($FullEntryName);
										$perms = decoct($perms % 01000);
										echo "</td><td align='center'>
										0$perms";
										echo "</td><td align='right'>" . number_format(filesize($FullEntryName), 0) . " bytes";
									}
									else
										echo "</td><td colspan='2'
										align='center'>&lt;DIR&gt;";
										echo "</td></tr>\n";
								}
							}
							echo "</table>\n";
?>		
 
 
 /* Table css .tg for populated data. for centerborder = margin:0px auto;*/
.tg  {border-collapse:collapse;border-spacing:0;border-style:solid;border-width:1px;border-color:#337AB7;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;border-color:#337AB7;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;border-color:#337AB7;overflow:hidden;word-break:normal;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-thcs{background-color:#337ab7;color:#333333;text-align:center}
.tg .tg-tdcs{background-color:#5bc0de}
/* Table css .tg for populated data End. */
 
 