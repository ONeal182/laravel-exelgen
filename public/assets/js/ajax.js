
$(document).ready(function () {
    $('#msform').on('submit', function (e) {
        e.preventDefault();
    })
    function ignoreTooltip() {
        $('.date').on('shown.bs.tooltip', function () {

            $('.trigger-tooltip').click(function () {
                $('#step16 .next').addClass('ignor');
                if ($('#step20 .next').hasClass('error')) {
                    $('#step20 .next').addClass('ignor2');
                }
                // Получим айди тултипа при клике на внутреннюю кнопку
                $tooltip = $(this).parents('.tooltip').attr('id');
                // Скрываем тултип у нужного инпута
                $('input[aria-describedby="' + $tooltip + '"]').tooltip('hide');
                // Убираем красную обводку у нужного инпута
                $('input[aria-describedby="' + $tooltip + '"]').removeClass('stopDate');
                $('input[aria-describedby="' + $tooltip + '"]').addClass('ignor');
            });
        })
    };
    function datePicker() {
        $('.date').datepicker({
            format: 'dd.mm.yyyy',
            date: '',
            language: 'ru-RU',
            autoHide: true
        });
        // Инициализируем проверку дат (проверка и подсказки)
        dateCheck();
        $('.date').attr('placeholder', '01.01.2000');
    };
    function dateCheck() {


        // Проверка даты 
        $('.date').on('pick.datepicker', function (e) {
            ignoreTooltip();

        });
    };

    function checkNumberAct() {
        let numberAct = $("input[name='numberAct']");
        if (numberAct.val() != '') {
            return true
        } else {
            return false;
        }

    }
    function sbSerialize(a) {
        var res = "";
        var total = 0;
        for (var key in a) {
            total++;
            res += "s:" + String(key).length + ":\"" + String(key).replace(/"/g, "\\\"") + "\";s:" + String(a[key]).length + ":\"" + String(a[key]).replace(/"/g, "\\\"") + "\";";
        }
        res = "a:" + total + ":{" + res + "}";
        return res;
    }
    function activePage() {
        var beginDate = $('.date[name=dateBeginWork]').val();
        var endDate = $('.date[name=dateEndWork]').val();
        var representativeBuilderDate = $('.date[name=representativeBuilderDate]').val();
        // По умолчанию сбрасываем подсказки с дат
        $('.date').tooltip('hide');
        // Инициализируем датапикер
        datePicker();
        // Инициализируем проверку даты
        dateCheck();

        // Заготовка, инициализация чего-либо на 5(или любом другом) шаге
        // if($('#step16').hasClass('active_page')){
        // 	if(beginDate < representativeBuilderDate){
        // 		console.log('Ошибка');
        // 		$('#step16 .next').addClass('error');
        // 	}

        // }	
    }

    function setProgressBar(curStep) {
        var steps = $("fieldset").length;
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
        $('.step-all').html(steps - 1);
        $('.step-count').html(curStep);

    }

    $('.btn-download').on('click', function (e) {
        var dateAOSR = $('.date[data-name=dateAOSR]');
        var numberAct = $('input[name=numberAct]');
        if (checkNumberAct()) {
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
                success: function (data, status, xhr) {
                    console.log(data);
                    // console.log(xhr);
                    var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    console.log(xhr.getResponseHeader('Content-Type'));
                    var fileName = 'АОСР № ' + numberAct.val() + ' от ' + dateAOSR.val() + '.xls'
                    link.download = fileName;
                    link.click();
                }
            });
            return false;
        } else {
            if ($('#step20').hasClass('active_page')) {

            } else {
                current = 20;
                setTimeout(function () { activePage() }, 200);
                // Curent page
                current_fs = $(this).parents('fieldset');
                // Next page
                next_fs = $('#step20');
                let new_current = $('.active_page').attr('page');
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({ opacity: 0 }, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.removeClass('active_page');
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.addClass('active_page');
                        next_fs.css({ 'opacity': opacity });
                    },
                    duration: 500
                });

                new_current = parseInt(new_current.match(/\d+/))
                setProgressBar(20);
                $('input[name="numberAct"]').addClass('stopDate');
            }

        }


    });
    // $('.btn-download').on('click', function(){

    // })
    $('.personal_admin').on('click', function(){
        if(checkNumberAct()){
            $('.notNumer').css('display','none');
            $('.hasNumber').css('display','block')
        }else{
            $('.notNumer').css('display','block');
            $('.hasNumber').css('display','none')
        }
    })
    $('.save_doc_modal').on('click', function () {
        var dateAOSR = $('.date[data-name=dateAOSR]');
        var numberAct = $('input[name=numberAct]');
        var numberActModal = $('input[name=numberActModal]');

        if (checkNumberAct()) {
            
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
                success: function (data, status, xhr) {
                    console.log(data);
                    // console.log(xhr);
                    var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    console.log(xhr.getResponseHeader('Content-Type'));
                    var fileName = 'АОСР № ' + numberAct.val() + ' от ' + dateAOSR.val() + '.xls'
                    link.download = fileName;
                    link.click();
                    document.location.href = '/personal/list';

                }
            });
            return false;
        } else {
            if (numberActModal.val() != '') {
                // var serlizeForm = $('#msform').serializeArray();
                // serlizeForm[89].value = numberActModal.val();
                // serlizeForm = JSON.stringify(serlizeForm);

                $('#msform').submit();
                $.ajax({
                    type: 'POST',
                    url: 'exel',
                    data: $('#msform').serialize() + '&numberActModal=' + numberActModal.val(),
                    dataType: 'binary',
                    scriptCharset: "utf-8",
                    xhrFields: {
                        'responseType': 'blob'
                    },
                    success: function (data, status, xhr) {
                        console.log(data);
                        // console.log(xhr);
                        var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        console.log(xhr.getResponseHeader('Content-Type'));
                        var fileName = 'АОСР № ' + numberAct.val() + ' от ' + dateAOSR.val() + '.xls'
                        link.download = fileName;
                        link.click();
                        document.location.href = '/personal/list';
                    }
                });
            }
        }
    })

})