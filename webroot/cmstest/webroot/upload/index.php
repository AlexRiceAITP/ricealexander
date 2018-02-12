<?php
  include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php';
  
  $subTitle = filter_input(INPUT_POST, 'title');
  $subAuth = filter_input(INPUT_POST, 'author');
  $subType = filter_input(INPUT_POST, 'type');

  $subFile = '';
  date_default_timezone_set("America/Chicago");
  $subDate = date("m-d-Y H:i:s");


  ///  create a directory for the current semester if there isn't one
  if (date('n') < 6) $semester = "Spring ".date("Y");
  else $semester = "Fall ".date("Y");
  $pathYear = $_SERVER['DOCUMENT_ROOT'].'/submissions/'.$semester.'/';

  if (!file_exists($pathYear)) mkdir($pathYear);
  
  // VALIDATE
  $error = "";
  
  if ($subTitle == null) {
    $error = "title field is required<br>";
  } else {
	
	///  submission title should be lowercase with underscores in place of spaces
	///  create a path to a store the new file
    $pathTitle = str_replace(' ','_', strtolower($subTitle));	
    $subPath = $pathYear.$pathTitle.'/';

	if (file_exists($subPath))
      $error = "a submission already exists with that title";
  }
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
	
  }*/
?>
<h2>Upload</h2>
<form action="." method="post">
Title: <input type="text" name="title"><br>
Author: <input type="text" name="author"><br>
Submission
<textarea name="submission">

</textarea>
<input type="submit" value="Save" class="modal_button button-save">
</form>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php';?>
