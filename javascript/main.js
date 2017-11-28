$(document).ready(function(){
	
	$('.blok2-text').click(function(){
		$('.blok2-p').toggle("slow");
	});

	$(window).scroll(function (event) {

    var scroll = $(window).scrollTop();
    var header = $('#vheader');
    var logo = $('.logo');
    var logoImg = $('.logo img');
    var nav = $('nav');

     	if(scroll>100){
     		header.height(52);
     		logo.height(20);
     		nav.css({
     			"margin-top":"-10px"
     		});

     		logoImg.attr("src", "images/logo-small-scroll.png")
     	}
     	else{
     		header.height(120)
     		nav.css({
     			"margin-top":"50px"
     		});
     		logoImg.attr("src", "images/logo-small.png")
     	}
	});

    var aspectRatio = 1.78;

    var video = $('#videoWithJs iframe');
    var videoHeight = video.outerHeight();
    var newWidth = videoHeight*aspectRatio;
    var halfNewWidth = newWidth/2;

    video.css({"width":newWidth+"px","left":"50%","margin-left":"-"+halfNewWidth+"px"});

    if ($(window).width() <= 428){  
        $( "li" ).remove( ":contains('Home')" );
    }
});