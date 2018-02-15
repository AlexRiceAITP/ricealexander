<?php 
  if(isset($_POST['content'])) {
    $file = fopen('index.txt', "w") or die("Unable to open file!");
    $content = $_POST['content'];
    fwrite($file, $content);
    fclose($file);
	
	echo '<div class="banner-submit">your changes have been saved <a href=".">x</a></div>';
  }
?>