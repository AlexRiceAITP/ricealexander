<?php
  include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php';
  
  $subTitle = filter_input(INPUT_POST, 'title');
  $subAuth = filter_input(INPUT_POST, 'author');
  $subType = filter_input(INPUT_POST, 'subtype');
  $submission = filter_input(INPUT_POST, 'submission');
  
  include 'fn-UPLOAD.php';
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
