$(document).ready(function(){


// Init datepicker
function datePicker() {
	$('.date').datepicker({
		format: 'mm.dd.yyyy',
		date: new Date,
		language: 'ru-RU',
		autoHide: true
	});
	// Инициализируем проверку дат (проверка и подсказки)
	dateCheck();
	$('.date').attr('placeholder','01.01.2000');
};


// Всплывающая подсказка, при неправильной дате
function tooltipDate() { 
	$('.date').tooltip({ 
		placement: 'bottom',
		trigger: 'manual',
		html: true,
		title: 'Неправильно указана дата <span class="trigger-tooltip">Игнорировать</span>'
	})
};

// Выполнить при показе всплывающей подсказки
function ignoreTooltip() {
	$('.date').on('shown.bs.tooltip', function () {
		$('.trigger-tooltip').click(function() { 
		// Получим айди тултипа при клике на внутреннюю кнопку
		$tooltip = $(this).parents('.tooltip').attr('id');
		// Скрываем тултип у нужного инпута
		$('input[aria-describedby="'+$tooltip+'"]').tooltip('hide');
		// Убираем красную обводку у нужного инпута
		$('input[aria-describedby="'+$tooltip+'"]').removeClass('stopDate');
	});
	})
};

// Проверка даты
function dateCheck() {
// Включаем подсказку
tooltipDate();
// Включаем возможность игнорировать подсказку
ignoreTooltip();

// Проверка даты 
$('.date').on('pick.datepicker', function (e) {
	// Если дата раньше текущего дня, активируем условия
	if (e.date < new Date()) {
		$(this).addClass('stopDate');
		$(this).tooltip('show');
	} else { 
		$(this).removeClass('stopDate');
		$(this).tooltip('hide');
	}
});
};

// При включении любой страницы 
function activePage() {
	// По умолчанию сбрасываем подсказки с дат
	$('.date').tooltip('hide');
	// Инициализируем датапикер
	datePicker();
	// Инициализируем проверку даты
	dateCheck();

	// Заготовка, инициализация чего-либо на 5(или любом другом) шаге
	if($('#step5').hasClass('active_page')){
		console.log('Это пятый шаг');
	}	
}
activePage();
	
// Удалить секцию 
$('body').on('click', '.control_section .delete', function(){
		$count = $(this).parents('.forms').find('.add_section').length;
		if($count > 2) {
			$(this).parents('.add_section').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
	});
	// Удалить строку (сертификат соответсвия)
$('body').on('click', '.contor_in_row_element .delete', function(){
		$count = $('.document_in .sertificat_sootvetsviya').length;
		if($count > 1) { 
			$(this).parents('.sertificat_sootvetsviya').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
});
	// Удалить строку (документ подтверждающий качество)
$('body').on('click', '.contor_in_row_element .delete', function(){
		$count = $('.document_in .document_podtverjdayushiy').length;
		if($count > 1) { 
			$(this).parents('.document_podtverjdayushiy').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
});


// добавить секцию
$('body').on('click', '.control_section .add', function(){
	var first_section = $(this).parents('fieldset').find('.forms .add_section:nth-child(1)').clone();
	first_section.find('input').val('');
	$(this).parent().parent().before(first_section);

	datePicker();

})
// Добавить строку (сертификат соответсвия)
$('body').on('click', '.add_doc', function(){
	var first_doc = $(this).parents('.document_in').find('.sertificat_sootvetsviya.template').clone();
	first_doc.find('input').val('');
	$(this).parent().parent().before(first_doc.removeClass('template'));

	datePicker();
});

// Добавить строку (док.подтверждающий кач-во)
$('body').on('click', '.add_doc_2', function(){
	var first_doc = $(this).parents('.document_in').find('.document_podtverjdayushiy.template').clone();
	first_doc.find('input').val('');
	$(this).parent().parent().before(first_doc.removeClass('template'));

	datePicker();
});






// Todo: Открытие вкладки по якорю, сохранение данных
// Считываем текущий хэш
var hash = window.location.hash.substr(1);
$('fieldset').each(function(index) {
	$(this).attr('page','pg'+index);
});
if(hash) { 
	next_fs = $('fieldset').find('[page="pg'+hash+'"]')
		//Add Class Active
		next_fs.show();
		//show the next fieldset
	}


var current_fs, next_fs, previous_fs; //fieldsets
var opacity; 
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);


// Следующий шаг
$(".next").click(function(){
// Init page function
setTimeout(function() { activePage()}, 200);
	// Curent page
	current_fs = $(this).parents('fieldset');
	// Next page
	next_fs = $(this).parents('fieldset').next();
	
	//Add Class Active
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
	step: function(now) {
// for making fielset appear animation
opacity = 1 - now;
current_fs.removeClass('active_page');
current_fs.css({
	'display': 'none',
	'position': 'relative'
});
next_fs.addClass('active_page');
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});


// Предыдущий шаг
$(".previous").click(function(){
// Init page function
setTimeout(function() { activePage()}, 200);

current_fs = $(this).parents('fieldset');
previous_fs = $(this).parents('fieldset').prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
	step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.removeClass('active_page');
current_fs.css({
	'display': 'none',
	'position': 'relative'
});
previous_fs.addClass('active_page');
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
	var percent = parseFloat(100 / steps) * curStep;
	percent = percent.toFixed();
	$(".progress-bar")
	.css("width",percent+"%")
	$('.step-all').html(steps-1);
	$('.step-count').html(curStep);

}

});