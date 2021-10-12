$(function(){
    $('.mobile_btn').click(function(){
        $('.mobile_menu_box').toggleClass('active');
        $('.dummy').stop().fadeToggle();
        $('.mobile_btn span').toggleClass('active')
    })

    $('.dummy').click(function(){
        $('.mobile_menu_box').removeClass('active');
        $('.mobile_btn span').removeClass('active')
        $('.dummy').fadeOut();
    });
})

