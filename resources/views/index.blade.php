<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Meu Kubiku - Venda e Arrendamento de Casas e Escritórios')</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Venda e arrendamento de casas, apartamentos, salões de festas, e armazéns em Angola. Confira as melhores ofertas no MeuKubiku.">
    <meta name="keywords" content="Venda de Casas, Arrenda de casas, Arrendamentos, casas Angola, Imobiliarias Angola, Meu kubico, MeuKubiku, MeuKubiko, Apartamentos, Salão de festas, Armazéns">
    <!-- Restante do seu código -->
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
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .carousel-item {
      height: 95vh; /* Altura ajustada */
    }

    .carousel-item img {
      height: 100%; /* A imagem ocupa a altura total do item */
      object-fit: cover; /* Garante que a imagem se ajuste sem distorção */
    }

    @media (max-width: 768px) {
      .carousel-item {
        height: 300px; /* Altura menor para telas pequenas */
      }

      .carousel-item img {
        height: 100%;
        object-fit: cover;
      }
    }
    </style>

  </head>
  <body>

  <div class="site-loader"></div>

  <div class="site-wrap">

    @include('layouts.menu')

   @include('layouts.carroussel')

   @yield('search')

    @yield('produts')
    {{--
    @include('layouts.chooise')
    @include('layouts.recentBlog')
    @include('layouts.agents')
    --}}


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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>

  $(document).ready(function() {
    // Quando a província for alterada, carregue os municípios
    $('#province_id').change(function() {
      var province_id = $(this).val();
      if (province_id) {
        $.ajax({
          url: '/get-municipios/' + province_id,  // Rota para obter municípios
          type: 'GET',
          success: function(data) {
            $('#municipio_id').empty();  // Limpa o campo de municípios
            $('#municipio_id').append('<option value="">Selecione Município</option>');
            $.each(data, function(index, municipio) {
              $('#municipio_id').append('<option value="' + municipio.id + '">' + municipio.name + '</option>');
            });
          }
        });
      } else {
        $('#municipio_id').empty();
        $('#municipio_id').append('<option value="">Selecione Município</option>');
      }
    });

    // Quando o município for alterado, carregue os distritos
    $('#municipio_id').change(function() {
      var municipio_id = $(this).val();
      if (municipio_id) {
        $.ajax({
          url: '/get-distritos/' + municipio_id,  // Rota para obter distritos
          type: 'GET',
          success: function(data) {
            $('#distrito_id').empty();  // Limpa o campo de distritos
            $('#distrito_id').append('<option value="">Selecione Distrito</option>');
            $.each(data, function(index, distrito) {
              $('#distrito_id').append('<option value="' + distrito.id + '">' + distrito.name + '</option>');
            });
          }
        });
      } else {
        $('#distrito_id').empty();
        $('#distrito_id').append('<option value="">Selecione Distrito</option>');
      }
    });
  });
  </script>
  @yield('javascript')
</body>

</html>
