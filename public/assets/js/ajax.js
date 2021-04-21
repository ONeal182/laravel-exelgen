$(document).ready(function(){
    $('#msform').on('submit', function(e){
        $.ajax({
            type: 'POST',
            url: 'exel',
            data: $('#msform').serialize(),
            dataType: 'binary',
            xhrFields: {
                'responseType': 'blob'
            },
            success: function(data, status, xhr) {
                console.log(data);
                console.log(xhr);
                var blob = new Blob([data], {type: xhr.getResponseHeader('Content-Type')});
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                console.log(link.href);
                var fileName = xhr.getResponseHeader('Content-Disposition');
                link.download = fileName;
                link.click();
            }
        });
        return false;
    });
    // $('.btn-download').on('click', function(){

    // })
    
})