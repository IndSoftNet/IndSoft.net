(function($){
    "use strict"
    var INDSOFT = {};

    /*--------------------
        * Header Class
    ----------------------*/
    INDSOFT.HeaderSticky = function(){
        $(".navbar-toggler").on("click", function(a) {
            a.preventDefault(), 
            $(".navbar").addClass("fixed-header")
        });
    }

    /*--------------------
        * Menu Close
    ----------------------*/
    INDSOFT.MenuClose = function(){
      $('.navbar-nav .nav-link').on('click', function() {
       var toggle = $('.navbar-toggler').is(':visible');
       if (toggle) {
         $('.navbar-collapse').collapse('hide');
       }
      });
    }


    /*--------------------
        * Smooth Scroll
    ----------------------*/
    INDSOFT.HeaderScroll = function(){
        $('header a[href*="#"]:not([href="#"])').on('click', function() {
          var PathName = location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname;
            if (PathName) {
              var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - 65,
                      }, 1000);
                      return false;
                  }
            }
        });
    }


    /*--------------------
        * Footer Smooth Scroll
    ----------------------*/
    INDSOFT.FooterScroll = function(){
        $('.fot-link a[href*="#"]:not([href="#"])').on('click', function() {
          var PathName = location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname;
            if (PathName) {
              var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top - 65,
                      }, 1000);
                      return false;
                  }
            }
        });
    }
	
	
    /*--------------------
        * Header Fixed
    ----------------------*/
    INDSOFT.HeaderFixed = function(){
      var varHeaderFix = $(window).scrollTop() >= 60;
        if (varHeaderFix) {
           $('.navbar').addClass('fixed-header');
        }
        else {
           $('.navbar').removeClass('fixed-header');
        }
    }    

    
	/*--------------------
        * Video Popup
    ----------------------*/
	INDSOFT.PopupVideo = function(){
    $('.launch-modal').on('click', function(e){
		e.preventDefault();
		$( '#' + $(this).data('modal-id') ).modal();
		$('body').addClass('npr');
		$('.navbar').addClass('npr-10');
	});
	
	$("#modal-video").on('hidden.bs.modal', function (e) {
    	$("#modal-video iframe").attr("src", $("#modal-video iframe").attr("src"));
	});
	
    }
	
	
	
	
	
	
	
    // Window on Load
    $(window).on("load", function(){
      INDSOFT.WebLoad();
    });

    $(document).ready(function() {
        INDSOFT.MenuClose(),
        INDSOFT.HeaderScroll(),
		INDSOFT.FooterScroll(),
        INDSOFT.HeaderSticky(),
		INDSOFT.PopupVideo();
    });

    $(window).on("scroll", function(){
        INDSOFT.HeaderFixed();
    });

})(jQuery);