const num = ['1','2','3','4','5','6','7','8','9','0'];
const lwr = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
const upr = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];


function generateStrings() {
  var str = {
	count:  $('#count').val(),
	length: $('#length').val(),
    
    numbr:  $('#num').is(":checked"),
    lower:  $('#lwr').is(":checked"),
    upper:  $('#upr').is(":checked"),
    
    rqnum:  $('#reqnum').is(":checked"),
    rqlwr:  $('#reqlwr').is(":checked"),
    rqupr:  $('#requpr').is(":checked"),
    
    lead:   $('input[name="leading"]').val(),
    trail:  $('input[name="trailing"]').val(),
    
    index: 0	
  }

  $('.error').removeClass('error');

  err = false;

  if (isNaN(str.count) || str.count <= 0) {
	err = true;
	error('#count', "#Strings must be a number greater than 0");
  }

  if (isNaN(str.length) || str.length <= 0) {
	err = true;
	error('#length', "Length must be a number greater than 0");
  }

  if ((str.lower == false) && (str.upper == false) && (str.numbr == false)) {
	err = true;
	error('#allow', "You must allow a character type");
  }

  if ( ((str.numbr == false) && (str.rqnum == true))
	|| ((str.lower == false) && (str.rqlwr == true))
    || ((str.upper == false) && (str.rqupr == true)) ){
    err = true;
	error('#require', "You must a allow a character type to require it");
  }

  if (err) return;


  str.count = parseInt(str.count);
  str.length = parseInt(str.length);
  str.index = str.length - str.lead.length - str.trail.length;

  if (str.index <= 0) {
	error('#count', "String length must be greater than the leading and trailing characters");
	return;
  }

  var temp = str.index;
  $.each([str.rqnum, str.rqlwr, str.rqupr], function(i, val) {
	if (val) temp--;
  });

  if (temp < 0) {
	error('#require', "There is not enough space to require these characters");
	return;
  }


  var queue = [];
  if (str.numbr) $.merge(queue, num);
  if (str.lower) $.merge(queue, lwr);
  if (str.upper) $.merge(queue, upr);

  $('#output').empty();
  for (i = 0; i < str.count; i++) makeString();

  function makeString() {

    var snippet = '';
    for (j = 0; j < str.index; j++)
      snippet += queue[Math.floor((Math.random() * queue.length))];

    snippet = str.lead + snippet + str.trail;
    if ((str.rqnum) && (!contains(num,snippet))) return makeString();
    if ((str.rqlwr) && (!contains(lwr,snippet))) return makeString();
    if ((str.rqupr) && (!contains(upr,snippet))) return makeString();

	$('#output').append(snippet + '<br>');
  }

  function contains(a,t) {
    let c = t.split(''), flag = false;
    for(k = 0; k < c.length; k++) if (a.includes(c[k])) flag = true;
    return (flag);
  }
}

function error(sel,b) {
  console.log(sel +': '+ b);
  $(sel).addClass('error');
}

$(function() {
  $('button').click(generateStrings);
});