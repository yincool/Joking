var second = 3;

$().ready(function(){
    var html = '<div class="tooltip tooltip-error tooltip-error-top fade right in" role="tooltip" id="tooltip487731" style="top: 150px; left: 700px; display: block;">'+
        '<div class="tooltip-inner">'+
        '<span></span>'+
        '</div>'+
        '</div>';
    $.msg = function(msg) { 
        $('body').append(html);
        $('.tooltip-error-top span').text(msg);
        $('.tooltip-error-top').fadeIn('fast');
        showmsgDown = setInterval(showmsg,1000);
    }; 
});

function showmsg(){
   second--;
   if(second == 0){
       $('.tooltip-error-top').fadeOut('fast');
       $('.tooltip-error-top').remove();
       clearInterval(showmsgDown);
       second = 2;
    }
}
