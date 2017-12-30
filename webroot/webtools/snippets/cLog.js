var CSScomment = 'color:#2d7d56;';
var CSScomment2 = 'color:#30ab84;';
cLog("// test comment",CSScomment);
cLog("///  test comment",CSScomment2);

function cLog(text,css) {
  // If we're using Chrome or Firefox, figure out which
  var browseGC = "chrome" in window ? browseGC = "webstore" in window.chrome ? true : false : false;
  var browseFF = "mozInnerScreenX" in window ? true : false;

  if (browseGC || browseFF) console.log('%c'+text,css);
  else console.log(text);
}