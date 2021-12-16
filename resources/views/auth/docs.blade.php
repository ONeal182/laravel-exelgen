<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AOCP - ФОРМА</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="yandex-verification" content="0d66c2072f0337e6" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/datepicker.min.css") }}">
  <link rel="icon" type="image/ico" sizes="16x16" href="{{ asset("assets/img/icons/favicon.ico") }}">

</head>

<body class="snippet-body">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Внимание!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <div class="col-lg-12 notNumer">
            <label class="fieldlabels notificate">Чтобы сохранить документ, укажите номер акта</label>
            <input type="text" name="numberActModal">
          </div>
        </div>
        <div class="col-lg-12 hasNumber">
          <p>Вы собираетесь покинуть страницу, сохранить документ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
          <button type="button" class="btn btn-primary save_doc_modal2">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
  <!-- header -->
  <header class="top_menu">
    <nav class="top_navbar navbar  justify-content-between">
      <div class="container">
        <a class="top_logo" href="/"><img src="{{ asset("assets/img/logo.svg") }}"></a>
        <div class="top_nav">
          <ul>
            <li style="display: none"><a href="#">О нас</a></li>
            <!-- <li><a href="#">Ваши пожелания и замечания</a></li> -->
          </ul>
        </div>
        <div class="top_phone">
          <!--a href="#"> +7 (123) 456-78-90</a-->
        </div>
        <!-- <div class="login">
          <ul>
            <li><a href="#"> Вход </a></li>
            <li><a href="#"> Регистрация </a></li>
          </ul>
        </div> -->
        <a data-toggle="modal" class="personal_admin" data-target="#exampleModal" href="/personal">Перейти в личный кабинет</a>
      </div>
    </nav>
    <nav style="display: none;" class="bottom_navbar navbar justify-content-between">
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
    <form id="msform" action="/personal/list/updateDocs/{{$ID}}" method="post">
      {{ csrf_field() }}

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
                    @foreach ($Docs->workDoArr as $workDoArr )
                    
                    <textarea type="text" value="{{$workDoArr['workDo']}}" name="workDo[]" placeholder="Введите информацию о предъявленной работе" rows="5">{{$workDoArr['workDo']}}</textarea>

                    @endforeach
                    
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
                    <textarea type="text" disabled="disabled" placeholder="Добавить новый пункт" rows="1"></textarea>
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
            <button type="submit" class="button-blue btn-download2"><img src="{{ asset("assets/img/icons/save-button.svg") }}">Сохранить</button>
            <input type="button" name="next" class="next action-button" value="Далее" style="visibility: hidden;" />
        </div>
      </fieldset>


      <!-- 
    /---------------------------/
    Step Final 
    /--------------------------/ 
  -->
      {{-- <fieldset>
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
          <button type="submit" class="button-blue btn-download2"><img src="{{ asset("assets/img/icons/save-button.svg") }}">Скачать на компьютер </button>
          <input type="button" name="next" class="next action-button" value="Далее" style="visibility: hidden;" />
        </div>
      </fieldset> --}}
    </form>


  </div>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p> © {{ date('Y') }} AOCP </p>
        </div>
        <div class="col-lg-3 footer_contact">
          <!--a href="tel:+7 123 456-78-90">+7 123 456-78-90 </a-->
          <!-- <a href="mailto:info@aocponline.ru">info@aocponline.ru</a> -->
        </div>
        <!-- <div class="col-lg-3">
          <a href="#"> Политика конфиденциальности и сбора персональных данных </a>
        </div> -->
        <!-- <div class="col-lg-3 text-right">
          <a href="#"> Поддержка 24/7 </a>
        </div> -->
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
<script src="//code-ya.jivosite.com/widget/w14XaBFQY4" async></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(80142052, "init", {
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true,
ecommerce:"dataLayer"
});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/80142052" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</html>