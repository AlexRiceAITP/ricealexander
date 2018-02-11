<?php
  include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php';
  if(isset($_POST['submission']))
  {
	$title = "gnocci";
	$path = $_SERVER['DOCUMENT_ROOT'].'/submissions/'.$title.'/';

	// create a directory
	mkdir($path);
	
	// create a .txt file with submission content
    $indexTXT = fopen($path.'index.txt', "w");
    $contentTXT = $_POST['submission'];
    fwrite($indexTXT, $contentTXT);
    fclose($indexTXT);
	
	// create a .php file that users will access
    $indexPHP = fopen($path.'/index.php', "w");
    $contentPHP = "<?php\ninclude \$_SERVER['DOCUMENT_ROOT'].'/assets/header.php';\ninclude 'index.txt';\ninclude \$_SERVER['DOCUMENT_ROOT'].'/assets/footer.php';\n?>";
    fwrite($indexPHP, $contentPHP);
    fclose($indexPHP);
  }
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
