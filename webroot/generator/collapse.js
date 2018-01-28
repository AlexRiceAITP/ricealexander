var titles = document.querySelectorAll(".hli-collapse_title");
var content = document.querySelectorAll(".hli-collapse_content");

// function to toggle collapseable section
///  e catches the event , n allows for custom values
var expand = function(e,n) {
  var node = n || getNode(this), expanded = false;

  function getNode(t) {
    for (var i = 0; i < titles.length; i++) if (t == titles[i]) return i;
  }

  for (var i = 0; i < titles.length; i++) {
	if (i == node) {
	  if ((titles[i].classList.contains('active')) && (node < titles.length - 1)) {
		expanded = true;
      } else {
	    titles[i].className = "hli-collapse_title active";
	    content[i].className = "hli-collapse_content";
	  }
	} else {
	  titles[i].className = "hli-collapse_title";
	  content[i].className = "hli-collapse_content hidden";
	}
  }
  
  if (expanded) {
    node++; expand(null, node);
  }
}

for (var i = 0; i < titles.length; i++) titles[i].addEventListener("click", expand);