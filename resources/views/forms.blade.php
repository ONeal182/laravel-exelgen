<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AOCP - ФОРМА</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/datepicker.min.css") }}">

</head>

<body class="snippet-body">

  <!-- header -->
  <header class="top_menu">
    <nav class="top_navbar navbar  justify-content-between">
      <div class="container">
        <a class="top_logo" href="index.html"><img src="img/logo.svg"></a>
        <div class="top_nav">
          <ul>
            <li style="display: none"><a href="#">О нас</a></li>
            <li><a href="#">Ваши пожелания и замечания</a></li>
          </ul>
        </div>
        <div class="top_phone">
          <!--a href="#"> +7 (123) 456-78-90</a-->
        </div>
        <div class="login">
          <ul>
            <li><a href="#"> Вход </a></li>
            <li><a href="#"> Регистрация </a></li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="bottom_navbar navbar justify-content-between">
      <div class="container">
        <ul>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                <path id="create" data-name="create" d="M10.5,6.375V0H1.125A1.122,1.122,0,0,0,0,1.125v21.75A1.122,1.122,0,0,0,1.125,24h15.75A1.122,1.122,0,0,0,18,22.875V7.5H11.625A1.128,1.128,0,0,1,10.5,6.375ZM18,5.714V6H12V0h.286a1.124,1.124,0,0,1,.8.328l4.589,4.594A1.121,1.121,0,0,1,18,5.714Z" fill="#004ac9" />
              </svg>
              Создать новый АОСР
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path id="Контур_2" data-name="Контур 2" d="M23.247,37.247l-4.494-4.494A2.571,2.571,0,0,0,16.935,32H2.571A2.571,2.571,0,0,0,0,34.571V53.429A2.571,2.571,0,0,0,2.571,56H21.429A2.571,2.571,0,0,0,24,53.429V39.065a2.571,2.571,0,0,0-.753-1.818ZM12,52.571a3.429,3.429,0,1,1,3.429-3.429A3.429,3.429,0,0,1,12,52.571Zm5.143-16.314v5.385a.643.643,0,0,1-.643.643H4.071a.643.643,0,0,1-.643-.643V36.071a.643.643,0,0,1,.643-.643H16.314a.643.643,0,0,1,.455.188l.186.186a.643.643,0,0,1,.188.455Z" transform="translate(0 -32)" fill="#004ac9" />
              </svg>
              Сохранить на компьютер
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="34.286" height="24" viewBox="0 0 34.286 24">
                <path id="save_web" data-name="save_web" d="M28.8,42.425a5.149,5.149,0,0,0-4.8-7,5.117,5.117,0,0,0-2.855.868,8.572,8.572,0,0,0-16,4.275c0,.145.005.289.011.434A7.716,7.716,0,0,0,7.714,56H27.429A6.857,6.857,0,0,0,28.8,42.425Zm-7.495,3.412-.579.579a1.291,1.291,0,0,1-1.848-.027l-1.736-1.848v6.745a1.283,1.283,0,0,1-1.286,1.286H15a1.283,1.283,0,0,1-1.286-1.286V44.541l-1.736,1.848a1.286,1.286,0,0,1-1.848.027l-.579-.579a1.28,1.28,0,0,1,0-1.816l4.966-4.966a1.28,1.28,0,0,1,1.816,0L21.3,44.021A1.285,1.285,0,0,1,21.305,45.837Z" transform="translate(0 -32)" fill="#004ac9" />
              </svg>
              Сохранить на сервисе
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="27.429" height="24" viewBox="0 0 27.429 24">
                <path id="archive" data-name="archive" d="M1.714,54.286A1.712,1.712,0,0,0,3.429,56H24a1.712,1.712,0,0,0,1.714-1.714V38.857h-24Zm8.571-11.357a.645.645,0,0,1,.643-.643H16.5a.645.645,0,0,1,.643.643v.429A.645.645,0,0,1,16.5,44H10.929a.645.645,0,0,1-.643-.643ZM25.714,32h-24A1.712,1.712,0,0,0,0,33.714v2.571a.86.86,0,0,0,.857.857H26.571a.86.86,0,0,0,.857-.857V33.714A1.712,1.712,0,0,0,25.714,32Z" transform="translate(0 -32)" fill="#004ac9" />
              </svg>
              Архив AOCP
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>



  <div class="container">

    <!-- Forms -->
    <form id="msform" action="exel" method="post">
      {{ csrf_field() }}
      <!-- 
    /---------------------------/
    Step 1
    /--------------------------/ 
  -->
      <!-- 
    /---------------------------/
    Step 1
    /--------------------------/ 
  -->
      <fieldset class="active_page" id="step1">
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Оформление АОСР </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <h3 class="title-inner"> Заполните информацию об объекте капитального строительства </h3>
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Наименование проектной документации</label>
                <input type="text" name="projectName" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Почтовый или строительный адрес объекта капитального строительства</label>
                <textarea name="projectAddres"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" style="visibility: hidden;" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>


      <!-- 
    /---------------------------/
    Step 2
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Заполните информацию о застройщике (технический заказчик, эксплуатирующая организация или региональный оператор) </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <h3 class="title-inner"> Юридическое лицо </h3>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="builderName" />
              </div>
              <div class="col-lg-8">
                <label class="fieldlabels">Место нахождения юридического лица</label>
                <input type="text" name="builderAddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="builderORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="builderINN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">Телефон </label>
                <input type="text" name="builderPhone" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels"> Факс</label>
                <input type="text" name="builderFax" />
              </div>
            </div>
            <h3 class="title-inner"> Саморегулируемая организация </h3>
            <div class="row">
              <div class="col-lg-6">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="builderNameOrg" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="builderOrgORG" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="builderOrgINN" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>


      <!-- 
    /---------------------------/
    Step 3 
    /--------------------------/ 
  -->

      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Заполните информацию о лице осуществляющем строительство. </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <h3 class="title-inner"> Юридическое лицо </h3>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="contractorName" />
              </div>
              <div class="col-lg-8">
                <label class="fieldlabels">Место нахождения юридического лица</label>
                <input type="text" name="contractorAddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="contractorORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="contractorINN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">Телефон</label>
                <input type="text" name="contractorPhone" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">Факс</label>
                <input type="text" name="contractorFax" />
              </div>
            </div>
            <h3 class="title-inner"> Саморегулируемая организация </h3>
            <div class="row">
              <div class="col-lg-6">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="contractorOrgName" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="contractorOrgORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="contractorOrgINN" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 4 
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Заполните информацию о лице, осуществляющем подготовку проектной документации </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <h3 class="title-inner"> Юридическое лицо </h3>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="preparationName" />
              </div>
              <div class="col-lg-8">
                <label class="fieldlabels">Место нахождения юридического лица</label>
                <input type="text" name="preparationAddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="preparationORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="preparationINN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">Телефон</label>
                <input type="text" name="preparationPhone" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">Факс</label>
                <input type="text" name="preparationFax" />
              </div>
            </div>
            <h3 class="title-inner"> Саморегулируемая организация </h3>
            <div class="row">
              <div class="col-lg-6">
                <label class="fieldlabels">Наименование</label>
                <input type="text" name="preparationOrgName" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="preparationOrgORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="preparationOrgINN" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>


      <!-- 
    /---------------------------/
    Step 5 
    /--------------------------/ 
  -->
      <fieldset id="step5">
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Заполните информацию о представителе застройщика (технического заказчика, эксплуатирующей организации или региональный оператора) по вопросам строительного контроля </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">

            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Должность</label>
                <input type="text" name="representativeBuilderPosition" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Фамилия, инициалы</label>
                <input type="text" name="representativeBuilderFIO" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                <input type="text" name="representativeBuilderRequisites" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата распорядительного документа</label>
                <input type="text" class="date" name="representativeBuilderDate" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Идентификационный номер</label>
                <input type="text" name="representativeBuilderId" />
                <label class="bottomlabel"> в национальном реестре специалистов в области строительства </label>
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи номера</label>
                <input type="text" class="date" name="representativeBuilderDateGet" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="representativeBuilderORGN" />
              </div>
              <div class="col-lg-3">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="representativeBuilderINN" />
              </div>
              <div class="col-lg-6">
                <label class="fieldlabels">Местонахождение юр.Лица</label>
                <input type="text" name="representativeBuilderAddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>

          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>



      <!-- 
    /---------------------------/
    Step 6 
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о представителе лица осуществляющего строительство </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Должность</label>
                <input type="text" name="representativeContractorPosition" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Фамилия, инициалы</label>
                <input type="text" name="representativeContractorFIO" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                <input type="text" name="representativeContractorRequisites" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи документа</label>
                <input type="text" class="date" name="representativeContractorDate" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 7
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о представителе лица осуществляющего строительство, по вопросам строительного контроля (специалист по организации строительства)</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-6">
                <label class="fieldlabels">Должность</label>
                <input type="text" name="memberBuilderPosition" />
              </div>
              <div class="col-lg-6">
                <label class="fieldlabels">Фамилия, инициалы</label>
                <input type="text" name="memberBuilderFIO" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Идентификационный номер</label>
                <input type="text" name="memberBuilderId" />
                <label class="bottomlabel"> в национальном реестре специалистов в области строительства </label>
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи номера</label>
                <input type="text" class="date" name="memberBuilderDateId" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                <input type="text" name="memberBuilderRequisites" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи документа</label>
                <input type="text" class="date" name="memberBuilderDate" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 8
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполнить информацию о представителе лица осуществляющего подготовку проектной документации </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Должность</label>
                <input type="text" name="preparationPosition" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Фамилия, инициалы</label>
                <input type="text" name="preparationFIO" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                <input type="text" name="preparationREQ" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи номера</label>
                <input type="text" class="date" name="preparationDateId" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Наименование юридического лица</label>
                <input type="text" name="preparationYurName" />
              </div>
              <div class="col-lg-8">
                <label class="fieldlabels">Место нахождения юридического лица</label>
                <input type="text" name="preparationYurAddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="preparationORGN" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="preparationINN" />
              </div>

            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 9
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о представителе лица выполнившего работы, подлежащие освидетельствованию </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Должность</label>
                <input type="text" name="complitePosition" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Фамилия, инициалы</label>
                <input type="text" name="compliteFIO" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                <input type="text" name="compliteREQ" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата выдачи номера</label>
                <input type="text" class="date" name="compliteDateId" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Наименование юридического лица</label>
                <input type="text" name="compliteNameYUR" />
              </div>
              <div class="col-lg-8">
                <label class="fieldlabels">Место нахождения юридического лица</label>
                <input type="text" name="compliteYURaddres" />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">ОГРН</label>
                <input type="text" name="compliteORGN" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">ИНН</label>
                <input type="text" name="compliteINN" />
              </div>

            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 10
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию об иных лицах, участвующих в освидетельствовании.</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="add_section first_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-8">
                    <label class="fieldlabels">Должность</label>
                    <input type="text" name="anotherPosition[]" />
                  </div>
                  <div class="col-lg-4">
                    <label class="fieldlabels">Фамилия, инициалы</label>
                    <input type="text" name="anotherFIO[]" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <label class="fieldlabels">Реквизиты распорядительного документа, подтверждающего полномочия</label>
                    <input type="text" name="anotherREQ[]" />
                  </div>
                  <div class="col-lg-4">
                    <label class="fieldlabels">Дата выдачи номера</label>
                    <input type="text" class="date" name="anotherDate_Id[]" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <label class="fieldlabels">Наименование юридического лица</label>
                    <input type="text" name="anotherNameYur[]" />
                  </div>

                </div>
              </div>
              <div class="control_section">
                <div class="delete"></div>
                <div class="add" style="display: none;"></div>
              </div>
            </div>

            <div class="add_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" name="step2_input1" disabled="disabled" placeholder="Добавить ещё одно лицо, осуществляющее освидетельствование" />
                  </div>
                </div>
              </div>
              <div class="control_section">
                <div class="delete" style="display: none;"></div>
                <div class="add"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Больше не спрашивать в следующих актах
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 11
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Произвели осмотр работ, выполненных </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Наименование юридического лица, выполнившего работы, подлежащие освидетельствованию
                </label>
                <input type="text" name="checkName" />
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 12
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card ">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Укажите информацию о предъявленных работах</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms row_sections">
            <div class="add_section first_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <textarea type="text" name="workDo[]" placeholder="Введите информацию о предъявленной работе" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="control_section topnull">
                <div class="delete"></div>
                <div class="add" style="display: none;"></div>
              </div>
            </div>

            <div class="add_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <textarea type="text" name="workDo" disabled="disabled" placeholder="Добавить новый пункт" rows="1"></textarea>
                  </div>
                </div>
              </div>
              <div class="control_section">
                <div class="delete" style="display: none;"></div>
                <div class="add"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 13
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о проектной документации </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Номер, другие реквизиты чертежа, наименование проектной документации и/или рабочей документации, сведения о лицах, осуществляющих подготовку раздела проектной и/или рабочей документации
                </label>
                <textarea name="anotherDocs" class="textarea-large"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="checkbox-label"> Дублировать в информацию в раздел о нормативно технических документах, по которым произведены работы
                  <input type="checkbox" checked="checked">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 14
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о строительном материале</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="add_section first_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" name="materialName[]" placeholder="Наименование материала">
                  </div>
                </div>
                <div class="row_element document_in ">
                  <div class="row sertificat_sootvetsviya template">
                    <div class="col-lg-4">
                      <input type="text" name="sertificate[]" placeholder="Сертификат соответсвия">
                    </div>
                    <div class="field-line">
                      <label class="fieldlabels"> Действителен с </label>
                    </div>
                    <div class="col-lg-2">
                      <input type="text" class="date" name="sertificatefrom[]">
                    </div>
                    <div class="field-line">
                      <label class="fieldlabels"> По </label>
                    </div>
                    <div class="col-lg-2">
                      <input type="text" class="date" name="sertificateBy[]">
                    </div>
                    <div class="contor_in_row_element">
                      <div class="delete"></div>
                    </div>
                  </div>
                  <div class="row document_podtverjdayushiy template">
                    <div class="col-lg-4">
                      <input type="text" name="sertificateQuality" placeholder="Документ подтверждающий качество">
                    </div>
                    <div class="field-line">
                      <label class="fieldlabels"> Дата </label>
                    </div>
                    <div class="col-lg-2">
                      <input type="text" class="date" name="sertificateDate[]">
                    </div>
                    <div class="contor_in_row_element">
                      <div class="delete"></div>
                    </div>
                  </div>
                  <div class="row add_document_block">
                    <div class="col-lg-6">
                      <div class="add_doc">
                        <div class="add"></div> Добавить сертификат
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="add_doc_2">
                        <div class="add"></div> Документ подтверждающий качество
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="control_section">
                <div class="delete"></div>
                <div class="add" style="display: none;"></div>
              </div>
            </div>

            <div class="add_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">

                    <input type="text" disabled="disabled" name="step2_input1" placeholder="добавить еще материал" />
                  </div>
                </div>
              </div>
              <div class="control_section">
                <div class="delete" style="display: none;"></div>
                <div class="add"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 15
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card ">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Заполните информацию о документах подтверждающие соответствие работ предъявляемым к ним требованиям</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="row">
            <div class="col-md-12">
              <label class="fieldset">Исполнительные схемы и чертежи, результаты экспертиз, обследований, лабораторных и иных испытаний выполненных работ, проведенных в процессе строительного контроля</label>
            </div>
          </div>
          <div class="forms row_sections">

            <div class="add_section first_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="text" name="doc[]" placeholder="Документ" />
                  </div>
                  <div class="col-lg-2">
                    <input type="text" class="date" name="docDate[]" />
                  </div>
                </div>
              </div>
              <div class="control_section topnull">
                <div class="delete"></div>
                <div class="add" style="display: none;"></div>
              </div>
            </div>

            <div class="add_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-10">
                    <input type="text" name="doc2" placeholder="Документ" />
                  </div>
                  <div class="col-lg-2">
                    <input type="text" class="date" name="docDate2" />
                  </div>
                </div>
              </div>
              <div class="control_section">
                <div class="delete" style="display: none;"></div>
                <div class="add"></div>
              </div>
            </div>

          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 16 
    /--------------------------/ 
  -->

      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Заполните информацию о датах производства работ </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Дата начала производства работ</label>
                <input type="text" class="date" name="dateBeginWork" />
              </div>
              <div class="col-lg-4">
                <label class="fieldlabels">Дата окончания производства работ</label>
                <input type="text" class="date" name="dateEndWork" />
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 17 
    /--------------------------/ 
  -->

      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Работы выполнены в соответствии с </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Разделы проектной и/или рабочей документации</label>
                <textarea name="razdeDoc" class="textarea-large"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Наименования и структурные единицы технических регламентов, иных нормативных правовых актов</label>
                <textarea name="RegName" class="textarea-large"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 18 
    /--------------------------/ 
  -->

      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title"> Какие последующие работы разрешаются </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Наименование работ, конструкций, участков сетей инженерно-технического обеспечения</label>
                <textarea name="nameWorkCostruct" class="textarea-large"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 19 
    /--------------------------/ 
  -->

      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Дополнительные сведения </h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-12">
                <label class="fieldlabels">Внесите дополнительные сведения:</label>
                <textarea name="moreInfo" class="textarea-large"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="button" name="next" class="next action-button" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step 20 
    /--------------------------/ 
  -->

      <fieldset id="step20">
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-md-10">
                <h2 class="title">Номер акта, дата, количество экземпляров</h2>
              </div>
              <div class="col-lg-2">
                <div class="step">Шаг <div class="step-count"></div> из <div class="step-all"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- input step -->
          <div class="forms">
            <div class="row">
              <div class="col-lg-4">
                <label class="fieldlabels">Номер акта</label>
                <input name="numberAct">
                <label class="bottomlabel">Вы можете использовать цифры и буквы</label>
              </div>
              <div class="col-lg-4">
                <label class="dateAOSR">Дата составления АОСР</label>
                <input name="dateAOSR" type="text" class="date">
              </div>
              <div class="col-lg-4">
                <label class="countExemp">Количество экземпляров акта</label>
                <input name="countAOSR" type="number">
              </div>
            </div>
          </div>
          <h3 class="title-inner">Приложение </h3>
          <div class="forms">

            <div class="add_section first_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" name="countSuppl[]" placeholder="Приложение">
                  </div>
                </div>
              </div>
              <div class="control_section topnull">
                <div class="delete"></div>
                <div class="add" style="display: none;"></div>
              </div>
            </div>
            <div class="add_section">
              <div class="content_section">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="text" name="countSuppl2" placeholder="Приложение">
                  </div>
                </div>
              </div>
              <div class="control_section">
                <div class="delete" style="display: none;"></div>
                <div class="add"></div>
              </div>
            </div>

          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <div class="step-form">Шаг <div class="step-count"></div> из <div class="step-all"></div>
          </div>
          <input type="submit" name="next" class="next action-button submitAOSR" value="Далее" />
        </div>
      </fieldset>

      <!-- 
    /---------------------------/
    Step Final 
    /--------------------------/ 
  -->
      <fieldset>
        <div class="form-card">
          <!-- header step -->
          <div class="header-forms">
            <div class="row">
              <div class="col-lg-10">
                <h2 class="title"> Проверьте ваш АОСР </h2>
              </div>

            </div>
          </div>
          <!-- input step -->
          <div class="forms previwePDF">

            <label for="exampleFormControlSelect1">Шрифт заголовка</label>
            <select class="form-control" name='fontTitle' id="exampleFormControlSelect1">
              <option value="9">9px</option>
              <option value="10">10px</option>
              <option selected value="11">11px</option>
              <option value="12">12px</option>
              <option value="13">13px</option>
              <option value="14">14px</option>
            </select>
            <label for="exampleFormControlSelect1">Шрифт текста</label>
            <select class="form-control" name='fontText' id="exampleFormControlSelect1">
              <option value="9">9px</option>
              <option value="10">10px</option>
              <option selected value="11">11px</option>
              <option value="12">12px</option>
              <option value="13">13px</option>
              <option value="14">14px</option>
            </select>
            <label for="exampleFormControlSelect1">Шрифт подписи текста</label>
            <select class="form-control" name='fontTextBottom' id="exampleFormControlSelect1">
              <option selected value="8">8px</option>
              <option value="9">9px</option>
              <option value="10">10px</option>
              <option value="11">11px</option>
              <option value="12">12px</option>
              <option value="13">13px</option>
              <option value="14">14px</option>
            </select>



          </div>
        </div>
        <div class="footer-form">
          <input type="button" name="previous" class="previous action-button" value="Назад" />
          <a href="#" class="button-blue btn-download"><img src="img/icons/save-button.svg">Скачать на компьютер (PDF) </a>
          <input type="button" name="next" class="next action-button" value="Далее" style="visibility: hidden;" />
        </div>
      </fieldset>



      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </form>


  </div>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p> © 2020 AOCP </p>
        </div>
        <div class="col-lg-3 footer_contact">
          <!--a href="tel:+7 123 456-78-90">+7 123 456-78-90 </a-->
          <a href="mailto:info@aocponline.ru">info@aocponline.ru</a>
        </div>
        <div class="col-lg-3">
          <a href="#"> Политика конфиденциальности и сбора персональных данных </a>
        </div>
        <div class="col-lg-3 text-right">
          <a href="#"> Поддержка 24/7 </a>
        </div>
      </div>
    </div>
  </footer>
</body>

<!-- Jquery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- Popperjs -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<!-- datepicker -->
<script type="text/javascript" src="{{ asset("assets/js/datepicker.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/i18n/datepicker.ru-RU.js") }}"></script>
<!-- Script -->
<script type="text/javascript" src="{{ asset("assets/js/rule-date.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/script.js") }}"></script>
<script type="text/javascript" src="{{ asset("assets/js/ajax.js") }}"></script>


</html>