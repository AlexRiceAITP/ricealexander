// projects functionality
var graphics = {
  htmlburger: {
	img: '<img class="modal_img" src="indesign/htmlburger-600px.png">',
	title: "HTML Burger Flier",
	content: '<p>The SWIC AITP club offers workshops to introduce high school students to web students. I created this flier to hand out at one of our workshops. It includes a basic introduction to HTML and CSS, along with coding samples I put together to expand the project.</p><a class="modal_button" class="gm_anchor" href="indesign/htmlburger.pdf" target="_blank">PDF</a>'
  },
  dinoposter: {
	img: '<img class="modal_img" src="indesign/dinoposter-600px.png">',
	title: "Dinosaur Poster",
	content: '<p>This poster was created as a project for my InDesign course. The prompt for the assignment was that I would be making a poster of something interesting, and it required 5 images, text wrap, and images with alpha masks.</p><p>For the design aspects of this project, I emphasized a bold color palette, and a font pairing that I felt was clean, but fun</p><a class="modal_button" href="indesign/dinoposter.pdf" target="_blank">PDF</a>'
  },
  brochure: {
	img: '<div class="modal_img pair"><img src="indesign/brochurep1-600px.png"><img src="indesign/brochurep2-600px.png"></div>',
	title: "Togo Brochure",
	content: '<p>This brochure was created for my InDesign Midterm. Our task was to create a brochure for a place one typically wouldn\'t take a vacation to. I was given a number of requirements, but the location, all of the design elements, and the content were left entirely up to me.</p><p>My design goal for this project was to create a clean composition, that uses a borderless style, a clear and consistent color palette, and has a pleasant flow to it.</p><a class="modal_button" href="indesign/brochure.pdf" target="_blank">PDF</a>'
  },
  dragonicon: {
	img: '<img class="modal_img square" src="illustrator/dragon2.png">',
	title: "Dragon Icon",
	content: '<p>This was a sprite I created while learning Illustrator\'s tools</p>'
  },
  squirrelcartoon: {
	img: '<img class="modal_img square" src="illustrator/squirrelcartoon.png">',
	title: "Squirrel Cartoon",
	content: '<p>I created this graphic for my illustrator class. The prompt was to take an image from a how-to-draw book, and recreate it as a vector graphic.</p><div class="pair"><img src="illustrator/howtosquirrel1-600px.png"><img src="illustrator/howtosquirrel2-600px.png"></div>'
  },
  h2hlogo: {
	img: '<img class="modal_img square" src="other/h2hlogo.png">',
	title: "Head2Hand Magazine Logo",
	content: '<p>SWIC AITP club is building a website for the Head 2 Hand Literary Magazine on campus. This is a concept logo I created for their brand, weaving two capital H together.</p>'
  },
  rjlogo: {
	img: '<img class="modal_img square" src="other/rjlogo-after.png">',
	title: "RJ Logo Rework",
	content: '<p>This logo revamp was relatively minor, but I aimed to clean up the old logo. Some areas I focused on were thinning the thick border, lining up the \'r\' and the \'j\', softening the sharp black, and giving it a little depth.</p><div class="pair"><img src="other/rjlogo-before.png" style="margin:28px 0;"><img src="other/rjlogo-after.png"></div>'
  },
  stcchslogo: {
	img: '<img class="modal_img square" src="other/stcchslogo-after-600px.png">',
	title: "Historical Society Logo Rework",
	content: '<p>The SWIC AITP club reworked the St. Claire County <a href="http://stcchs.org/">Historical Society\'s Website</a>. As part of this project, our client had asked us to take their 200px image and enlarge it.</p><p>I designed this logo as a new pitch, using themes I found while researching other historical societies\' branding. In the end, the client found a higher resolution version of their logo, and turned down my pitch.</p><div class="pair" style="width:250px"><img src="other/stcchslogo-before.png"><img src="other/stcchslogo-after-600px.png"></div>'
  }
}
var projectlist = Object.keys(graphics);
var currentModal = null;

function launchModal(graphic) {
  if (graphic) {
	currentModal = $.inArray(graphic, projectlist);

    $('body').addClass('overlay_up');
    $('.modal_overlay').addClass('modal_active');
  
    let dir = eval("graphics." + graphic), content = '';

    content += dir.img +'<div class="modal_content"><h2 class="modal_title">'+ dir.title +'</h2>'+ dir.content +'</div>';

    $('.modal_contentarea').html(content);

  } else return false;
}

function hideModal() {
  currentModal = null;
  $('body').removeClass('overlay_up');
  $('.modal_overlay').removeClass('modal_active');
}

function prevModal() {
  if (currentModal >= 0) {
	let prev = (currentModal == 0) ? projectlist.length -1 : currentModal - 1
    launchModal(projectlist[prev]);
  }
}

function nextModal() {
  if (currentModal >= 0) {
	let next = (currentModal == projectlist.length - 1) ? 0 : currentModal + 1;
    launchModal(projectlist[next]);
  }
}

///  hide modal when clicked away
$(document).mouseup(function(e) {
  //if (!$('.modal').is(e.target)) hideModal();
  if ($(e.target).closest('.modal').length == 0) hideModal();
  //.closest('.modal')
});

///  keyboard events
$('body').keydown(function(e){
  if(e.which == 27) hideModal();                  // Esc
  if(e.which == 37 || e.which == 40) prevModal(); // ← ↓
  if(e.which == 38 || e.which == 39) nextModal(); // ↑ →
  if(e.which == 13) $(".modal_link")[0].click();  // Enter
});
