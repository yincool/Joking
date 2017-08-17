/**
 * Created by Admin on 2017/8/12.
 */
$(document).ready(function(){
    $('.notification').mouseenter(function(){
        $('.notification').addClass('open');
    });

    $('.notification').mouseleave(function(){
        $('.notification').removeClass('open');
    });

    $('.user').mouseenter(function(){
        $('.user').addClass('open');
    });

    $('.user').mouseleave(function(){
        $('.user').removeClass('open');
    });
});
