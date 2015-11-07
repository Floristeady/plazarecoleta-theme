/************************* 
  Variables
  **************************/
jQuery(function($){
  
  var browserwidth;
  var desktopwidth=1024;
  var mobilewidth=767;
  
/************************* 
 Functions
**************************/

	function getbrowserwidth(){
    	browserwidth=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth||0;
		return browserwidth;
  	}

  	function onLoadAndResize(){ 
	  	 homeSlider();
	  	 homeHeight();
	  	 menuMobile();
	  	 pageGallery();
	  	 pageCarousel();
	  	 fancyboxImg();
	}
	
	function homeSlider() {
		$('#home-gallery').flexslider({
		    animation: "fade",
		    slideshow: true,
		    controlNav: true,
		    directionNav: false,
			keyboardNav: true,
			slideshowSpeed: 7000,
			pauseOnHover: false,	 				
			animationLoop: true,
			animationSpeed: 1000,
			after: function(){
			  var new_img = $('.flex-active-slide').find('img').attr('src');
			  console.log(new_img);
			  $.backstretch('' + new_img + '');
			}
		  });
		  
		  /** Imagen de fondo **/
		  if ($('body').hasClass('home')) {
		  	var new_img = $('.flex-active-slide').find('img').attr('src');
			$.backstretch(new_img, {duration: 1200, fade: 600});	 
		  } 

	}
	
	function homeHeight() {
		var WW = jQuery(window).width();
		var WH = jQuery(window).height();
		var footer = $('#footer').height();
		var totalHeight = WH - footer;
		//console.log(totalHeight);
	  
		$('#home-gallery').css({width: WW,height: totalHeight});
		$('#home-gallery .slides li').css({height: totalHeight});

	}
	
	function pageGallery() {
		$('#page-gallery').flexslider({
	     animation: "slide",
	     startAt: 0, 
	     controlNav: true,
	     slideshow: false,
	     directionNav: false
	    });
	}
	
	function pageCarousel() {
		$('#page-carousel').flexslider({
		    animation: "slide",
		    animationLoop: false,
		    controlNav: false,
		    itemWidth: 100,
		    itemMargin: 10
	  	});
  	}
		
	/*
	* Fancybox img proyectos
	*/
	function fancyboxImg() {
		$('a.fancybox').fancybox({padding : 4,
			helpers: {
			    overlay: {
			      locked: true
			    }
			},
			afterShow: function() {
		        if ('ontouchstart' in document.documentElement){
		            //$('.fancybox-nav').css('display','none');
		            $('.fancybox-wrap').swipe({
		                swipe : function(event, direction) {
		                    if (direction === 'left' || direction === 'up') {
		                        $.fancybox.prev( direction );
		                    } else {
		                        $.fancybox.next( direction );
		                    }
		                }
		            });
		        }
		    }
		});
	}
	
	/*
	* Menu principal mobile
	*/
	function menuMobile() {
	
	   $('header')      
	      .find('a.btn-menu')
	         .bind('click focus', function(){
	            $(this).toggleClass('expanded');
	            $('#access').slideToggle();
	         });   
	}
  
/************************* 
 Execution
**************************/
  $(document).ready(function(){

    onLoadAndResize();
    getbrowserwidth();
        
   });
   
   $(window).resize(function(){
     onLoadAndResize();
   });
  
});



$(function() {
  
  /*
  * Galerías
  
  $('#project-gallery').flexslider({
     animation: "slide",
     controlNav: "thumbnails",
     startAt: 0, 
     slideshow: false,
     directionNav: false,
     start: function(slider){
       $('#product-gallery div').removeClass('loading');
     }
    });
    
   $('#entorno-gallery').flexslider({
    animation: "fade",
    slideshow: true,
    controlNav: false,
    directionNav: true,
	keyboardNav: true,
	slideshowSpeed: 7000,
	pauseOnHover: false,	 				
	animationLoop: true
  });
  
  $('.emplazamiento-gallery').flexslider({
    animation: "fade",
    slideshow: true,
    controlNav: false,
    directionNav: true,
	keyboardNav: true,
	slideshowSpeed: 7000,
	pauseOnHover: false,	 				
	animationLoop: true
  });
  
  $('#page-gallery').flexslider({
    animation: "fade",
    slideshow: true,
    controlNav: false,
    directionNav: true,
	keyboardNav: true,
	slideshowSpeed: 7000,
	pauseOnHover: false,	 				
	animationLoop: true
  });
   
   $('.carousel-gallery').flexslider({
    animation: "slide",
    animationLoop: false,
    controlNav: false,
    itemWidth: 145,
    itemMargin: 5
  });
  */
   
});







	
 
