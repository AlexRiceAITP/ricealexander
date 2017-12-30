// snippet of code that locates every occurence of a text fragment in a string and stores it in an array.
var fragment = "e"
var text = "Hello World, and welcome to the universe!";

console.log(locateAll(fragment, text));

function locateAll(f,t) {
  var pos = [], i = 0;
  f = f.toLowerCase(); t = t.toLowerCase();
  find(t,0);  
  return pos;

  function find(s,n) {
    let a = s.indexOf(f,n);
    if (a != -1) {
      pos[i] = a;
      i++;
      find(s,a+f.length);
    }
  }
}