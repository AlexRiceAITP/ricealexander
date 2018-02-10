if (typeof seed !== 'undefined') rain();

function rain() {
  let pos = window.getComputedStyle(document.body).getPropertyValue('background-position').split(/[\s,]+/);
  let bgpos = "";
  
  for (var i = 0; i < pos.length; i++) {
    let posi = parseInt(pos[i]) + seed[i];
	if ((i % 2 != 0) && (i != pos.length - 1)) bgpos += posi + "px, "
	else bgpos += posi + "px ";
  }

  document.body.style.backgroundPosition = bgpos;
  setTimeout(() => rain(), 50);
}