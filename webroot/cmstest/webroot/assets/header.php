<?php
// Detect an action
if (isset($_GET['action']) && $_GET['action'] == 'edit')
  include $_SERVER['DOCUMENT_ROOT'].'/assets/fn-EDIT.php';
else if (isset($_GET['action']) && $_GET['action'] == 'submit')
  include $_SERVER['DOCUMENT_ROOT'].'/assets/fn-SUBMIT.php';

$submission = false;

if (file_exists('./details.json')) {
  $submission = true;

  // get the json file
  $json = file_get_contents('./details.json');
  $jsonData = json_decode($json);
  $type = $jsonData->submission->form;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo ucfirst(basename(getcwd())).' - Head 2 Hand Magazine'; ?></title>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/stylesheet.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Mukta+Mahee" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 
<body>
  <header>
    <div class="header-backdrop">&nbsp;</div>
    <div class="header-text">
      <h1>Head 2 Hand</h1>
    </div>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>    
        <li><a href="/about/">About</a></li> 
        <li><a href="/writing/" class="drop">Writing</a></li>
        <li><a href="/art/">Art</a></li>
        <li><a href="/submit/">Submit Here</a></li>
        <li><a href="/archives/">Archives</a></li>
      </ul>
    </nav>
    <a href=".?action=edit">EDIT</a>
	</form>
  </header>
<?php
if ($submission) {
  echo "<h2>".$jsonData->submission->title."</h2>";
  echo "<h4>".$jsonData->submission->author."</h4>";
  
  if ($type == "file")
	echo '<img src="./file.'.$jsonData->submission->ext.'">';
}

?>