<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.ico') }}">
    <title>@yield('title', 'Meu Kubiku - Venda e Arrendamento de Casas e Escritórios')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Description -->
    <meta name="description" content="@yield('description', 'Encontre imóveis para venda e arrendamento no Meu Kubiku, sua plataforma de confiança para casas e escritórios.')">

    <!-- Meta Keywords -->
    <meta name="keywords" content="@yield('keywords', 'Meu Kubiku, imóveis, casas, escritórios, venda, arrendamento, alugar, imobiliária')">

    <!-- Open Graph Metadata -->
    <meta property="og:title" content="@yield('og_title', 'Meu Kubiku - Venda e Arrendamento de Casas e Escritórios')">
    <meta property="og:description" content="@yield('og_description', 'Encontre as melhores opções de casas e escritórios no Meu Kubiku. Veja mais detalhes e encontre o imóvel ideal para você.')">
    <meta property="og:image" content="@yield('og_image', asset('frame/images/default-image.jpg'))">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:type" content="website">

    <!-- Twitter Metadata -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Meu Kubiku - Venda e Arrendamento de Casas e Escritórios')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Encontre imóveis para venda e arrendamento no Meu Kubiku.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('frame/images/default-image.jpg'))">

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



    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/contacto.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2">{{__('messages.s')}}</h1>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="images/about.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title">
              <h2>{{__('messages.s1')}}</h2>
            </div>
            <p class="lead">
                <strong>{{__('messages.sStr')}}</strong>{{__('messages.s3')}}

            </p>
            <p>
                {{__('messages.s4')}} <strong>{{__('messages.sStr')}}</strong>{{__('messages.s5')}}

            </p>
            {{--<p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">Read More</a></p>--}}
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center"  data-aos="fade-up" >
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>{{__('messages.Sl')}}</h2>
            <p>
              {{__('messages.Sl1')}}
            </p>
          </div>
        </div>
      </div>
      <div class="row">


          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="300">
            <div class="team-member">

              <img src="images/helder.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Helder Manuel</h2>
                <span class="d-block mb-3 text-white-opacity-05">
                  {{__('messages.Sl2')}}
                </span>
                <p>
                     {{__('messages.Sl3')}}

                </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="200">
            <div class="team-member">

              <img src="images/person_0.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Saroj Gupta</h2>
                <span class="d-block mb-3 text-white-opacity-05">
                    {{__('messages.Sl4')}}
                </span>
                <p>{{__('messages.Sl5')}}</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="400">
            <div class="team-member">

              <img src="images/nicolaspz.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">
                    Adão Nicolau
            </h2>
                <span class="d-block mb-3 text-white-opacity-05">
                  <p>{{__('messages.Sl6')}}</p>
                </span>
                <p>
                   <p>{{__('messages.Sl7')}}</p>
                </p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>



        </div>
    </div>
    </div>

<!--
    <div class="site-section bg-light">
      <div class="container" data-aos="fade">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7">
            <div class="site-section-title text-center">
              <h2>Nossos Agentes</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima quibusdam, laboriosam.</p>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Steven Ericson</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sed qui at harum ipsum earum voluptas a unde error sapiente, sint perspiciatis, fugiat neque iure rerum repellendus tempora odio doloribus.</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/person_5.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Nathan Dumlao</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nobis commodi rerum dicta, nulla. Delectus neque hic deserunt consequuntur esse facere, necessitatibus corrupti! Blanditiis ratione consequuntur beatae adipisci, voluptatum consequatur.</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded mb-4">

              <div class="text">

                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nam tenetur molestiae maiores officiis consectetur, distinctio aperiam in illum praesentium corrupti, harum porro reiciendis magnam non enim dolorem aut explicabo.</p>
                <p>
                  <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
-->
    <div class="site-section">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <div class="site-section-title">
              <h2><p>{{__('messages.SP')}}</p></h2>
            </div>
            <p></p>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
          <div class="col-md-8">
            <div class="accordion unit-8" id="accordion">
            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">{{__('messages.SP')}}<span class="icon"></span></a>
              </h3>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    {{__('messages.SP2')}}

                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">{{__('messages.SP3')}}<span class="icon"></span></a>
              </h3>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                  {{__('messages.SP4')}}
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">{{__('messages.SP5')}} <span class="icon"></span></a>
              </h3>
              <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    {{__('messages.SP6')}}

                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">{{__('messages.SP7')}}<span class="icon"></span></a>
              </h3>
              <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                    {{__('messages.SP8')}}
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
             <div class="accordion-item">
              <h3 class="mb-0 heading">
                <a class="btn-block" data-toggle="collapse" href="#collapseFive" role="button" aria-expanded="false" aria-controls="collapseFour"> {{__('messages.SP9')}}<span class="icon"></span></a>
              </h3>
              <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="body-text">
                  <p>
                   {{__('messages.SP10')}}
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
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
