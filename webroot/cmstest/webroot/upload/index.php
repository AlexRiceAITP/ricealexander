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
  
  if ($subTitle == null)
	$error .= "title field is required<br>";
  else {
	
	///  submission title should be lowercase with underscores in place of spaces
	///  create a path to a store the new file
    $pathTitle = str_replace(' ','_', strtolower($subTitle));	
    $subPath = $pathYear.$pathTitle.'/';

	if (file_exists($subPath))
      $error .= "a submission already exists with that title<br>";
  }
  
  if ($subAuth == null)
	$error .= "author field is required<br>";
  
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
<form action="." method="post" enctype="multipart/form-data">
<h2>Submission Information</h2>

<table>
  <tr>
    <td>Title:</td><td><input type="text" name="title"></td>
  </tr><tr>
    <td>Author:</td><td><input type="text" name="author"></td>
  </tr><tr>
    <td>Submission Type:</td>
	<td><select name="subtype">
       <option value="text-0" selected>Writing</option>
       <option value="text-1">Poetry</option>
       <option value="text-2">Serials</option>
       <option value="file-0">Visual Art</option>
       <option value="file-1">Photography</option>
       <option value="file-2">Music</option>
     </select></td>
  </tr><tr>
  <td>Submission File:</td>
  <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
  </tr><tr>
  <td>Submission Text:</td>
  <td><textarea name="submission"></textarea></td>
</table>
<input type="submit" value="Save" class="modal_button button-save">
</form>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php';?>
