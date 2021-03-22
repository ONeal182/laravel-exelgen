$(document).ready(function(){
    $('.test').on('submit', function(e){
        
        $.ajax({
            type: 'POST',
            url: 'pdf/preview',
            data: $('.test').serialize(),
            success: function (data) {
                console.log(data)
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
        return false;
    });
    
})