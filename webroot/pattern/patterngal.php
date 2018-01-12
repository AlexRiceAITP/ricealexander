<html>
<head>
<title>CSS Patterns</title>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="patterns.css">
</head>
<body>

<h1>CSS3 Gradient Patterns</h1>
<nav class="secondary">
<a href="#tiles">Pattern Tiles</a> &#0149;
<a href="#banners">Banners</a> &#0149;
<a href="#complex">Complex Patterns</a>
</nav>

<section id="tiles">
<h2>Pattern Tiles</h2>
<div class="pattern tile" id="bottles">&nbsp;</div>
<div class="pattern tile" id="capillary">&nbsp;</div>
<div class="pattern tile" id="chainmail">&nbsp;</div>
<div class="pattern tile" id="circles-chain">&nbsp;</div>
<div class="pattern tile" id="circles-overlap">&nbsp;</div>
<div class="pattern tile" id="circles-royal">&nbsp;</div>
<div class="pattern tile" id="circuit">&nbsp;</div>
<div class="pattern tile" id="cubistic">&nbsp;</div>
<div class="pattern tile" id="dotted">&nbsp;</div>
<div class="pattern tile" id="feathers">&nbsp;</div>
<div class="pattern tile" id="foam">&nbsp;</div>
<div class="pattern tile" id="foam-plus">&nbsp;</div>
<div class="pattern tile" id="gilded">&nbsp;</div>
<div class="pattern tile" id="glass-dichromatic">&nbsp;</div>
<div class="pattern tile" id="glass-stained">&nbsp;</div>
<div class="pattern tile" id="glimmer">&nbsp;</div>
<div class="pattern tile" id="ice">&nbsp;</div>
<div class="pattern tile" id="paper-grid">&nbsp;</div>
<div class="pattern tile" id="picnic-double">&nbsp;</div>
<div class="pattern tile" id="rainbow-blur">&nbsp;</div>
<div class="pattern tile" id="rainbow-quilt">&nbsp;</div>
<div class="pattern tile" id="rainbow-stripes">&nbsp;</div>
<div class="pattern tile" id="rhomboid">&nbsp;</div>
<div class="pattern tile" id="scales-icewing">&nbsp;</div>
<div class="pattern tile" id="scales-nightwing">&nbsp;</div>
<div class="pattern tile" id="scales-rainwing">&nbsp;</div>
<div class="pattern tile" id="scales-sandwing">&nbsp;</div>
<div class="pattern tile" id="seafloor">&nbsp;</div>
<div class="pattern tile" id="spirals">&nbsp;</div>
<div class="pattern tile" id="stripes-hashed">&nbsp;</div>
<div class="pattern tile" id="stripes-vinyl-hz">&nbsp;</div>
<div class="pattern tile" id="stripes-vinyl-vt">&nbsp;</div>
<div class="pattern tile" id="studs">&nbsp;</div>
<div class="pattern tile" id="studs-bronze">&nbsp;</div>
<div class="pattern tile" id="studs-gold">&nbsp;</div>
<div class="pattern tile" id="studs-silver">&nbsp;</div>
<div class="pattern tile" id="tiles-rubber">&nbsp;</div>
<div class="pattern tile" id="tread">&nbsp;</div>
<div class="pattern tile" id="untitled-1">&nbsp;</div>
<div class="pattern tile" id="untitled-2">&nbsp;</div>
<div class="pattern tile" id="untitled-3">&nbsp;</div>
<div class="pattern tile" id="untitled-4">&nbsp;</div>
<div class="pattern tile" id="untitled-5">&nbsp;</div>
<div class="pattern tile" id="wave-beach-aqua">&nbsp;</div>
<div class="pattern tile" id="wave-beach-sand">&nbsp;</div>
<div class="pattern tile" id="wave-spooky">&nbsp;</div>
<div class="pattern tile" id="wooden-planks">&nbsp;</div>
<div class="pattern tile" id="blank">&nbsp;</div>
<div class="pattern tile" id="blank">&nbsp;</div>
<div class="pattern tile" id="blank">&nbsp;</div>
</section>

<section id="banners">
<h2>Banners</h2>
<div class="pattern banner" id="banner-1">&nbsp;</div>
<div class="pattern banner" id="banner-2">&nbsp;</div>
<div class="pattern banner" id="banner-3">&nbsp;</div>
<div class="pattern banner" id="banner-4">&nbsp;</div>
<div class="pattern banner" id="blank">&nbsp;</div>
</section>

<section id="complex">
<h2>Complex Patterns</h2>
<div class="pattern bigtile" id="clockwork">&nbsp;</div>
<div class="pattern bigtile" id="confetti-lit">&nbsp;</div>
<div class="pattern bigtile" id="dragons">&nbsp;</div>
<div class="pattern bigtile" id="droplets">&nbsp;</div>
<div class="pattern bigtile" id="fallout">&nbsp;</div>
<div class="pattern bigtile" id="fallout2">&nbsp;</div>
<div class="pattern bigtile" id="frozen">&nbsp;</div>
<div class="pattern bigtile" id="mike">&nbsp;</div>
<div class="pattern bigtile" id="orbs-glowing">&nbsp;</div>
<div class="pattern bigtile" id="rain">&nbsp;</div>
<div class="pattern bigtile" id="stars">&nbsp;</div>
<div class="pattern bigtile" id="tiles-sanctus">&nbsp;</div>
<div class="pattern bigtile" id="victorian">&nbsp;</div>
<div class="pattern bigtile" id="blank">&nbsp;</div>
<div class="pattern bigtile" id="blank">&nbsp;</div>
</section>
</div>
<script>
// select all patterns that are not blank
var patterns = document.querySelectorAll('.pattern:not(#blank)');

/// store the stylesheet as an array through php
var sheet = <?php echo json_encode(file('patterns.css')); ?>;

// create textarea for copying
var copybox = document.createElement('textarea');
copybox.className = "copybox";
document.body.appendChild(copybox);

for (var i = 0; i < patterns.length; i++) {
  // add copy button to all pattern tiles
  var copy = document.createElement('button');
  copy.className = "copy"; copy.textContent = "copy";
  patterns[i].appendChild(copy);

  // SAVE THE PATTERN CSS AS A DATA-VALUE
  ///  build the selector for the pattern. server may change json code
  var sel = "#" + patterns[i].id + " {\r\n";
  var sel2 = "#" + patterns[i].id + " {\n";
  ///  loop through the stylesheet. when selector is found, save the index
  for (var j = 0; j < sheet.length; j++)
	if ((sel === sheet[j]) || (sel2 === sheet[j]))
	  var inx = j;
  ///  use the index to find the next two lines of code. clean up json formatting
  
  var backg = sheet[inx + 1];
  var backsize = sheet[inx + 2];
  
  if ((sel === sheet[inx]) && (sheet[inx] != undefined)) {
    backg = JSON.stringify(backg).slice(4, -5);
	backsize = JSON.stringify(backsize).slice(4, -6);
  } else if (sheet[inx] != undefined) {
    backg = JSON.stringify(backg).slice(4, -3);
	backsize = JSON.stringify(backsize).slice(4, -4);
  }
  
  ///  set to data-value attribute
  patterns[i].setAttribute("data-value", backg + "\n" + backsize);
}

// copy function
var copy = function() {
  this.style.backgroundColor = "#67ec80";
  this.textContent = "copied";
  var that = this;
  setTimeout(function(){ that.style.backgroundColor = ""; that.textContent = "copy"; }, 3000);

  copybox.innerHTML = this.parentElement.getAttribute("data-value");
  copybox.select();
  document.execCommand("copy");
}

// add event listeners to all copy buttons
var copybuttons = document.querySelectorAll('button.copy');
for (var i = 0; i < copybuttons.length; i++) copybuttons[i].addEventListener("click", copy);
</script>
</body>
</head>