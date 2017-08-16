$(document).ready(function () {
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
                    data:{usernumber:usernumber,password:password},
                    dataType:'json',
                    success:function (res) {
                        if(res.success){
                            alert(res.data);
                        }else {
                            alert(2);
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