<html>
<head>
<title>Chat-Skin Generator - Helio's Toy Box</title>
<?php include '../../resources/head.php';?>
<link rel="stylesheet" href="/site/resources/features/collapse.css" type="text/css">

<link rel="stylesheet" href="generator.css">
<link rel="stylesheet" href="collapse.css">
</head>
<body>
<?php include '../../resources/header.php';?>
<div id="container">
  <h1>Chat-Skin Generator</h1>
    <div id="chat-module" class="cm-chatwindow">
    <div class="cm-chatheader"><span class="cm-link">&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;</span>
    <div class="cm-chatheader-rail">
      <div class="cm-avatar cm-size1 cm-red">&nbsp;</div>&mdash;&mdash;&mdash;&mdash;<br>
    </div>
    </div>
    <div class="cm-chatbody">
      <div class="cm-chat">
        <br>
        <div class="cm-avatar cm-size2 cm-green">&nbsp;</div> &mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<span class="cm-link">&mdash;&mdash;&mdash;</span>&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br><br>
        <div class="cm-avatar cm-size2 cm-blue">&nbsp;</div> &mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br><br>
        <div class="cm-you">
        <div class="cm-avatar cm-size2 cm-red">&nbsp;</div> &mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<span class="cm-link">&mdash;&mdash;</span>&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</div><br>
        <div class="cm-avatar cm-size2 cm-green">&nbsp;</div> &mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br>
        &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;<br>
      </div>
      <div class="cm-rail">
        <div class="cm-active cm-link">&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;&#9604;</div>
        <div class="cm-avatar cm-size1 cm-green">&nbsp;</div>&mdash;&mdash;&mdash;&mdash;&mdash;<br>
        <div class="cm-avatar cm-size1 cm-blue">&nbsp;</div>&mdash;&mdash;&mdash;<br>
        <div class="cm-avatar cm-size1 cm-green">&nbsp;</div>&mdash;&mdash;&mdash;&mdash;<br>
        <div class="cm-avatar cm-size1 cm-red">&nbsp;</div>&mdash;&mdash;&mdash;&mdash;<br>
        <div class="cm-avatar cm-size1 cm-blue">&nbsp;</div>&mdash;&mdash;&mdash;
      </div>
      <div class="cm-write">
        <div class="cm-avatar cm-size3 cm-red">&nbsp;</div>
        <div class="cm-message">&nbsp;</div>
      </div>
    </div>
  </div>
  <dl id="hli-collapse" class="hli-collapse gen-collapse">
    <dt class="hli-collapse_title active">Colors</dt>
    <dd class="hli-collapse_content">
      <label for="clrborder">
        <input type="color" name="cclrborder" value="#cccccc">
        <input type="text" name="clrborder" placeholder="#cccccc">
        Border Color
      </label>

      <br><br>
      <label for="txtcolor">
        <input type="color" name="ctxtcolor" value="#333333">
        <input type="text" name="txtcolor" placeholder="#333333">
        Text Color
      </label>
      <label for="atxtcolor">
        <input type="color" name="catxtcolor" value="#999999">
        <input type="text" name="atxtcolor" placeholder="#999999">
        Accent Text Color
      </label>
      <label for="linkcolor">
        <input type="color" name="clinkcolor" value="#5792d9">
        <input type="text" name="linkcolor" placeholder="#5792d9">
        Link Color
      </label>

      <br><br>
      <label for="basebackgr">
        <input type="color" name="cbasebackgr" value="#666666">
        <input type="text" name="basebackgr" placeholder="#666666">
        Background Color
      </label>
      <label for="frontbackgr">
        <input type="color" name="cfrontbackgr" value="#eeeeee">
        <input type="text" name="frontbackgr" placeholder="#eeeeee">
		<input type="hidden" name="hfrontbgc" value="">
        Foreground Color
      </label>
      <label for="hoverbackgr">
        <input type="color" name="choverbackgr" value="#dddddd">
        <input type="text" name="hoverbackgr" placeholder="#dddddd">
        Active (hover) Color
      </label>
      <label for="atextbackgr">
        <input type="color" name="catextbackgr" value="#ffffff">
        <input type="text" name="atextbackgr" placeholder="#ffffff">
        Textarea Color
      </label>
      <label for="youbackgr">
        <input type="color" name="cyoubackgr" value="#dddddd">
        <input type="text" name="youbackgr" placeholder="#dddddd">
        You Message Background
      </label>

    </dd>
    <dt class="hli-collapse_title">Background Images</dt>
    <dd class="hli-collapse_content hidden">
	  <label for="crearbg">
	    <input type="checkbox" name="crearbg">
        <input type="text" name="urearbg" placeholder="http://...">
		Background Image
	  </label>
	  <label for="cfrontbg">
	    <input type="checkbox" name="cfrontbg">
        <input type="text" name="ufrontbg" placeholder="http://...">
		Foreground Image
	  </label>
	  <label for="cchatbg">
	    <input type="checkbox" name="cchatbg">
        <input type="text" name="uchatbg" placeholder="http://...">
		Chat Image
	  </label>
	  
	  <br><br>
	  <label>Set Foreground Transparency</label>
	  <label>
	    <input type="range" min="0" max="1" step=".01" value="1">
	  </label>
    </dd>

    <dt class="hli-collapse_title">Round Effects</dt>
    <dd class="hli-collapse_content hidden">
	
      <h3 class="subhead">ChatHeader</h3>
      <div class="selectoption">
        <label><input name="rchatwindow" type="radio" checked="checked" value="0"><div>Default</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rchatwindow" type="radio"  value="1"><div>Straight Borders</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rchatwindow" type="radio"  value="2"><div>Extra Round</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rchatwindow" type="radio"  value="3"><div>Totally Round</div></label>
        </option>
      </div>
	  
      <h3 class="subhead">WikiaPage</h3>
      <div class="selectoption">
        <label><input name="rwikipage" type="radio" checked="checked" value="0"><div>Default</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rwikipage" type="radio"  value="1"><div>Straight Borders</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rwikipage" type="radio"  value="2"><div>Extra Round</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rwikipage" type="radio"  value="3"><div>Totally Round</div></label>
        </option>
      </div>
	  
      <h3 class="subhead">Textarea</h3>
      <div class="selectoption">
        <label><input name="rtextarea" type="radio" checked="checked" value="0"><div>Straight (Default)</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rtextarea" type="radio"  value="1"><div>Slightly Round</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rtextarea" type="radio"  value="2"><div>Totally Round</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="rtextarea" type="radio"  value="3"><div>Round with Avatar</div></label>
        </option>
      </div>
	  
      <h3 class="subhead">Avatars</h3>
      <div class="selectoption">
        <label><input name="ravatars" type="radio" checked="checked" value="0"><div>Straight (Default)</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="ravatars" type="radio"  value="1"><div>Slightly Round</div></label>
        </option>
      </div>
      <div class="selectoption">
        <label><input name="ravatars" type="radio"  value="2"><div>Totally Round</div></label>
        </option>
      </div>

    </dd>
    <dt class="hli-collapse_title">Common Changes</dt>
    <dd class="hli-collapse_content hidden">
      Content for tab 3
    </dd>
    <dt class="hli-collapse_title">Fun Things</dt>
    <dd class="hli-collapse_content hidden">
      Content for tab 4
    </dd>
    <dt class="hli-collapse_title">Generate Your Code</dt>
    <dd class="hli-collapse_content hidden">
      <textarea></textarea>
    </dd>
  </dl>
</div>
<script src="hexcolors.js"></script>
<script src="collapse.js"></script>
<script src="generator.js"></script>
</body>
</html>