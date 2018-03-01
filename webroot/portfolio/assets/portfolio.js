// add colored bars to the skills section
const skills = document.querySelectorAll('.sl_stars');
for (let i = 0; i < skills.length; i++) {
  let stars = skills[i].getAttribute('data_stars'), color;
  let pcnt = stars * 20 + "%";
  stars >= 2.5 ? color = '#48b14b' : color = '#c5b818';
  let gradient = 'linear-gradient(90deg, '+ color +' '+ pcnt +', #d1e1ef '+ pcnt +' )';

  skills[i].style.background = gradient;
}


// table of contents box code
const sections = ['profile', 'education', 'work', 'skills', 'projects', 'contact'];
const keysects = $('.key li');

$(window).scroll(function() {  
  ///  build an array of where each section is located
  var heights = [];
  for (let i = 0; i < sections.length; i++)
    heights[i] = $('#' + sections[i]).offset().top - 1;

  ///  toggle the current section
  let section = getSection();

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


var projects = {
  head2hand: {
	title: "Head&nbsp;2&nbsp;Hand Literary&nbsp;Magazine",
	semester: "Fall 2017 - current",
	img: "assets/thumb-head2hand.png",
	github: false,
	url: [
	  "http://head2handmag.com/",
	  "https://github.com/swicaitp/head2hand",
	  "http://test.head2handmag.com/"
	],
	content: "<p>The SWIC AITP club is currently developing a website for the campus's own Head2Hand Literary Magazine. I am the team leader for this ongoing project.</p><p>In this project, I contribute by leading project meetings with the other members of my team, and I'm building basic content management functions with PHP. These functions so far include a page edit function and a page that allows staff to upload new submissions.</p>"
  },
  stcchs: {
	title: "St&nbsp;Clair&nbsp;County Historical&nbsp;Society",
	semester: "Spring 2017 - Fall 2017",
	img: "assets/thumb-stcchs.png",
	github: false,
	url: [
	  "http://stcchs.org/",
	  "https://github.com/swicaitp/stcchs",
	  "http://swicaitp.com/projects/#stcchs-website"
	],
	content: "<p>The St Clair County Historical Society asked AITP for a website last year. They were frustrated by the limitations of their free wordpress site and were looking for some renovations. I joined this project a couple weeks in.</p><p>My role started as cleaning up the source code of a template the club had decided to use. Afterwards, it expanded to include styling the forms, shop, and drop-down menus, to troubleshooting PayPal's integrated shopping cart.</p>"
  },
  swicaitp: {
	title: "SWIC&nbsp;AITP Club&nbsp;Website",
	semester: "Spring 2017 - Summer 2017",
	img: "assets/thumb-swicaitp.png",
	github: false,
	url: [
	  "http://swicaitp.com/",
	  "https://github.com/swicaitp/club_website"],
	content: "<p>I was tasked with redesigning the club website. While I outsourced pages to other members of the club, I created the basic structure of these pages, and developed the Projects, Calendar, and Join page.</p>"
  },
  chatskin: {
	title: "Chat&nbsp;Skin Generator",
	semester: "Spring 2018",
	img: "assets/thumb-skingentr.png",
	github: true,
	url: [
	  "http://ricealexander.com/webtools/skin-generator/",
	  "https://github.com/AlexRiceAITP/ricealexander/tree/master/webroot/webtools/skin-generator"
	],
	content: "<p>This is a Chat Skin Builder I designed for Wikia chat rooms. Using vanilla Javascript and custom functions, it uses a few different types of inputs and live previews the skin on the sidebar.</p><p>Some challenges that arose were linking the color inputs with their respective textboxes, and updating the preview when multiple effects could conflict with each other.</p>"
  },
  minesweep: {
	title: "Minesweeper",
	semester: "Summer 2017 - Spring 2018",
	img: "assets/thumb-minesweep.png",
	github: true,
	url: [
	  "http://ricealexander.com/minesweeper/",
	  "https://github.com/AlexRiceAITP/ricealexander/tree/master/webroot/minesweeper"
	],
	content: "<p>This is a minesweeper game I developed on the side as a challenge. It comes with a quick summary of the rules and some pre-loaded board sizes. The board stats can be customized, and its default size is my own 13x13, 26 mine preset, which should be roughly as challenging as an Easy board.</p><p>I am still further developing this on and off, and have a <a href='https://github.com/AlexRiceAITP/ricealexander/issues/3'>number of ideas</a> of how it can be improved.</p>"
  },
  patterns: {
	title: "CSS3&nbsp;Pattern Gallery",
	semester: "Spring 2015 - Spring 2018",
	img: "assets/thumb-patterngal.png",
	github: true,
	url: [
	  "http://ricealexander.com/patterns/",
	  "https://github.com/AlexRiceAITP/ricealexander/tree/master/webroot/patterns"
	],
	content: "<p>My introduction to web coding started with CSS, building custom skins for websites. Overlaying CSS gradients allows for a large number of possible designs to be created.</p><p>Each of these patterns was created by myself, and to my knowledge it is the largest single-author gradient pattern gallery out there.</p><p>The biggest challenge to this project, aside from creating the gradients, was building functionality to copy patterns to the clipboard.</p>"
  },
}

function launchModal(project) {
  if (project) {
    $('body').addClass('overlay_up');
    $('.modal_overlay').addClass('modal_active');
  
    let dir = eval("projects." + project), content = '';

    content += '\
	  <h2 class="modal_title">'+ dir.title +'</h2>\
      <p class="modal_semester">'+ dir.semester +'</p>\
      <img class="modal_img" src="'+ dir.img + '">\
      <div class="modal_content">'+ dir.content +'</div>\
	  <div class="modal_links">\
        <a href='+ dir.url[0] +' target="_blank" class="modal_button modal_link">Visit</a>';
	
	if (dir.github) content += '\
        <a href='+ dir.url[1] +' target="_blank" class="modal_github"><img src="assets/icon-github.svg"></a>';
		
	content += '\
	  </div>';

    $('.modal_contentarea').html(content);

  } else return false;
}

function hideModal() {
  $('body').removeClass('overlay_up');
  $('.modal_overlay').removeClass('modal_active');
}

$(document).mouseup(function(e) {
  var modal = $('.modal');
  if (!modal.is(e.target) && modal.has(e.target).length === 0) hideModal();
});