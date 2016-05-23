$(window).scroll(function(){

  var wScroll = $(this).scrollTop();

  if(wScroll > $('.containers h1').offset().top - ($(window).height() / 1.15)){
    $('.containers h1').each(function(i){
      setTimeout(function(){
        $('.containers h1').eq(i).addClass('isShowing');
      }, 150 * (i+1));
    });
    $('.containers hr').each(function(i){
      setTimeout(function(){
        $('.containers hr').eq(i).addClass('isShowing');
      }, 150 * (i+1));
    });
  }

  if(wScroll > $('.box').offset().top - ($(window).height() / 1.3)){
    $('.box').each(function(i){
      setTimeout(function(){
        $('.box').eq(i).addClass('isShowing');
      }, 150 * (i+1));
    });
  }


});
