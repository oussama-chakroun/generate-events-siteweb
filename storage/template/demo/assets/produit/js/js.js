function vedioSource(e , is_not_youtube_url=false) {

  var dt = null;

  var Go = () => {

    document.querySelectorAll('.btnplay').forEach(btn => {
      if (btn != e.children[2]) {
        $(btn).fadeOut();
        $(btn).parent().parent().removeClass('active')
      }
      else {
        $(btn).fadeIn();
        $(btn).parent().parent().addClass('active')
      }

    })
    réniGlightbox(e.id , is_not_youtube_url);
  }

  if (e.id != ""){
    console.log(e.id);
      Go();
  }
  else {
    console.log(e.id);
    document.getElementById("cmclive").href = "../img/backgroun/1.jpg";
    $('.logo').fadeOut("slow");
    dt = 1;
    réniGlightbox();
  }


  if (dt == null) {
    $("#contentvedio").html('<div class="preloader1"></div>');
    $('.logo').fadeOut();
  }


}






function réniGlightbox(e , is_not_youtube_url) {

	console.log(is_not_youtube_url)
  $("#contentvedio").html('<div class="preloader1"></div>');

  setTimeout(() => {

    $('.preloader1').hide('slow', function () { $('.preloader1').remove(); });

    $("#contentvedio").html('<iframe src="' + e + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');





  }, 1000)
}


document.querySelector('.btnjr1').addEventListener('click', function () {
  $(this).addClass('btnactive')
  $('.btnjr2').removeClass('btnactive')
  $('.jr1').addClass('jouractive')
  $('.jr2').removeClass('jouractive')
  $('.btnjr3').removeClass('btnactive')
  $('.jr3').removeClass('jouractive')
})
document.querySelector('.btnjr2').addEventListener('click', function () {
  $(this).addClass('btnactive')
  $('.btnjr1').removeClass('btnactive')

  $('.jr2').addClass('jouractive')
  $('.jr1').removeClass('jouractive')
  $('.btnjr3').removeClass('btnactive')
  $('.jr3').removeClass('jouractive')

})

document.querySelector('.btnjr3').addEventListener('click', function () {
  $(this).addClass('btnactive')
  $('.btnjr1').removeClass('btnactive')
  $('.btnjr2').removeClass('btnactive')
  $('.jr1').removeClass('jouractive')
  $('.jr2').removeClass('jouractive')
  $('.jr3').addClass('jouractive')

})




