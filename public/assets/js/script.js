$(document).ready(function () {


	// Init datepicker
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


	// Всплывающая подсказка, при неправильной дате
	function tooltipDate(error) {

		$('.date').tooltip({
			placement: 'bottom',
			trigger: 'manual',
			html: true,
			title: error + ' <span class="trigger-tooltip">Игнорировать</span>'
		})

	};

	function moreBegin() {
		$('.date').tooltip({
			placement: 'bottom',
			trigger: 'manual',
			html: true,
			title: 'Дата раньше начала работ'
		})
	}

	function lessBegin() {
		$('.date').tooltip({
			placement: 'bottom',
			trigger: 'manual',
			html: true,
			title: 'Дата меньше начала работ'
		})
	}

	function moreEnd() {
		$('.date').tooltip({
			placement: 'bottom',
			trigger: 'manual',
			html: true,
			title: 'Дата раньше конца работ'
		})
	}

	function lessEnd() {
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

	// Проверка даты
	function dateCheck() {


		// Проверка даты 
		$('.date').on('pick.datepicker', function (e) {
			ignoreTooltip();

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

	$('.date').on('change', function (e) {
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
	$('body').on('click', '.control_section .delete', function () {
		$count = $(this).parents('.forms').find('.add_section').length;
		if ($count > 2) {
			$(this).parents('.add_section').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
	});
	// Удалить строку (сертификат соответсвия)
	$('body').on('click', '.contor_in_row_element .delete', function () {
		$count = $('.document_in .sertificat_sootvetsviya').length;
		if ($count > 1) {
			$(this).parents('.sertificat_sootvetsviya').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
	});
	// Удалить строку (документ подтверждающий качество)
	$('body').on('click', '.contor_in_row_element .delete', function () {
		$count = $('.document_in .document_podtverjdayushiy').length;
		if ($count > 1) {
			$(this).parents('.document_podtverjdayushiy').remove();
		}
		// скрыть тултипы
		$('.date').tooltip('hide');
	});


	// добавить секцию
	$('body').on('click', '.control_section .add', function () {
		var first_section = $(this).parents('fieldset').find('.forms .add_section:nth-child(1)').clone();
		first_section.find('input').val('');
		$(this).parent().parent().before(first_section);
		datePicker();

	})
	// Добавить строку (сертификат соответсвия)
	$('body').on('click', '.add_doc', function () {
		var first_doc = $(this).parents('.document_in').find('.sertificat_sootvetsviya.template').clone();
		first_doc.find('input').val('');
		$(this).parent().parent().before(first_doc.removeClass('template'));

		datePicker();
	});

	// Добавить строку (док.подтверждающий кач-во)
	$('body').on('click', '.add_doc_2', function () {
		var first_doc = $(this).parents('.document_in').find('.document_podtverjdayushiy.template').clone();
		first_doc.find('input').val('');
		$(this).parent().parent().before(first_doc.removeClass('template'));

		datePicker();
	});






	// Todo: Открытие вкладки по якорю, сохранение данных
	// Считываем текущий хэш
	var hash = window.location.hash.substr(1);
	$('fieldset').each(function (index) {
		$(this).attr('page', 'pg' + index);
	});
	if (hash) {
		next_fs = $('fieldset').find('[page="pg' + hash + '"]')
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
	var beginDate = $('.date[data-name=dateBeginWork]');
	var endDate = $('.date[data-name=dateEndWork]');
	var dateAOSR = $('.date[data-name=dateAOSR]');
	function hiddenTooltip(element) {
		element.on('click', function () {
			$('.tooltip-inner').css('display', 'none');
		})
	}
	hiddenTooltip(beginDate);
	hiddenTooltip(endDate);
	hiddenTooltip(dateAOSR);
	$(".next").click(function () {

		ignoreTooltip();
		var error = [];
		var errorText = 'Ошибка:';
		var beginDate = $('.date[data-name=dateBeginWork]');
		var endDate = $('.date[data-name=dateEndWork]');
		var representativeBuilderDateGet = $('.date[data-name=representativeBuilderDateGet]');
		var representativeBuilderDate = $('.date[data-name=representativeBuilderDate]');
		var representativeContractorDate = $('.date[data-name=representativeContractorDate]');
		var memberBuilderDate = $('.date[name=memberBuilderDate]');
		var memberBuilderDateId = $('.date[name=memberBuilderDateId]');
		var preparationDateId = $('.date[data-name=preparationDateId]');
		var compliteDateId = $('.date[data-name=compliteDateId]');
		var anotherDate_Id = $('.date[data-name=anotherDate_Id]');
		var docDate = $('.date[data-name=docDate]');
		var dateAOSR = $('.date[data-name=dateAOSR]');
		function date(date) {
			var time = new Date(date);
			return time;
		}
		function checkDate(first, second, step) {
			if (second.val() == '' || first.datepicker('getDate') < second.datepicker('getDate')) {
				error.push('false');
				errorText = errorText + 'В шаге ' + step + ' даты позже начала работ ';
				second.addClass('stopDate');


			} else {
				error.push('true');
				second.removeClass('stopDate');
			}
		}
		function checkDateDuble(first, second, third, step) {
			var errorDuble;
			var secondEmpty;
			var thirdEmpty;
			if (second.val() == '') {
				error.push('false');
				second.addClass('stopDate');
				errorDuble = false;
				secondEmpty = false;


			}

			if (third.val() == '') {
				third.addClass('stopDate');
				errorDuble = false;
				error.push('false');
				thirdEmpty = false;
			}
			if (thirdEmpty !== false) {
				if (date(first.datepicker('getDate')) < date(third.datepicker('getDate'))) {
					third.addClass('stopDate');
					errorDuble = false;
				} else {
					third.removeClass('stopDate');
					error.push('true');
				}
			}
			if (secondEmpty !== false) {
				if (date(first.datepicker('getDate')) < date(second.datepicker('getDate'))) {
					second.addClass('stopDate');
					errorDuble = false;
				} else {
					second.removeClass('stopDate');
					error.push('true');
				}
			}

			if (errorDuble === false) {
				errorText = errorText + ' В шаге ' + step + ' даты позже начала работ, ';
				error.push('false');
			}
		}
		function emptyDate(element) {
			if (element.hasClass('ignor') === false) {
				if (element.val() == '') {
					$('.date').tooltip('dispose');
					ignoreTooltip();
					tooltipDate('Дата начала работ обязательное поле');
					element.addClass('stopDate');
					element.tooltip('show');
					return false;
				} else {
					element.removeClass('stopDate');
				}
			} else {
				return true;
			}

		}
		// if ($('#step16 .next').hasClass('ignor') == false) {


		if ($('#step16').hasClass('active_page')) {
			if (emptyDate(beginDate) == false || emptyDate(endDate) == false) {
				return false;
			}


			// if (representativeBuilderDateGet.val() == '' || representativeBuilderDate.val() == '' || date(beginDate.datepicker('getDate')) < date(representativeBuilderDate.datepicker('getDate')) || date(beginDate.datepicker('getDate')) < date(representativeBuilderDateGet.datepicker('getDate'))) {
			// 	error.push('false');
			// 	errorText = errorText + ' В шаге 5 даты позже начала работ, ';
			// 	representativeBuilderDateGet.addClass('stopDate');
			// 	console.log(2);
			// 	representativeBuilderDate.addClass('stopDate');


			// } else {
			// 	error.push('true');
			// 	representativeBuilderDateGet.removeClass('stopDate');
			// 	representativeBuilderDate.removeClass('stopDate');
			// }

			checkDateDuble(beginDate, representativeBuilderDateGet, representativeBuilderDate, 5);

			checkDate(beginDate, representativeContractorDate, '6');

			checkDateDuble(beginDate, memberBuilderDate, memberBuilderDateId, 7);

			checkDate(beginDate, preparationDateId, '8');

			checkDate(beginDate, compliteDateId, '9');

			checkDate(beginDate, anotherDate_Id, '10');

			var arrdocDate;
			var errorStep20;
			docDate.each(function () {
				if ($(this).datepicker('getDate') < endDate.datepicker('getDate')) {
					errorStep20 = false;
				}
				if ($(this).val() == '' || $(this).datepicker('getDate') < beginDate.datepicker('getDate')) {
					arrdocDate = false;
					$(this).addClass('stopDate');

				} else {
					$(this).removeClass('stopDate');
				}
				if (arrdocDate == false) {
					error.push('false');

				}
			})
			if (arrdocDate == false) {
				errorText = errorText + 'В шаге 15 дата раньше начала работ ';
			}
			if (error.indexOf('false')) {
				$('#step16 .next').removeClass('error');

			} else {
				$('#step16 .next').addClass('error');

			}
			var errorStatus;
			if (error.indexOf('false') != -1) {
				errorStatus = false;
			} else {
				errorStatus = true;
			}
			if (beginDate.hasClass('ignor') === false) {
				if (errorStatus === false) {
					console.log(errorStatus);
					$('.date').tooltip('dispose');
					ignoreTooltip();
					tooltipDate(errorText);
					beginDate.addClass('stopDate');
					beginDate.tooltip('show');
					return false;
				}

			}

		}


		if ($('#step20').hasClass('active_page')) {
			if ($('#step20 .next').hasClass('ignor2') === false) {

				$('#step20 .next').addClass('error');
				if (dateAOSR.val() == '') {
					$('.date').tooltip('dispose');
					ignoreTooltip();
					tooltipDate('Ошибка: Дата составления обязательное поле ');
					dateAOSR.addClass('stopDate');
					dateAOSR.tooltip('show');
					return false;
				}
				if (date(endDate.datepicker('getDate')) > date(dateAOSR.datepicker('getDate'))) {
					$('.date').tooltip('dispose');
					ignoreTooltip();
					tooltipDate('Ошибка: дата раньше чем окончания работ ');
					dateAOSR.addClass('stopDate');
					dateAOSR.tooltip('show');
					return false;
				} else if (errorStep20 === false) {
					$('.date').tooltip('dispose');
					ignoreTooltip();
					tooltipDate('Ошибка: дата раньше чем в шаге 15 ');
					dateAOSR.addClass('stopDate');
					dateAOSR.tooltip('show');
					return false;
				}
			}
		}
		// if (error.indexOf('false')) {
		// 	$('#step20 .next').removeClass('error');
		// } else {

		// 	$('#step20 .next').addClass('error');
		// 	console.log(errorText);
		// }
		// if ($('#step20').hasClass('active_page')) {
		// 	if ($('#step20 .next').hasClass('error')) {
		// 		return false;
		// 	}
		// }

		// Init page function
		setTimeout(function () { activePage() }, 200);
		// Curent page
		current_fs = $(this).parents('fieldset');
		// Next page
		next_fs = $(this).parents('fieldset').next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		let new_current = $('.active_page').next().attr('page');

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
		setProgressBar(new_current + 1);
	});


	// Предыдущий шаг
	function numberStep() {
		$('.nav-bread a').on('click', function (e) {
			e.preventDefault();

			var selectStep = $(this).attr('data-step');

			selectStep = Number(selectStep) - 1;
			selectStefForProgress = Number(selectStep);


			current_fs = $(this).parents().parents('fieldset');
			previous_fs = $('fieldset[page="pg' + selectStep + '"]');
			$('fieldset[page="pg' + selectStep + '"] .nav-bread a[data-step="' + (selectStep + 1) + '"]').css({
				'color': 'black', 'pointer-events': 'none',
				'cursor': 'default'
			});
			console.log(previous_fs);
			current_fs.animate({ opacity: 0 }, {
				step: function (now) {
					// for making fielset appear animation
					opacity = 1 - now;

					current_fs.removeClass('active_page');
					current_fs.css({
						'display': 'none',
						'position': 'relative'
					});
					previous_fs.addClass('active_page');
					previous_fs.css({ 'opacity': opacity });
				},
				duration: 500
			});
			setProgressBar(selectStefForProgress + 1);
		})
	}
	numberStep();
	$(".previous").click(function () {
		var beginDate = $('.date[data-name=dateBeginWork]');
		var endDate = $('.date[data-name=dateEndWork]');
		$('.next').removeClass('error');
		$('#step16 .next').removeClass('ignor');
		$('#step20 .next').removeClass('ignor2');
		beginDate.removeClass('ignor');
		endDate.removeClass('ignor');
		// Init page function
		setTimeout(function () { activePage() }, 200);

		current_fs = $(this).parents('fieldset');
		previous_fs = $(this).parents('fieldset').prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();
		let new_current = $('.active_page').attr('page');
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
				previous_fs.addClass('active_page');
				previous_fs.css({ 'opacity': opacity });
			},
			duration: 500
		});

		new_current = parseInt(new_current.match(/\d+/))

		setProgressBar(new_current--);
	});

	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		console.log(curStep);
		$(".progress-bar")
			.css("width", percent + "%")
		$('.step-all').html(steps - 1);
		$('.step-count').html(curStep);
		$('fieldset[page="pg' + curStep + '"] .nav-bread a[data-step="' + (curStep + 1) + '"]').css({
			'color': 'black', 'pointer-events': 'none',
			'cursor': 'default'
		});

	}

	function setDateStep20() {
		var dateStep15 = $('.date[data-name=docDate]');
		var dateStep20 = $('.date[data-name=dateAOSR]');
		// dateStep20.val(dateStep15.val());
	}

	function copyInfoStep17() {
		var textStep13 = $('textarea[name=anotherDocs]');
		var projectDocsCheck = $('input[name=projectDocsCheck]');
		var textStep17 = $('textarea[name=razdeDoc]');
		var block17 = $('.rzdeDocBlock');
		console.log(textStep13.val());
		console.log(textStep17.val());
		if (projectDocsCheck.is(':checked') === true) {
			textStep17.val(textStep13.val());
		} else {
			block17.css('display', 'none');
		}
	}

	$('#msform').on('change', function () {
		setDateStep20();
		copyInfoStep17();
	})



});