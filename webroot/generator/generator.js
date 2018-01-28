function x(s) {
  let q = document.querySelectorAll(s);
  if (q.length != 1) return q;
  else return q[0];
}

const inputColors = x('input[type="color"]');
  inputColors.forEach(inputColor => inputColor.addEventListener('change', updateText));

const inputTextboxes = x('label input[type="color"] + input[type="text"]');
  inputTextboxes.forEach(inputTextbox => inputTextbox.addEventListener('change', updateColor));


const inputCheckboxes = x('label input[type="checkbox"]');
  inputCheckboxes.forEach(inputCheckboxes => inputCheckboxes.addEventListener('change', updateCheckText));

const inputCheckTextboxes = x('label input[type="checkbox"] + input[type="text"]');
  inputCheckTextboxes.forEach(inputCheckTextbox => inputCheckTextbox.addEventListener('change', updateCheckbox));

const inputRadios = x('label input[type="radio"]');
  inputRadios.forEach(inputRadio => inputRadio.addEventListener('change', updateRadio));

//inputRange
x('input[type="range"]').addEventListener('input', updateRange);
x('input[type="range"]').addEventListener('change', updateRange);



function updateText() {
  for (var i = 0; i < inputColors.length; i++) if (this == inputColors[i]) var index = i;
  inputTextboxes[index].value = this.value;
  updateModule(this.name.slice(1), this.value);
  
  if (this.name == "cfrontbackgr") updateRange();
}

function updateColor() {
  for (var i = 0; i < inputTextboxes.length; i++) if (this == inputTextboxes[i]) var index = i;
  var color = colorToHex(this.value);
  if ((color == "bad color")&&(this.value != "transparent")) {
	// if color test fails, reset to the placeholder colors
	inputTextboxes[index].value = inputTextboxes[index].placeholder;
	inputColors[index].value = inputTextboxes[index].placeholder;
	updateModule(this.name, this.value);
	
  } else {
    if (this.value != "transparent") inputColors[index].value = color;
	updateModule(this.name, this.value);
  }
  
  if ((this.name == "frontbackgr")&&(this.value != "transparent")) updateRange();
}

function updateRadio() {
  updateModule(this.name, this.value);
}

function updateCheckbox() {
  let check = this.previousElementSibling;
  let value = this.value;
  if ((check.checked)&&(value)) {
	updateModule(check.name, value);
  } else {
	updateModule(check.name, null);  
  }
}
function updateCheckText() {
  let value = this.nextElementSibling.value;
  if ((this.checked)&&(value)) {
	updateModule(this.name, value);
  } else {
	updateModule(this.name, null);  
  }
}

function updateRange() {
  let range = x('input[type="range"]').value;
  let color = x('input[name="cfrontbackgr"]').value;
  let rgba = 'rgba('+ parseInt(color.slice(1,3),16) +','+ parseInt(color.slice(3,5),16) +','+ parseInt(color.slice(5,7),16) +','+ range +')';
  updateModule('frontbackgr', rgba);
  x('input[name="hfrontbgc"]').value = rgba;
}

function updateModule(name, value) {
  var sel = "";
  switch(name) {
    case "clrborder":
	  sel = x('.cm-avatar, .cm-chat, .cm-chatbody, .cm-chatheader, .cm-chatheader-rail, .cm-message');
	  for (var i = 0; i < sel.length; i++) sel[i].style.borderColor = value;
      break;
    case "txtcolor":
	  x('.cm-chatwindow').style.color = value;
      break;
    case "atxtcolor":
      break;
    case "linkcolor":
      sel = x('.cm-link');
	  for (var i = 0; i < sel.length; i++) sel[i].style.color = value;
      break;
    case "basebackgr":
	  x('.cm-chatwindow').style.backgroundColor = value;
      break;
    case "frontbackgr":
	  console.log(value);
      x('.cm-chatheader').style.backgroundColor = value;
      x('.cm-chatbody').style.backgroundColor = value;
      break;
    case "hoverbackgr":
	  x('.cm-active').style.backgroundColor = value;
      break;
    case "atextbackgr":
	  x('.cm-message').style.backgroundColor = value;
      break;
    case "youbackgr":
	  x('.cm-you').style.backgroundColor = value;
      break;
    case "crearbg":
	  if (value) {
	    x('.cm-chatwindow').style.backgroundImage = 'url('+value+')';
	  } else {
	    x('.cm-chatwindow').style.backgroundImage = '';
	  }
      break;
    case "cfrontbg":
	  if (value) {
	    x('.cm-chatheader').style.backgroundImage = 'url('+value+')';
	    x('.cm-chatbody').style.backgroundImage = 'url('+value+')';
	  } else {
	    x('.cm-chatheader').style.backgroundImage = '';
	    x('.cm-chatbody').style.backgroundImage = '';
	  }
      break;
    case "rchatwindow":
      if (value == 0) x('.cm-chatheader').style.borderRadius = '3px 3px 0 0';
      if (value == 1) x('.cm-chatheader').style.borderRadius = '0';
      if (value == 2) x('.cm-chatheader').style.borderRadius = '9px 9px 0 0';
      if (value == 3) x('.cm-chatheader').style.borderRadius = '9px';
      break;
    case "rwikipage":
      if (value == 0) x('.cm-chatbody').style.borderRadius = '0 0 3px 3px';
      if (value == 1) x('.cm-chatbody').style.borderRadius = '0';
      if (value == 2) x('.cm-chatbody').style.borderRadius = '0 0 9px 9px';
      if (value == 3) x('.cm-chatbody').style.borderRadius = '9px';
      break;
    case "rtextarea":
      if (value == 0) x('.cm-message').style.borderRadius = '0';
      if (value == 1) x('.cm-message').style.borderRadius = '3px';
      if (value == 2) x('.cm-message').style.borderRadius = '9px';
      if (value == 3) {
	    x('.cm-message').style.borderRadius = '0 9px 9px 0';
        x('.cm-write .cm-avatar').style.borderRadius = '9px 0 0 9px';}
      else { x('.cm-write .cm-avatar').style.borderRadius = x('.cm-avatar')[0].style.borderRadius; };
      break;
    case "ravatars":
      sel = x('.cm-avatar'); console.log(x('.cm-message').style.borderRadius);
      if (value == 0) for (var i = 0; i < sel.length; i++) sel[i].style.borderRadius = '0';
      if (value == 1) for (var i = 0; i < sel.length; i++) sel[i].style.borderRadius = '3px';
      if (value == 2) for (var i = 0; i < sel.length; i++) sel[i].style.borderRadius = '9px';

	  if (x('.cm-message').style.borderRadius == '0px 9px 9px 0px') x('.cm-write .cm-avatar').style.borderRadius = '9px 0px 0px 9px';	  
      break;
    default:
      console.log("error!");
  }
}

function generate() {
  var gen = {
	///  set color to input.value || fallback input.placeholder
	cbrd: x('input[name="clrborder"]').value   || x('input[name="clrborder"]').placeholder,
	ctxt: x('input[name="txtcolor"]').value    || x('input[name="txtcolor"]').placeholder,
	catx: x('input[name="atxtcolor"]').value   || x('input[name="atxtcolor"]').placeholder,
	clnk: x('input[name="linkcolor"]').value   || x('input[name="linkcolor"]').placeholder,
	cbgr: x('input[name="basebackgr"]').value  || x('input[name="basebackgr"]').placeholder,
	cfgr: x('input[name="frontbackgr"]').value || x('input[name="frontbackgr"]').placeholder,
	chbg: x('input[name="hoverbackgr"]').value || x('input[name="hoverbackgr"]').placeholder,
	ctxa: x('input[name="atextbackgr"]').value || x('input[name="atextbackgr"]').placeholder,
	cyou: x('input[name="youbackgr"]').value   || x('input[name="youbackgr"]').placeholder,
	
	// Backgrounds
	bcbk: x('input[name="crearbg"]').checked,  // rear background checkbox
	bibk: x('input[name="urearbg"]').value,    // rear background input
	bcft: x('input[name="cfrontbg"]').checked, // front background checkbox
	bift: x('input[name="ufrontbg"]').value,   // front background input
	bcch: x('input[name="cchatbg"]').checked,  // chat background checkbox
	bich: x('input[name="uchatbg"]').value,    // chat background input
	
	// Round Effects
	rchd: radioValue('rchatwindow'),
	rcwn: radioValue('rwikipage'),
	rtxa: radioValue('rtextarea'),
	ravt: radioValue('ravatar')
	
	// Common Changes
	
	// Fun Things
  };

  // adjust for foreground transparency
  if (x('input[type="range"]').value != 1) gen.cfgr = x('input[name="hfrontbgc"]').value;

  function radioValue(name) {
	let temp = x('input[name="'+ name +'"]');
    for (let i = 0; i < temp.length; i++) if (temp[i].checked == true) return temp[i].value;
  }
  
  console.log(gen);
   
  var csscode = "";

  // colors
  csscode += '\
/* Border Color */\n\
#ChatHeader, #ChatHeader .User, #pings, #Rail .private, #Rail .splotch, #UserStatsMenu, #UserStatsMenu .separator, #Write img, #Write .message, .Chat, .Chat .avatar, .ChatWindow #WikiaPage, .ChatWindow .User img, .ChatWindow .wikia-button {\n   /* border color */\n   border-color: '+ gen.cbrd +';}\n\n\n\
\
/* Background Colors */\n\
#Rail .splotch, .ChatWindow, .ChatWindow .wikia-button {\n   /* background color */\n   background: '+ gen.cbgr +' !important;}\n\n\
#ChatHeader, #UserStatsMenu, #pings, #Rail .private, .ChatWindow #WikiaPage {\n   /* foreground color */\n   background: '+ gen.cfgr +';}\n\n\
#Rail .selected, #Rail .User:hover, #UserStatsMenu .actions li:hover, #UserStatsMenu .info {\n   /* active (hover) color */\n   background: '+ gen.chbg +';}\n\n\
#Write .message {\n   /* textarea background */\n   background: '+ gen.ctxa +';}\n\n\
.Chat .you {\n   /* you message background */\n   background: '+ gen.cyou +';}\n\n\n\
\
/* Text Colors */\n\
#ChatHeader .private, #pings, #Write textarea, .ChatWindow #WikiaPage {\n   /* text color */\n   color: '+ gen.ctxt +';}\n\n\
.Chat .inline-alert, .Chat .me-message, .Chat .time, .ChatWindow .away {\n   /* accent text color */\n   color: '+ gen.catx +';}\n\n\
#ChatHeader .wordmark, #UserStatsMenu .label, #UserStatsMenu svg, .ChatWindow a {\n   /* link color */\n   color: '+ gen.clnk +';}\n\n\n\
';

  // round effects
  csscode += '#ChatHeader {\n   border-radius: ';
  if (gen.rchd == 0) csscode += '5px 5px 0 0';
  if (gen.rchd == 1) csscode += '0';
  if (gen.rchd == 2) csscode += '21px 21px 0 0';
  if (gen.rchd == 3) csscode += '21px';
  csscode += ';}\n\n';

  csscode += '#WikiaPage {\n   border-radius: ';
  if (gen.rcwn == 0) csscode += '0 0 5px 5px';
  if (gen.rcwn == 1) csscode += '0';
  if (gen.rcwn == 2) csscode += '0 0 21px 21px';
  if (gen.rcwn == 3) csscode += '21px';
  csscode += ';}\n\n';
  
  csscode += '#Write .message {\n   border-radius: ';
  if (gen.rtxa == 0) csscode += '0';
  if (gen.rtxa == 1) csscode += '5px';
  if (gen.rtxa == 2) csscode += '21px';
  if (gen.rtxa == 3) csscode += '0 21px 21px 0';
  csscode += ';}\n\n';
  if (gen.rtxa == 3) csscode += '#Write img {\n   border-radius: 0 21px 21px 0;}\n\n';

  csscode += '.Write img, .Chat .avatar, .User img, #UserStatsMenu .info img {\n   border-radius: ';
  if (gen.ravt == 0) csscode += '0';
  if (gen.ravt == 1) csscode += '5px';
  if (gen.ravt == 2) csscode += '21px';
  csscode += ';}\n\n';
  
  
//console.log(csscode);
}