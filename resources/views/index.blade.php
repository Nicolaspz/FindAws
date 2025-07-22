<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.ico') }}">
      <title>
        @yield('title', 'Meu Kubiku - Venda e Arrendamento de Casas e Escritórios')</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Venda e arrendamento de casas, apartamentos, salões de festas, e armazéns em Angola. Confira as melhores ofertas no MeuKubiku.">
      <meta name="keywords" content="Venda de Casas, Arrenda de casas, Arrendamentos, casas Angola, Imobiliarias Angola, Meu kubico, MeuKubiku, MeuKubiko, Apartamentos, Salão de festas, Armazéns,meu cubicu">
      <meta name="description" content="@yield('description', 'Encontre imóveis para venda e arrendamento no Meu Kubiku, sua plataforma de confiança para casas e escritórios.')">
      <meta name="keywords" content="@yield('keywords', 'Meu Kubiku, imóveis, casas, escritórios, venda, arrendamento, alugar, imobiliária')">
       
       <!-- Open Graph / Facebook -->
          <meta property="og:type" content="website">
          <meta property="og:url" content="@yield('og_url', url('/'))">
          <meta property="og:title" content="@yield('og_title', 'Título Padrão')">
          <meta property="og:description" content="@yield('og_description', 'Descrição Padrão')">
          <meta property="og:image" content="@yield('og_image', asset('images/default-share.jpg'))">
         

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

          /* Estilos para os botões de compartilhamento */
        .share-container {
            margin: 25px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .share-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #343a40;
        }
        
        .share-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 15px;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
            min-width: 120px;
        }
        
        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            opacity: 0.9;
            color: white;
        }
        
        .share-btn i {
            margin-right: 8px;
            font-size: 16px;
        }
        
        .btn-facebook { background-color: #1877f2; }
        .btn-whatsapp { background-color: #25d366; }
        .btn-instagram { 
            background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
            color: white;
        }
        .btn-copylink { background-color: #6c757d; }
        
        /* Animação para feedback ao copiar link */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .share-alert {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 12px 24px;
            border-radius: 6px;
            background-color: #28a745;
            color: white;
            font-weight: 500;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            animation: fadeIn 0.3s ease;
            display: none;
        }

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
    @yield('meta')
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
