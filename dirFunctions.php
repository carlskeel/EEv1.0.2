<?php
        
        
		
        /**
		    Given a starting $path, return the first directory where the first level
		    matches $key and the second level matches $version.		
        */
		/**
			Function grd tested and working 03/04/15
		*/
        function getRelevantDirectory($path, $key, $version)
		{
            $files1 = glob($path . '/*');
            foreach ($files1 as $file) 
			{
                if(strpos($file, $key) !== false){
                    $files2 = glob($file . '/*');
					//echo "I am the files2 b4 the 4each " . $files2 . " \n";
					// foreach ($files2 as $file) 
					// {
                        // $filet = basename($file);
						// echo "inside for each " . $filet . " \n";											
                    // }
                    foreach ($files2 as $file) 
					{
                        $filet = basename($file);
						//echo "inside for each " . $filet . " \n";
						if(strcmp($filet, $version) == 0){
							//echo "True Array passed version selection \n" . $version . "\n The variable file looking for the dir. \n " . $filet . "  \n HI from the bottom of getreldir! \n";
                            //echo "Match found of: " . $file . " \n";
							return $file;
                        }
						// else{
							// //echo "False Array passed version selection \n" . $version . "\n The variable file looking for the dir. \n " . $file . "  \n HI from the bottom of getreldir!";
                            // echo "F";
						// }						
                    }
                }
            }
        }
		//
        /**
		    
		*/
		/***/
        function zipIt()
		{
            //echo "inside zipit! \n";
			$callPath = './addons';
            $directoriesToZip = array();
            foreach($_POST['addons'] as $key => $version)
			{
                $directoriesToZip[] = getRelevantDirectory($callPath, $key, $version);
            }
            //to see whats in dir to zip array after grd is run on it. test is good.
			// $fdtz1 = $directoriesToZip;
			// foreach ($fdtz1 as $f1) 
			// {
			// //$filet = basename($file);
			// echo "inside for each fdtz var " . $f1 . " \n";											
			// }
			
			
			
			$destination = './zippedFolders/zippedFolders1.zip';
            addToZip($directoriesToZip, $destination);
			
        }
        
		
		/**
			Given an array of strings, which are paths to directories, 
			Create a new zip file and zip those directories
		 */
		/***/
		function addToZip($directories, $filename)
		{
			$d = $directories;
			foreach ($d as $f1) 
			{
				//$filet = basename($file);
				echo "\n inside for each aTz var \n" . $f1 . " \n";											
			}
			echo "\n passed output \n ".$filename. " \n";
			//tested correct values for dir and zipfile are being passed in.
			$zip = new ZipArchive();
			$zip->open($filename, ZipArchive::CREATE);
			foreach($directories as $value)
			{
				echo "checking value passed to 4each in aTz: \n " . $value . "\n";
				addDirToZip($value, $zip);
			}
			
			echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			$zip->close();            
		}
				
		

		/***/
		function addDirToZip($path, $zipFile)
		{
			echo "\n in aDirTZ \n ".$path." \n";
			$files = glob($path.'/*');
			//echo "\n in aDirTZ aft glob \n ".$files." \n";
			foreach ($files as $file)
			{
				echo "\n in aDirTZ aft glob \n ".$file." \n";
				is_dir($file) ? addDirToZip($file) : $zipFile->addFile($file, $file);
			}
			return;
		}	
			
		

		/***/
		// function addDirToZip($path, $zipFile)
		// {
		// //echo "inside addDirToZip \n" . $path ."\n";
		// $validFiles = array();
		// $files = glob($path . '/*');
		// echo "inside addDirToZip \n" . $files ;
		// foreach ($files as $file)
		// {
		// echo "inside addDirToZip 4e \n" . $file . "\n";
		// }
		// foreach ($files as $file)
		// {
		// if (is_dir($file)) {
		// $this->addDir($file, $file);
		// } else if (is_file($file))  {
		// $this->addFile($file, $file);
		// }
		// }
		// return;
		// }
		
		





 		
				

		/**
			* Call it.
			* zipIt();
			Author: Carl Skeel
		*/
		
?>		