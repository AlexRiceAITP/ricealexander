cLog("// test comment",jsCm);
cLog("///  test comment",jsCm2);

var jsCm = 'color:#2d7d56;', jsCm2 = 'color:#30ab84;';
  
function cLog(text,css) {
  // If we're using Chrome or Firefox, figure out which
  var browseGC = "chrome" in window ? browseGC = "webstore" in window.chrome ? true : false : false;
  var browseFF = "mozInnerScreenX" in window ? true : false;

  if (browseGC || browseFF) console.log('%c'+text,css);
  else console.log(text);
}