/**
 * Created by Admin on 2017/8/4.
 */
$(document).ready(function(){
    //手机号验证函数
    function checkPhone(phone){
        //var phone = $('#phone').val();
        if(phone.match(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/)){
            return true
        }else {
            return false;
        }
    }

    $('#captchaimg').click(function(){
        var url = '/captcha/' + Math.random();
        $('#captchaimg').attr({src:url});
    });
    $('#username').blur(function(){
        var username = $('#username').val();
        if(username.length <= 0){
            $('.tooltip-error-username').css({display:'block'});
        }else{
            $('.tooltip-error-username').css({display:'none'});
        }
    });
    $('#phone').blur(function(){
        var phone = $('#phone').val();
        if(phone.length < 11){
            $('.tooltip-error-phone span').text('请输入正确的手机号码！');
            $('.tooltip-error-phone').css({display:'block'});
        }else{
            $('.tooltip-error-phone').css({display:'none'});
            var token = $('meta[name="_token"]').attr('content');
            $.ajax({
                url:'/checkPhone',
                data:{phone:phone},
                type:'post',
                dataType:'json',
                headers:{'X-CSRF-TOKEN':token},
                success:function(res){
                    if(res.success==false){
                        $('.tooltip-error-phone span').text(res.errorMsg);
                        $('.tooltip-error-phone').css({display:'block'});
                    }else {
                        $('.tooltip-error-phone').css({display:'none'});
                    }
                }
            });
        }
    });
    $('#password').blur(function(){
        var password = $('#password').val();
        if(password.length <= 0){
            $('.tooltip-error-password').css({display:'block'});
        }else{
            $('.tooltip-error-password').css({display:'none'});
        }
    });
    $('#captcha').blur(function(){
        var captcha = $('#captcha').val();
        if(captcha.length <= 0){
            $('.tooltip-error-captcha').css({display:'block'});
        }else {
            $('.tooltip-error-captcha').css({display:'none'});
        }
    });
    $('.sign-up-button').click(function(){
        var username = $('#username').val();
        if(username.length > 0){
            var phone = $('#phone').val();
            if(phone.length > 0 && checkPhone(phone)){
                var password = $('#password').val();
                if(password.length >= 6){
                    var captcha = $('#captcha').val();
                    if(captcha.length > 0){
                        var token = $('meta[name="_token"]').attr('content');
                        $.ajax({
                            url:'/registerLogic',
                            type:'post',
                            headers:{'X-CSRF-TOKEN':token},
                            data:{username:username,phone:phone,password:password,captcha:captcha},
                            dataType:'json',
                            success:function(res){
                                if(res.success){
                                    $.msg('注册成功');
                                    setTimeout(function(){
                                        window.location = '/';
                                    },2000);
                                }else {
                                    $.msg(res.errorMsg);
                                }
                            }
                        });
                    }else {
                        $('.tooltip-error-captcha').css({display:'block'});
                    }
                }else {
                    $('.tooltip-error-password').css({display:'block'});
                }
            }else {
                $('.tooltip-error-phone').css({display:'block'});
            }
        }else{
            $('.tooltip-error-username').css({display:'block'});
        }
    });
});