$(document).ready(function () {
    remeber_me = 1;

    $('input[name="usernumber"]').blur(function () {
        var usernumber = $('input[name="usernumber"]').val();
        if(usernumber.length <= 0){
            $('.tooltip-error-usernumber').css({display:'block'});
        }else {
            $('.tooltip-error-usernumber').css({display:'none'});
        }
    });

    $('input[name="password"]').blur(function () {
        var password = $('input[name="password"]').val();
        if(password.length <= 0){
            $('.tooltip-error-password').css({display:'block'});
        }else {
            $('.tooltip-error-password').css({display:'none'});
        }
    });
    $('input[name="commit"]').click(function () {
        var usernumber = $('input[name="usernumber"]').val();
        if(usernumber.length > 0){
            var password = $('input[name="password"]').val();
            if(password.length > 0 ){
                var token = $('meta[name="_token"]').attr('content');
                $.ajax({
                    url:'/checkLogin',
                    type:'post',
                    headers:{'X-CSRF-TOKEN':token},
                    data:{usernumber:usernumber,password:password,remeber_me:remeber_me},
                    dataType:'json',
                    success:function (res) {
                        if(res.success){
                            $.msg('µÇÂ¼³É¹¦');
                            setTimeout(function(){
                                window.location = '/';
                            },2000);
                        }else {
                            $.msg(res.errorMsg);
                        }
                    }
                });
            }else {
                $('.tooltip-error-password').css({display:'block'});
            }
        }else {
            $('.tooltip-error-usernumber').css({display:'block'});
        }
    });
});