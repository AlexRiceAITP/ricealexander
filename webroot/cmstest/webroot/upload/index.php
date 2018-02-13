<?php
  include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php';
  
  $subTitle = filter_input(INPUT_POST, 'title');
  $subAuth = filter_input(INPUT_POST, 'author');
  $subType = filter_input(INPUT_POST, 'subtype');
  $submission = filter_input(INPUT_POST, 'submission');
  

  if(isset($_POST['submission'])){

    // variables


    
    date_default_timezone_set("America/Chicago");
    $subDate = date("m-d-Y H:i:s");

	
    // create a directory for the current semester if there isn't one
    if (date('n') < 6) $semester = "Spring ".date("Y");
    else $semester = "Fall ".date("Y");
    $pathYear = $_SERVER['DOCUMENT_ROOT'].'/submissions/'.$semester.'/';

    if (!file_exists($pathYear)) mkdir($pathYear);

    // validate
    $error = "";
  
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
	  if ($submission == null)
		$error .= "we must have a submission file or submission text<br>";
	  else {
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
    }

	
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

    echo $error;
  /*
  if(isset($_POST['submission'])){

	

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
	
	// upload the file
	move_uploaded_file($_FILES['subfile']["tmp_name"], $target_file);*/
	
  }
?>
<h2>Upload</h2>
<form action="." method="post" enctype="multipart/form-data">
<h2>Submission Information</h2>

<table>
  <tr>
    <td>Title:</td><td><input type="text" name="title" <?php echo 'value="'.$subTitle.'"'?>></td>
  </tr><tr>
    <td>Author:</td><td><input type="text" name="author" <?php echo 'value="'.$subAuth.'"'?>></td>
  </tr><tr>
    <td>Submission Type:</td>
	<td><select name="subtype">
       <option value="Writing" selected>Writing</option>
       <option value="Poetry" <?php if($subType == 'Poetry') echo 'selected'?>>Poetry</option>
       <option value="Serials" <?php if($subType == 'Serials') echo 'selected'?>>Serials</option>
       <option value="Visual Art"<?php if($subType == 'Visual Art') echo 'selected'?>>Visual Art</option>
       <option value="Photography"<?php if($subType == 'Photography') echo 'selected'?>>Photography</option>
       <option value="Music"<?php if($subType == 'Music') echo 'selected'?>>Music</option>
     </select></td>
  </tr><tr>
  <td>Submission File:</td>
  <td><input type="file" name="subfile"></td>
  </tr><tr>
  <td>Submission Text:</td>
  <td><textarea name="submission"><?php echo $submission?></textarea></td>
</table>
<input type="submit" value="Save" class="modal_button button-save">
</form>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php';?>
