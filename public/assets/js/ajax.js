$(document).ready(function(){
    $('#msform').on('submit', function(e){
        $.ajax({
            type: 'GET',
            url: 'exel',
            data: $('#msform').serialize(),
            dataType: 'binary',
            xhrFields: {
                'responseType': 'blob'
            },
            success: function(data, status, xhr) {
                var blob = new Blob([data], {type: xhr.getResponseHeader('Content-Type')});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'exel';
                link.click();
            }
        });
        return false;
    });
    // $('.btn-download').on('click', function(){

    // })
    
})