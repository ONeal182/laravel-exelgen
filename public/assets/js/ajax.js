$(document).ready(function(){
    $('#msform').on('submit', function(e){
        $.ajax({
            type: 'GET',
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
    $('.btn-download').on('click', function(){
        $.ajax({
            type: 'GET',
            url: 'pdf/generate',
            data: $('#msform').serialize(),
            dataType: 'binary',
            xhrFields: {
                'responseType': 'blob'
            },
            success: function(data, status, xhr) {
                var blob = new Blob([data], {type: xhr.getResponseHeader('Content-Type')});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'pdf/generate';
                link.click();
            }
        });
        return false;
    })
    
})