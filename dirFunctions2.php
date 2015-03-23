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
		    Function to point to the initial directory and the destination directory 
		    and then iterate through the process using the current programs array information
		    and the current functions above.
		    Would like to rewrite later a more generic version that can be used against
		    any set of data passed form the page.
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
			//$destCopy = './testCopy/';
			//$srcCopy = $directoriesToZip;
			//recurCopy($srcCopy, $destCopy);
			
			$destination = './zippedFolders/zippedFolders1.zip';
            create_zip($directoriesToZip, $destination);
			
        }
        
		function recurCopy($srcCopy, $destCopy)
		{
			$directory = new RecursiveDirectoryIterator($srcCopy);

			foreach (new RecursiveIteratorIterator($directory) as $filename=>$current) {

			$src = $current->getPathName();
			$dest = $destCopy . $current->getFileName();
			echo "\n In 4e rc \n";
			echo "copy " .  $src . " => " . $dest  . "\n";
			echo "\n End In 4e rc \n";
			copy($src, $dest);
			}	
		}
		
		function addDir($filename, $localname)
		{
			echo "\n in ad ".$filname;
			$this->addEmptyDir($localname);
			$iter = new RecursiveDirectoryIterator($filename, FilesystemIterator::SKIP_DOTS);
			
			foreach ($iter as $fileinfo) {
				if (! $fileinfo->isFile() && !$fileinfo->isDir()) {
					continue;
				}
				
				$method = $fileinfo->isFile() ? 'addFile' : 'addDir';
				$this->$method($fileinfo->getPathname(), $localname . '/' .
				$fileinfo->getFilename());
			}
		} 

		function create_zip($files = array(),$destination = '',$overwrite = true) {
			//if the zip file already exists and overwrite is false, return false
			if(file_exists($destination) && !$overwrite) { return false; }
			//vars
			$valid_files = array();
			//if files were passed in...
			if(is_array($files)) {
				//cycle through each file
				foreach($files as $file) {
					echo "\n ha" . $file . "\n\n";
					//make sure the file exists
					if(file_exists($file)) {
						$valid_files[] = $file;
						//echo $file;
					}
				}
			}
			//if we have good files...
			if(count($valid_files)) {
				//create the archive
				$zip = new ZipArchive();
				if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
					return false;
				}
				//add the files
				foreach($valid_files as $file) {
					echo "\n test var " . $file . "\n\n";
					//$file2 = $file."/";
					//echo "\n test var2 " . $file2 . "\n\n";
					echo "\n test var basename " . basename($file) . "\n\n";
					//$zip->addFile($file, $file);
					//$zip->addFromString(basename($file), file_get_contents($file)); 
					if (is_dir($file)) {
						$zip->addDir($file, $file);
					} else if (is_file($file))  {
						$zip->addFile($file, $file);
					}
					
					
					echo "\n aft".$file." <- \n";
				}
				//debug
				echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
				
				//close the zip -- done!
				$zip->close();
				
				//check to make sure the file exists
				return file_exists($destination);
			}
			else
			{
				return false;
			}
		}


		
		
		
		
		function create_zip2()
		{
			$createZip = new createDirZip;
			$createZip->addDirectory('themes/');
			$createZip->get_files_from_folder('blog/wp-content/themes/', 'themes/');
			
			$fileName = 'tmp/archive.zip';
			$fd = fopen ($fileName, 'wb');
			$out = fwrite ($fd, $createZip->getZippedfile());
			fclose ($fd);
			
			$createZip->forceDownload($fileName);
			@unlink($fileName);	
		}
		
		function create_7a()
		{
			$createZip = new createDirZip;
			$createZip->addDirectory('themes/');
			$createZip->get_files_from_folder('blog/wp-content/themes/', 'themes/');
			
			$fileName = 'tmp/archive.zip';
			$fd = fopen ($fileName, 'wb');
			$out = fwrite ($fd, $createZip->getZippedfile());
			fclose ($fd);
			
			$createZip->forceDownload($fileName);
			@unlink($fileName);
		}
		
		
		class createDirZip extends createZip {
			
			function get_files_from_folder($directory, $put_into) {
				if ($handle = opendir($directory)) {
					while (false !== ($file = readdir($handle))) {
						if (is_file($directory.$file)) {
							$fileContents = file_get_contents($directory.$file);
							$this->addFile($fileContents, $put_into.$file);
						} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
							$this->addDirectory($put_into.$file.'/');
							$this->get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
						}
					}
				}
				closedir($handle);
			}
		}
		

		function create_zip7($directories, $filename)
		{
			$d = $directories;
			foreach ($d as $f1) 
			{
				//$filet = basename($file);
				echo "inside for each cz7 var \n" . $f1 . " \n";											
			}
			echo "dest \n".$filename."\n passedin.";
			// tested correct values for dir and zipfile are being passed in.
			$zip = new ZipArchive();
			$zip->open($filename, ZipArchive::CREATE);
			
			foreach($directories as $value)
			{
				
				echo "\n checking value passed to 4each in cz7: \n " . $value . "\n";
				get_files_from_folder($value, $zip);
			}
			$zip->close();            
		}

		
		function get_files_from_folder($directory, $put_into) {
			//echo "\n in gfff input \n".$directory." \n";	
			//$directory = $directory."/";
			//echo "\n in gfff input2 \n".$directory." \n";	
			if ($handle = opendir($directory)) {
				while (false !== ($file = readdir($handle))) {
					if (is_file($directory.$file)) {
						$fileContents = file_get_contents($directory.$file);
						$this->addFile($fileContents, $put_into.$file);
					} elseif ($file != '.' and $file != '..' and is_dir($directory.$file)) {
						$this->addDirectory($put_into.$file.'/');
						$this->get_files_from_folder($directory.$file.'/', $put_into.$file.'/');
					}
				}
			}
			closedir($handle);
		}
		
// function create_zip2($path)
// {
// //echo "hihihi \n";
// $zip = new ZipArchive();
// $zip_name = './zippedFolders/'.time().".zip"; // Zip name

// $zip->open($zip_name,  ZipArchive::CREATE);
// foreach ($files as $file) {
// echo $path = "yo".$file;
// if(file_exists($path)){
// $zip->addFromString(basename($path),  file_get_contents($path));  
// }
// else{
// echo"file does not exist";
// }
// }
// $zip->close();
// }
		
		
		/**			
			Author: Carl Skeel
		*/
		
?>		