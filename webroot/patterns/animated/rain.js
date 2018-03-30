var repeat;

function rain(seed) {
  let pos = window.getComputedStyle(document.body).getPropertyValue('background-position').split(/[\s,]+/);
  let bgpos = "";
  
  for (let i = 0; i < pos.length; i++) {
    let posi = parseInt(pos[i]) + seed[i];
	if ((i % 2 != 0) && (i != pos.length - 1)) bgpos += posi + "px, "
	else bgpos += posi + "px ";
  }

  document.body.style.backgroundPosition = bgpos;
  repeat = setTimeout(() => rain(seed), 50);
}

function randomSeed(tot) {
  let seed = [];
  for (let i = 0; i < tot; i++) {
    if ((i == tot-1) || (i == tot-2)) seed[i] = 0;
    else seed[i] = Math.floor((Math.random()*5))-2;
  }
  return seed;
}

function refresh(tot) {
  clearTimeout(repeat);
  rain(randomSeed(tot));
}