<?php  // executes when the submit button is pushed

// loads form with an action for the proper page
echo '
<section class="modal_overlay">
<form action=".?action=submit" method="post" class="modal">
<h1 class="modal_title">Editing <span class="mt_directory">'.getcwd().'</span></h1>
<textarea name="content">';

// loads the current file
$file = fopen('index.txt',"r");
while(! feof($file)) { echo fgets($file); }
fclose($file);

echo '</textarea>
<div class="modal_rail">
<input type="submit" value="Save" class="modal_button button-save">
<a href="." class="modal_button button-return">Return</a>
</div>
</form>
</section>
';
?>