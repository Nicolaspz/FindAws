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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>

  </script>
  @yield('javascript')
<script>

if (typeof jQuery != 'undefined') {
    $(document).ready(function() {

        $('.ajax-link').click(function(event) {
            alert("olaaa");
            event.preventDefault(); // Impede que o link mude a página
            var type = this.id === 'rent-button' ? 'venda' : 'renda'; // Determina o tipo baseado no ID do botão
            loadProperties(type); // Chama a função que faz a requisição AJAX




        });
    });

    function loadProperties(type) {
        $.ajax({
            url: `/${type}`, // Endpoint para a requisição
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data.data);
                updateProperties(data.data); // Atualiza a página com os novos dados
                scrollToElement('properties-container', 60);
            },
            error: function(xhr) {
                console.error("Erro ao buscar propriedades: ", xhr.statusText);
            }
        });
    }
    function scrollToElement(elementId, offset) {
    // Assegura que um offset padrão é usado se nenhum for fornecido
    offset = offset || 60; // Você pode ajustar o valor padrão conforme necessário

    var offsetTop = $('#' + elementId).offset().top - offset;
    $('html, body').animate({'scrollTop': offsetTop}, 2000); // 2000 ms para a animação
}

    function updateProperties(data) {
        var container = $('#properties-container > .container > .row.mb-5');
        container.empty(); // Limpa os dados existentes

    // Insere novos dados recebidos
    if (data.length === 0) {
        // Insere uma mensagem de "nenhum resultado encontrado"
        container.append('<div class="alert alert-warning center">Nenhum resultado encontrado para o tipo de pesquisa selecionado.</div>');
    } else {
    data.forEach(function(property) {
        var businessClass = property.business_id === 1 ? 'bg-danger' : 'bg-info';
        var imageUrl =`/storage/${property.technical_details_img}`; // Ajuste conforme o caminho real da imagem

        var html = `
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="/detail/${property.id}#property_details" class="property-thumbnail">
                        <div class="offer-type-wrap">
                            <span class="offer-type ${businessClass}">${property.business_name}</span>
                        </div>

                        <img src="${imageUrl}" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <a href="/detail/${property.id}#property_details" class="property-favorite"><span class="icon-heart-o"></span></a>
                        <h2 class="property-title"><a href="/detail/${property.id}#property_details">${property.title}</a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>${property.cidade}, ${property.municipio_name}-${property.distrito_name}</span>
                        <strong class="property-price text-primary mb-3 d-block text-success">${property.price}.00Kz</strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Tipologia</span>
                                <span class="property-specs-number">${property.typology_name}</span>
                            </li>
                            <li>
                                <span class="property-specs">Visita</span>
                                <span class="property-specs-number">2</span> <!-- Suponho que isso seja estático -->
                            </li>
                            <li>
                                <span class="property-specs">Área</span>
                                <span class="property-specs-number">${property.area}m<sup>2</sup></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        `;

        container.append(html);
    });
}
    }
} else {
    console.error("jQuery não está definido");
}


$(document).ready(function() {
    // Verifica se há um hash no URL
    if(window.location.hash) {
        var hash = window.location.hash.substring(1); // Pega o ID do hash, removendo o '#'
        var offsetTop = $('#' + hash).offset().top - 60; // Calcula o deslocamento do topo da propriedade, considerando uma barra de navegação de 65 pixels (ou qualquer outro valor necessário)
        $('html, body').animate({'scrollTop': offsetTop}, 2000); // Anima o scroll até a propriedade
    }


});






</script>



  </body>
</html>
