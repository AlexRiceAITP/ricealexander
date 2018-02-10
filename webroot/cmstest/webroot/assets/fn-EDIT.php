<?php  // executes when the submit button is pushed
  if(isset($_POST['content'])) {
    $file = fopen('index.txt', "w") or die("Unable to open file!");
    $content = $_POST['content'];
    fwrite($file, $content);
    fclose($file);
  }

// loads form with an action for the proper page
echo '
<section class="modal_overlay">
<form action=".?action=edit" method="post" class="modal">
<h1>Editing <span class="directory">'.getcwd().'</span></h1>
<textarea>';

// loads the current file
$file = fopen('index.txt',"r");
while(! feof($file)) { echo fgets($file); }
fclose($file);

echo '
</textarea>
<div class="modal_rail">
<input type="submit" value="Save" class="modal_button button-save">
<a href="." class="modal_button button-return">Return</a>
</div>
</form>
</section>
';
?>