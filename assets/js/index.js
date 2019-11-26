$(function() {
  waypoints.init();
});

var waypoints = {
  init: function() {
    this.container = $("html");

    this.header = $("[data-animate-header-container]");

    this.headerHeight = $("[data-animate-header]").outerHeight();

    this.targetElement = $("[data-animate-header-target]");

    this.bindControls();
  },
  animateHeader: function() {
    var self = this;

    self.header.waypoint(
      function(direction) {
        if (direction === "up") {
          self.container.removeClass("header-past header-hide");
        } else {
          self.container.addClass("header-past");
        }
      },
      { offset: -self.headerHeight }
    );

    self.targetElement.waypoint(
      function(direction) {
        if (direction === "up") {
          self.container.addClass("header-hide").removeClass("header-show");
        } else {
          self.container.addClass("header-show").removeClass("header-hide");
        }
      },
      { offset: 0 }
    );
  },
  bindControls: function() {
    var self = this;
    self.animateHeader();
  }
};

$(document.body).on("click", 'a[href*="#"]', function(e) {
  e.preventDefault();
  $("html,body").animate(
    {
      scrollTop: $(this.hash).offset().top
    },
    1500
  );
});


// selector
var menu = document.querySelector('.hamburger');

// method
function toggleMenu (event) {
  this.classList.toggle('is-active');
  document.querySelector( ".menuppal" ).classList.toggle("is_active");
  event.preventDefault();
}

// event
menu.addEventListener('click', toggleMenu, false);

//Solución con jQUery
/*$(document).ready(function(){
	$('.hamburger').click(function() {
		$('.hamburger').toggleClass('is-active');
		$('.menuresponsive').toggleClass('is-active');
		return false;
	});
});*/