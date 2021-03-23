$(document).ready(function(){
    $('#msform').on('submit', function(e){
        $.ajax({
            type: 'POST',
            url: 'pdf/preview',
            data: $('#msform').serialize(),
            success: function (data) {
                $('.previwePDF .row').append(data);
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
        return false;
    });
    
})