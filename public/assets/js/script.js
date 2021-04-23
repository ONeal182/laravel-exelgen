$(document).ready(function(){


// Init datepicker
function datePicker() {
	$('.date').datepicker({
		format: 'dd.mm.yyyy',
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
		title: 'Не указанна дата <span class="trigger-tooltip">Игнорировать</span>'
	})
};

function moreBegin(){
	$('.date').tooltip({ 
		placement: 'bottom',
		trigger: 'manual',
		html: true,
		title: 'Дата раньше начала работ'
	})
}

function lessBegin(){
	$('.date').tooltip({ 
		placement: 'bottom',
		trigger: 'manual',
		html: true,
		title: 'Дата меньше начала работ'
	})
}

function moreEnd(){
	$('.date').tooltip({ 
		placement: 'bottom',
		trigger: 'manual',
		html: true,
		title: 'Дата раньше конца работ'
	})
}

function lessEnd(){
	$('.date').tooltip({ 
		placement: 'bottom',
		trigger: 'manual',
		html: true,
		title: 'Дата позже конца работ'
	})
}

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


// Проверка даты 
$('.date').on('pick.datepicker', function (e) {
	// Включаем подсказку
	
	// Включаем возможность игнорировать подсказку
	ignoreTooltip();
	// Если дата раньше текущего дня, активируем условия
	if (e.date == '') {
		tooltipDate();
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
activePage();

$('.date').on('change', function(e){
	// var beginDate = $('.date[name=dateBeginWork]').val();
	// var endDate = $('.date[name=dateEndWork]').val();
	// var representativeContractorDate = $('.date[name=representativeContractorDate]').val();
	// var selectDate = $(this).val();
	// ignoreTooltip();
	
	// if(beginDate > endDate){
	// 	console.log('Больше');
	// 	lessEnd();
	// 	$(this).addClass('stopDate');
	// 	$(this).tooltip('show');
	// }else{
	// 	console.log('Норм');
	// 	$('.date[name=dateBeginWork]').removeClass('stopDate');
	// 	$('.date[name=dateBeginWork]').tooltip('hide');
	// }

})

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
	console.log(1);
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
	// var error = [];
	// var errorText = 'Ошибка:';
	// var beginDate = $('.date[name=dateBeginWork]');
	// var endDate = $('.date[name=dateEndWork]');
	// var representativeBuilderDateGet = $('.date[name=representativeBuilderDateGet]');
	// var representativeBuilderDate = $('.date[name=representativeBuilderDate]');
	// var representativeContractorDate = $('.date[name=representativeContractorDate]');
	// var memberBuilderDateId = $('.date[name=memberBuilderDateId]');
	// var preparationDateId = $('.date[name=preparationDateId]');
	// var compliteDateId = $('.date[name=compliteDateId]');
	// var anotherDate_Id = $('.date[name=anotherDate_Id]');

	// var docDate = $('.date[name=docDate]');
	// console.log(docDate);


	// if(beginDate.datepicker("getDate") < representativeBuilderDate.datepicker("getDate") || beginDate.datepicker("getDate") < representativeBuilderDateGet.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 5 обе даты раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// if(beginDate.datepicker("getDate") < representativeContractorDate.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 6 дата раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// if(beginDate.datepicker("getDate") < memberBuilderDateId.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 7 дата раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// if(beginDate.datepicker("getDate") < preparationDateId.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 8 дата раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// if(beginDate.datepicker("getDate") < compliteDateId.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 9 дата раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// if(beginDate.datepicker("getDate") < anotherDate_Id.datepicker("getDate")){
	// 	error.push('false');
	// 	errorText = errorText + ' Шаг 10 дата раньше начала работ ';
	// }else{
	// 	error.push('true');
	// }

	// docDate.each(function(){
	// 	var arrdocDate;
	// 	if($(this).datepicker("getDate") > beginDate.datepicker("getDate")){
	// 		var arrdocDate = false;
			
	// 	}

	// 	if(arrdocDate == false){
	// 		error.push('false');
	// 		errorText = errorText + ' Шаг 15 обе даты раньше начала работ ';
	// 	}
	// })

	// // if(endDate.datepicker("getDate") < dateAOSR.datepicker("getDate")){
	// // 	error.push('false');
	// // 	errorText = errorText + ' не раньше чем окончания работ, не раньше чем исполнительная схема шаг  15  ';
	// // }else{
	// // 	error.push('true');
	// // }
	
	

	
	// if(error.indexOf('false')){
	// 	$('#step16 .next').removeClass('error');
	// }else{
		
	// 	$('#step16 .next').addClass('error');
	// 	console.log(errorText);
	// }
	// if($('#step16').hasClass('active_page')){
	// 	if($('#step16 .next').hasClass('error')){
	// 		return false;
	// 	}
	// }

	// var dateAOSR = $('.date[name=dateAOSR]');

	// dateAOSR.each(function(){
	// 	var arrdateAOSR;
	// 	if($(this).datepicker("getDate") > endDate.datepicker("getDate")){
	// 		var arrdateAOSR = false;
			
	// 	}

	// 	if(arrdateAOSR == false){
	// 		error.push('false');
	// 		errorText = errorText + ' Шаг 15 обе даты раньше окончания работ ';
	// 	}
	// })

	// if(error.indexOf('false')){
	// 	$('#step20 .next').removeClass('error');
	// }else{
		
	// 	$('#step20 .next').addClass('error');
	// 	console.log(errorText);
	// }
	// if($('#step20').hasClass('active_page')){
	// 	if($('#step20 .next').hasClass('error')){
	// 		return false;
	// 	}
	// }
	
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
	$('.next').removeClass('error');
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