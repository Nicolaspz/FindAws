@extends('index')

@section('produts')
<div class="site-section site-section-sm property-details" id="property_details">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
                 @endif
      <div class="row">
        <div class="col-lg-8">
          <div>
            <div class="slide-one-item home-slider owl-carousel">
              <div><img src="{{ Storage::url($propertie->technical_details_img) }}" alt="Image" class="img-fluid"></div>
              @foreach ($images as $image)
              <div>
                <div><img src="{{ Storage::url($image->url) }}" alt="Image" class="img-fluid"></div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="bg-white property-body border-bottom border-left border-right">
            <div class="row mb-5">
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Estado</span>
                <strong class="d-block">{{$propertie->condition_name}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Construção</span>
                <strong class="d-block">{{$propertie->ano_construcao}}</strong>
              </div>
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">Preço</span>
                <strong class="d-block">{{ number_format($propertie->price, 2) }} Kz </strong>
              </div>

            </div>
            <h2 class="h4 text-black">Mais Informações</h2>
            <p>{{$propertie->description}}</p>
            <p>{{$propertie->abstract}}</p>
            <hr>
            <span class="property-icon icon-room"></span>{{$propertie->provincia_name}} - {{$propertie->municipio_name}}-{{$propertie->distrito_name}} - {{$propertie->cidade}}
            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                
                 @if(isset($visitCounts[$propertie->id]))
                    <span class="property-specs">
                        Esta propriedade teve: {{ $visitCounts[$propertie->id] }} Visitas
                    </span>
                @endif

                                
             </ul>

            <div class="row no-gutters mt-5">

                <div class="col-md-12">
                  <h5>Apresentação</h5>
                  <video style="width: 100%;" controls src="{{Storage::url($propertie->movie) }}"></video>
                </div>

              <div class="col-12">
                <h2 class="h4 text-black mb-3">Galleria</h2>
              </div>
              @foreach ($images as $image)
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{ Storage::url($image->url) }}" class="image-popup gal-item">
                  <img src="{{ Storage::url($image->url) }}" alt="Image" class="img-fluid"></a>
              </div>
              @endforeach
              <div class="col-sm-6 col-md-4 col-lg-3">
                <a href="{{ Storage::url($propertie->technical_details_img) }}" class="image-popup gal-item">
                  <img src="{{ Storage::url($propertie->technical_details_img) }}" alt="Image" class="img-fluid"></a>
              </div>

            </div>
          </div>

        </div>
        <div class="col-lg-4">
          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3">Detalhes</h3>
            <div class="col text-muted">
              <div class="flex-container">
                  <div class="flex-item">
                      <p class="mb-2"><img src="{{asset('images/area.png')}}" class="property-details-icons"/> Área: {{ $propertie->area ? $propertie->area : 'N/A' }} m<sup>2</sup></p>
                  </div>
                  <div class="flex-item">
                      @if ($propertie->piscina)
                      <p class="mb-2"><img  src="{{asset('images/piscina.png')}}" class="property-details-icons"/> Piscina</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->terraco)
                      <p class="mb-2"><img src="{{asset('images/terraco.png')}}" class="property-details-icons"/> Terraço</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->jardin)
                      <p class="mb-2"><img src="{{asset('images/jardim.png')}}" class="property-details-icons"/> Jardim</p>
                      @endif
                  </div>
                  {{--<div class="flex-item">
                      @if ($propertie->storage_room)
                      <p class="mb-2"><img src="{{asset('images/arrecadacao.png')}}" class="property-details-icons"/> Arrecadação</p>
                      @endif
                  </div>--}}
                  <div class="flex-item">
                      @if ($propertie->park > 0)
                      <p class="mb-2"><img src="{{asset('images/garagem.png')}}" class="property-details-icons"/>{{$propertie->park }} Vagas de garagem</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->ar_condicionado)
                      <p class="mb-2"><img src="{{asset('images/ar-condicionado.png')}}" class="property-details-icons"/> Ar-Condicionado</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->roupeiro_imbutido)
                      <p class="mb-2"><img src="{{asset('images/armario-embutido.png')}}" class="property-details-icons"/> Armário Embutido</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->elevator)
                      <p class="mb-2"><img src="{{asset('images/elevador.png')}}" class="property-details-icons"/> Elevador</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->propiedade_acessivel)
                      <p class="mb-2"><img src="{{asset('images/acessibilidade.png')}}" class="property-details-icons"/> Acessibilidade</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->quarto)
                      <p class="mb-2"><img src="{{asset('images/quartos.png')}}" class="property-details-icons"/>{{ $propertie->quarto }} Quartos</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->banheiro)
                      <p class="mb-2"><img  src="{{asset('images/wc.png')}}" class="property-details-icons"/>{{ $propertie->banheiro }} Casas de banho</p>
                      @endif
                  </div>
              </div>
          </div>

          </div>


          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3">Contactar Agente</h3>

            <form id="ajaxForm" method="POST" action="{{ route('submitVisit') }}">
                @csrf
                <input type="hidden" id="properties_id" name="properties_id" value="{{ $propertie->id }}">

                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" required>

                <label for="phone">Telefone:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>

                <label for="info">Descrição:</label>
                <textarea id="info" name="info" class="form-control" required></textarea>

                <label for="data_vista">Data da Visita:</label>
                <input type="date" id="data_vista" name="data_vista" class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>



          </div>
          <div id="map"></div>
        </div>

      </div>

    </div>
  </div>


 @endsection

  @section('javascript')

  <script src="https://maps.googleapis.com/maps/api/js?key=SUA_CHAVE_API&callback=initMap" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.7/dist/inputmask.min.js"></script>
<script>

$(document).ready(function() {
    // Verifica se há um hash no URL
    if(window.location.hash) {
        var hash = window.location.hash.substring(1); // Pega o ID do hash, removendo o '#'
        var offsetTop = $('#' + hash).offset().top - 80; // Calcula o deslocamento do topo da propriedade, considerando uma barra de navegação de 65 pixels (ou qualquer outro valor necessário)
        $('html, body').animate({'scrollTop': offsetTop}, 2000); // Anima o scroll até a propriedade
    }
});



        var map;
        function initMap() {
            var latitude = {{ $propertie->lat }}; // Certifique-se que esses dados estão sendo passados corretamente
            var longitude = {{ $propertie->lng }};

            var propLocation = {lat: latitude, lng: longitude};

            map = new google.maps.Map(document.getElementById('map'), {
                center: propLocation,
                zoom: 15 // Ajuste conforme necessário
            });

            var marker = new google.maps.Marker({
                position: propLocation,
                map: map,
                title: 'Localização da Propriedade'
            });
        }

Inputmask("999999999").mask(document.getElementById("phone"));

    // Garantir que a data da visita não seja no passado
document.getElementById("data_vista").setAttribute("min", new Date().toISOString().split("T")[0]);

</script>

  @endsection
