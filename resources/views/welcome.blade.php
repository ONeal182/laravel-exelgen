<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AOSR</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500&display=swap" rel="stylesheet">
        <!-- Bootstrap --> 
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
    </head>
    <body class="home">
  <!-- header --> 
  <header class="top_menu">
    <nav class="top_navbar navbar  justify-content-between">
      <div class="container">
        <a class="top_logo" href="/"><img src="{{ asset("assets/img/logo.svg") }}"></a>
        <!-- <div class="top_nav">
          <ul> 
            <li style="display: none"><a href="#">О нас</a></li>
            <li><a href="#">Ваши пожелания и замечания</a></li>
          </ul>
        </div> -->
        <!-- <div class="top_phone"><a href="#"> +7 (123) 456-78-90</a></div>
        <div class="login">
          <ul> 
            <li><a href="#"> Вход </a></li>
            <li><a href="#"> Регистрация </a></li>
          </ul>
        </div> -->
      </div>
    </nav>
    <!-- <nav class="bottom_navbar navbar justify-content-between">
      <div class="container">
        <ul>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
                <path id="create" data-name="create" d="M10.5,6.375V0H1.125A1.122,1.122,0,0,0,0,1.125v21.75A1.122,1.122,0,0,0,1.125,24h15.75A1.122,1.122,0,0,0,18,22.875V7.5H11.625A1.128,1.128,0,0,1,10.5,6.375ZM18,5.714V6H12V0h.286a1.124,1.124,0,0,1,.8.328l4.589,4.594A1.121,1.121,0,0,1,18,5.714Z" fill="#004ac9"/>
              </svg>
              Создать новый АОСР
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path id="Контур_2" data-name="Контур 2" d="M23.247,37.247l-4.494-4.494A2.571,2.571,0,0,0,16.935,32H2.571A2.571,2.571,0,0,0,0,34.571V53.429A2.571,2.571,0,0,0,2.571,56H21.429A2.571,2.571,0,0,0,24,53.429V39.065a2.571,2.571,0,0,0-.753-1.818ZM12,52.571a3.429,3.429,0,1,1,3.429-3.429A3.429,3.429,0,0,1,12,52.571Zm5.143-16.314v5.385a.643.643,0,0,1-.643.643H4.071a.643.643,0,0,1-.643-.643V36.071a.643.643,0,0,1,.643-.643H16.314a.643.643,0,0,1,.455.188l.186.186a.643.643,0,0,1,.188.455Z" transform="translate(0 -32)" fill="#004ac9"/>
              </svg>
              Сохранить на компьютер
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="34.286" height="24" viewBox="0 0 34.286 24">
                <path id="save_web" data-name="save_web" d="M28.8,42.425a5.149,5.149,0,0,0-4.8-7,5.117,5.117,0,0,0-2.855.868,8.572,8.572,0,0,0-16,4.275c0,.145.005.289.011.434A7.716,7.716,0,0,0,7.714,56H27.429A6.857,6.857,0,0,0,28.8,42.425Zm-7.495,3.412-.579.579a1.291,1.291,0,0,1-1.848-.027l-1.736-1.848v6.745a1.283,1.283,0,0,1-1.286,1.286H15a1.283,1.283,0,0,1-1.286-1.286V44.541l-1.736,1.848a1.286,1.286,0,0,1-1.848.027l-.579-.579a1.28,1.28,0,0,1,0-1.816l4.966-4.966a1.28,1.28,0,0,1,1.816,0L21.3,44.021A1.285,1.285,0,0,1,21.305,45.837Z" transform="translate(0 -32)" fill="#004ac9"/>
              </svg>
              Сохранить на сервисе
            </a>
          </li>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="27.429" height="24" viewBox="0 0 27.429 24">
                <path id="archive" data-name="archive" d="M1.714,54.286A1.712,1.712,0,0,0,3.429,56H24a1.712,1.712,0,0,0,1.714-1.714V38.857h-24Zm8.571-11.357a.645.645,0,0,1,.643-.643H16.5a.645.645,0,0,1,.643.643v.429A.645.645,0,0,1,16.5,44H10.929a.645.645,0,0,1-.643-.643ZM25.714,32h-24A1.712,1.712,0,0,0,0,33.714v2.571a.86.86,0,0,0,.857.857H26.571a.86.86,0,0,0,.857-.857V33.714A1.712,1.712,0,0,0,25.714,32Z" transform="translate(0 -32)" fill="#004ac9"/>
              </svg>
              Архив AOCP
            </a>
          </li>
        </ul>
      </div>
    </nav> -->
  </header>




  <div class="home_banner">
    <div class="container">
      <div class="banner">
        <h1> БЕСПЛАТНОЕ Оформление АОСР онлайн </h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget erat eget justo porttitor varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae eros odio. </p>
        <a href="/forms" class="button-home"> Оформить АОСР </a>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <p> © {{ date('Y') }}  AOCP </p>
        </div>
        <!-- <div class="col-lg-3 footer_contact">
          <a href="tel:+7 123 456-78-90">+7 123 456-78-90 </a>
          <a href="mailto:info@aocponline.ru">info@aocponline.ru</a>
        </div>
        <div class="col-lg-3">
          <a href="#"> Политика конфиденциальности и сбора персональных данных </a>
        </div>
        <div class="col-lg-3 text-right">
          <a href="#"> Поддержка 24/7 </a>
        </div> -->
      </div>
    </div>
  </footer>
<!-- Jquery --> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap --> 
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset("assets/js/script.js") }}"></script>
</body>
</html>
