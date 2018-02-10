<?php  // executes when the submit button is pushed
  if(isset($_POST['content']))
  {
    $file = fopen('index.txt', "w") or die("Unable to open file!");
    $content = $_POST['content'];
    fwrite($file, $content);
    fclose($file);
  }

// loads form with an action for the proper page
echo '<form action=".?action=edit" method="post">
<textarea name="content">';

// loads the current file
$file = fopen('index.txt',"r");
while(! feof($file)) { echo fgets($file); }
fclose($file);

echo '
</textarea>
<input type="submit" value="Save" class="button">
<a href=".">Return</a>
</form>';
?>