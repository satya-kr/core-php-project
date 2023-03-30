$(document).ready(function(){
  $("#menu-btn").click(function(){
    $('#mobile-menu').css('left','0');
    $('#menu-btn').css('visibility','hidden');
  });
  $("#cross-btn").click(function(){
    $('#mobile-menu').css('left','-100%');
    $('#menu-btn').css('visibility','visible');
  });
  $("#expand-menu").click(function(){
    $('.sublink-cover').toggleClass('sub-display');
  });
  var swiper = new Swiper('#hero-slider', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,
    autoplay: true
  });
var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
    },
  });
  var swiper = new Swiper('#notice-slider', {
    pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: true
  });

    $("#m-lab").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-lab-img').css('display','block');
    });
    $("#m-classroom").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-classroom-img').css('display','block');
    });
    $("#m-transport").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-transport-img').css('display','block');
    });
    $("#m-library").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-library-img').css('display','block');
    });
    $("#m-cctv").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-cctv-img').css('display','block');
    });
    $("#m-online-cls").click(function(){
      $('.m-key-features div.center').css('display','none');
      $('#m-online-cls-img').css('display','block');
    });
    // $('.key-features-cover .tabs').click(function(){
    //   $("<div class='center' id='center-img-box'><div class='center-img'><img src='./assets/img/resource/lab.jpg' alt='' class='img-fluid d-block'></div></div>").insertBefore(this);
    //   $('.key-features-cover .tabs').removeClass('active');
    //   $(this).toggleClass('active');
    // });
    $("#lab").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/lab.jpg');
    });
    $("#classroom").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/large-classroom.jpg');
    });
    $("#transport").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/school-bus.jpg');
    });
    $("#library").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/library.jpg');
    });
    $("#cctv").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/cctv-camera.jpg');
    });
    $("#online-cls").click(function(){
      $('.center-img img').attr('src','./asset/img/resource/online-class.jpg');
    });
    $('.key-features-cover .tabs').click(function(){
      $('.key-features-cover .tabs').removeClass('active');
      $(this).toggleClass('active');
      
   });
   
    $("#key-features .tabs").click(function(){
         $('img.ib').css('display','none');
         $('img.iw').css('display','block');
     $('img.iw',this).css('display','none');
 $('img.ib',this).css('display','block');
    });
  });