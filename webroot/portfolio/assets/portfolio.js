// add colored bars to the skills section
const skills = document.querySelectorAll('.sl_stars');
for (let i = 0; i < skills.length; i++) {
  let stars = skills[i].getAttribute('data_stars'), color;
  let pcnt = stars * 20 + "%";
  stars >= 2.5 ? color = '#48b14b' : color = '#c5b818';
  let gradient = 'linear-gradient(90deg, '+ color +' '+ pcnt +', #d1e1ef '+ pcnt +' )';

  skills[i].style.background = gradient;
}


// scroll code
const sections = ['profile', 'education', 'work', 'skills', 'projects', 'contact'];
const keysects = $('.key li');

$(window).scroll(function() {  
  ///  build an array of where each section is located
  var heights = [];
  for (let i = 0; i < sections.length; i++)
    heights[i] = $('#' + sections[i]).offset().top - 1;

  ///  toggle the current section
  let section = getSection();
  console.log(section);
  for (let i = 0; i < sections.length; i++) {
    if (sections[i] == section)
	  keysects[i].className = "selected";
	else
	  keysects[i].className = "";
  }
    
  
  function getSection() {
    let pos = $(window).scrollTop();
    for (let i = sections.length -1; i >= 0; i--)
      if (pos >= heights[i]) return sections[i];
  }
});