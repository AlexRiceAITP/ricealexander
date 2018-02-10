<?php
// Detect an action
if (isset($_GET['action']) && $_GET['action'] == 'edit')
  include '../assets/fn-EDIT.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Writing - Head 2 Hand</title>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/assets/stylesheet.css">
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