
$(document).ready(function(){
    $('#msform').on('submit', function(e){
        e.preventDefault();
    })
    $('.btn-download').on('click', function(e){
        var dateAOSR = $('.date[data-name=dateAOSR]');
        var numberAct = $('input[name=numberAct]');
        $('#msform').submit();
        $.ajax({
            type: 'POST',
            url: 'exel',
            data: $('#msform').serialize(),
            dataType: 'binary',
            scriptCharset: "utf-8",
            xhrFields: {
                'responseType': 'blob'
            },
            success: function(data, status, xhr) {
                console.log(data);
                // console.log(xhr);
                var blob = new Blob([data], {type: xhr.getResponseHeader('Content-Type')});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                console.log(xhr.getResponseHeader('Content-Type'));
                var fileName = 'АОСР № '+numberAct.val()+' от '+dateAOSR.val()+'.xls'
                link.download = fileName;
                link.click();
            }
        });
        return false;
    });
    // $('.btn-download').on('click', function(){

    // })
    
})