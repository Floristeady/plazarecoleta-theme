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
	  	 if(browserwidth > mobilewidth) {
	  		 homeHeight();
	  	 }
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
			start: function(){
				if($('ul.slides').children().length == 1) {
					$('.flex-control-nav').hide();
				} else {
					$('.flex-control-nav').show();
				}
				
			},
			after: function(){
		      if(browserwidth > mobilewidth) {
			 	 var new_img = $('.flex-active-slide').find('img').attr('src');
			 	 console.log(new_img);
			 	 $.backstretch('' + new_img + '');
			  } 
			}
		  });
		  
		  if(browserwidth > mobilewidth) {
			  /** Imagen de fondo **/
			  if ($('body').hasClass('home')) {
			  	var new_img = $('.flex-active-slide').find('img').attr('src');
				$.backstretch(new_img, {duration: 1200, fade: 600});	 
			  } 
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
	    $(document).off('click', '.open').on('click', '#button-mobile',function(e) {
	        $('#access.mobile').slideToggle();
	        $('#button-mobile').toggleClass('active');
	    }); 
	}
	
	function print() {
	    window.print();
	}
  
/************************* 
 Execution
**************************/
  $(document).ready(function(){

    onLoadAndResize();
    getbrowserwidth();
    menuMobile();
        
   });
   
   $(window).resize(function(){
     onLoadAndResize();
   });
  
});







	
 

