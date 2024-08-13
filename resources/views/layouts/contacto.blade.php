<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MeuKubico-Contacto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('frame/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frame/css/style.css') }}">

  </head>
  <body>

  <div class="site-loader"></div>

  <div class="site-wrap">

    @include('layouts.menu')


    <div class="conteudo-contacto">
        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">Contate-nos</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 mb-5">



            <form action="#" class="p-5 bg-white border">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Nome Completo</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Assunto</label>
                  <input type="text" id="subject" class="form-control" placeholder="Enter Subject">
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Mensagem</label>
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Enviar Menssagem" class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
              </div>


            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase">Informação de Contacto</h3>
              <p class="mb-0 font-weight-bold">Endereço</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Telefone</p>
              <p class="mb-4"><a href="#">+244 949714096</a></p>

              <p class="mb-0 font-weight-bold">Endereço de Email</p>
              <p class="mb-0"><a href="#">nicolaspz14@hotmail.com</a></p>

            </div>

          </div>

        </div>
      </div>
    </div>
    </div>



    @include('layouts.footer')
  </div>

 <script src= "{{ asset('frame/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frame/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frame/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frame/js/popper.min.js') }}"></script>
    <script src="{{ asset('frame/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frame/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frame/js/mediaelement-and-player.min.js') }}"></script>
    <script src="{{ asset('frame/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frame/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frame/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frame/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frame/js/aos.js') }}"></script>
    <script src="{{ asset('frame/js/circleaudioplayer.js') }}"></script>
    <script src="{{ asset('frame/js/main.js') }}"></script>
  <script>

  </body>
</html>
