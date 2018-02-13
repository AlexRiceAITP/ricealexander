<?php  if(isset($_POST['submission'])){
    date_default_timezone_set("America/Chicago");
    $subDate = date("m-d-Y H:i:s");
	
    // create a directory for the current semester if there isn't one
    if (date('n') < 6) $semester = "Spring ".date("Y");
    else $semester = "Fall ".date("Y");
    $pathYear = $_SERVER['DOCUMENT_ROOT'].'/submissions/'.$semester.'/';

    if (!file_exists($pathYear)) mkdir($pathYear);


    // validate
    $error = ""; $image = false;
  
    if ($subTitle == null)
	  $error .= "title field is required<br>";
    else {
	  ///  submission title should be lowercase with underscores in place of spaces
	  ///  create a path to a store the new files
      $pathTitle = str_replace(' ','_', strtolower($subTitle));	
      $subPath = $pathYear.$pathTitle.'/';

	  if (file_exists($subPath))
        $error .= "a submission already exists with that title<br>";
    }
  
    if ($subAuth == null)
	  $error .= "author field is required<br>";
  
    ///  page can either have a file structure or a text structure
    if ($_FILES['subfile']['error'] > 0) {	
	  if ($subType == "Visual Art" || $subType == "Photography" || $subType == "Music")
		$error .= "we must have a submission file for ".$subType."<br>";
	
	  if ($submission == null) {
		$error .= "we must have a submission file or submission text<br>";
	  } else {
		$pageType = "text"; 
	    $fileExt = "";
	  }
	} else {
	  // File Validation
	  $pageType = "file";
      $fileExt = strtolower(pathinfo(basename($_FILES["subfile"]["name"]),PATHINFO_EXTENSION));
      $target_file = $subPath.'file.'.$fileExt;

      ///  check file size
      if ($_FILES['subfile']["size"] > 500000)
        $error .= "file is too large<br>";

      ///  allow certain file formats
      if($fileExt != "jpg" && $fileExt != "png" && $fileExt != "jpeg" && $fileExt != "gif" )
        $error .= "only JPG, JPEG, PNG & GIF files are allowed<br>";
	
	  $image = true;
    }

	
	if ($error != "") {
	  echo $error;
	  return;
	}
	echo "success!!";
	
	/* VARIABLES
	$subTitle   = A garden of roses
	$subAuth    = Yours T Ruly
	$subtype    = Poetry
	$submission = <<<poem here>>>
	$subDate    = submission date
	$semester   = Spring 2018
	$subPath    = ./submissions/Spring 2018/a_garden_of_roses
	$pageType   = text
	$fileExt   = ""
	*/

	// create a directory
	mkdir($subPath);
	
	// create a .txt file with submission content
    $indexTXT = fopen($subPath.'index.txt', "w");
    $contentTXT = $_POST['submission'];
    fwrite($indexTXT, $contentTXT);
    fclose($indexTXT);
	
	// create a .php file that users will access
    $indexPHP = fopen($subPath.'/index.php', "w");
    $contentPHP = "<?php\ninclude \$_SERVER['DOCUMENT_ROOT'].'/assets/header.php';\ninclude 'index.txt';\ninclude \$_SERVER['DOCUMENT_ROOT'].'/assets/footer.php';\n?>";
    fwrite($indexPHP, $contentPHP);
    fclose($indexPHP);
	
	// create a .json file with submission information
    $detailsJSON = fopen($subPath.'details.json', "w");
    $contentJSON = '{"submission": {"author": '.$subAuth.', "date": '.$subDate.', "ext": '.$fileExt.', "form": '.$pageType.', "path": '.$subPath.', "semester": '.$semester.', "title": '.$subTitle.', "type": '.$subType.'}}';
    fwrite($detailsJSON, $contentJSON);
    fclose($detailsJSON);
	
	// upload the image file
	if($image) move_uploaded_file($_FILES['subfile']["tmp_name"], $target_file);
  }
?>