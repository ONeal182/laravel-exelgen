$(document).ready(function(){
    $('#msform').on('submit', function(e){
        $.ajax({
            type: 'POST',
            url: 'pdf/preview',
            data: $('#msform').serialize(),
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