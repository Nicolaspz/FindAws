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
             
                <div>
                  <img src="{{ Storage::url($propertie->technical_details_img) }}" alt="Image" class="d-block">

                  <div class="carousel-caption d-none d-md-block"  style="top: 37%;">
                  <div class="dentro">
                        <span class="d-inline-block {{ $propertie->business_id === 1 ? 'custom-bg-danger' : 'bg-info' }} text-white px-3 mb-3 property-offer-type rounded">
                              <div class="offer-type-wrap">
                                  @switch($propertie->business_id)
                                          @case(1)
                                              {{ __('messages.Vend1') }}
                                              @break

                                          @case(2)
                                              {{ __('messages.Rend1') }}
                                              @break

                                          @case(3)
                                              {{ __('messages.Vend1') }} e {{ __('messages.Rend1') }}
                                              @break

                                          @case(4)
                                            {{ __('messages.fot6') }} 
                                              @break
                                      @endswitch
                              </div>
                        </span>
                          
                  </div>
                  </div>

                </div>
              {{--
                @foreach ($images as $image)
              <div>
             
                <div><img src="{{ Storage::url($image->url) }}" alt="Image" class="img-fluid"></div>
              </div>
              @endforeach
              --}} 
            </div>
          </div>
          <div class="bg-white property-body border-bottom border-left border-right">
            <div class="row mb-5">
              @if($propertie->condition_name !== 'N/AP')
                <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                    <span class="d-inline-block text-black mb-0 caption-text">{{ __('messages.d1') }}</span>
                    <strong class="d-block">{{ $propertie->condition_name }}</strong>
                </div>
              @endif

              @if(!is_null($propertie->ano_construcao))
                  <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                      <span class="d-inline-block text-black mb-0 caption-text">{{ __('messages.d2') }}</span>
                      <strong class="d-block">{{ $propertie->ano_construcao }}</strong>
                  </div>
              @endif
              <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                <span class="d-inline-block text-black mb-0 caption-text">{{__('messages.d3')}} </span>
                <strong class="d-block">{{ number_format($propertie->price, 2) }} {{$propertie->moeda }} 
                  @if($propertie->negociavel === 1)
                           <span class="mb-2" style="color:#8504a5;background: #fff ; border-radius: 4px; padding: 5px" > {{__('messages.fot7')}} </span>
                        
                  @endif
                </strong>
              </div>

            </div>
            
            <h2 class="h4 text-black">{{__('messages.d4')}} </h2>
            <p>{{$propertie->description}}</p>
            <p>{{$propertie->abstract}}</p>
            <hr>
            <span class="property-icon icon-room"></span>{{$propertie->provincia_name}} - {{$propertie->municipio_name}}-{{$propertie->distrito_name}} - {{$propertie->cidade}}
            <ul class="property-specs-wrap mb-3 mb-lg-0 font-bold" style="color:#8504a5;">
                                
                 @if(isset($visitCounts[$propertie->id]))
                    <span class="property-specs">
                        {{__('messages.d5')}}: {{ $visitCounts[$propertie->id] }}  {{__('messages.visita')}}
                    </span>
                @endif

                                
             </ul>

            <div class="row no-gutters mt-5">

                <div class="col-md-12">
                  <h5> {{__('messages.d6')}}</h5>
                  <video style="width: 100%;" controls src="{{Storage::url($propertie->movie) }}"></video>
                </div>

              <div class="col-12">
                <h2 class="h4 text-black mb-3"> {{__('messages.d7')}}</h2>
              </div>
              @foreach ($images as $image)
                @foreach ($image->url as $imgUrl)  {{-- Percorre cada URL dentro do array --}}
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ Storage::url($imgUrl) }}" class="image-popup gal-item">
                            <img src="{{ Storage::url($imgUrl) }}" alt="Image" class="img-fluid">
                        </a>
                    </div>
                @endforeach
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
            <h3 class="h4 text-black widget-title mb-3"> {{__('messages.d8')}}</h3>
            <div class="col text-muted">
              <div class="flex-container">
                  <div class="flex-item">
                      <p class="mb-2"><img src="{{asset('images/area.png')}}" class="property-details-icons"/>  {{__('messages.d9')}}: {{ $propertie->area ? $propertie->area : 'N/A' }} m<sup>2</sup></p>
                  </div>
                  <div class="flex-item">
                      @if ($propertie->piscina)
                      <p class="mb-2"><img  src="{{asset('images/piscina.png')}}" class="property-details-icons"/>  {{__('messages.d10')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->terraco)
                      <p class="mb-2"><img src="{{asset('images/terraco.png')}}" class="property-details-icons"/> {{__('messages.d11')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->jardin)
                      <p class="mb-2"><img src="{{asset('images/jardim.png')}}" class="property-details-icons"/> {{__('messages.d12')}}</p>
                      @endif
                  </div>
                  {{--<div class="flex-item">
                      @if ($propertie->storage_room)
                      <p class="mb-2"><img src="{{asset('images/arrecadacao.png')}}" class="property-details-icons"/> Arrecadação</p>
                      @endif
                  </div>--}}
                  <div class="flex-item">
                      @if ($propertie->park > 0)
                      <p class="mb-2"><img src="{{asset('images/garagem.png')}}" class="property-details-icons"/>{{$propertie->park }} {{__('messages.d13')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->ar_condicionado)
                      <p class="mb-2"><img src="{{asset('images/ar-condicionado.png')}}" class="property-details-icons"/> {{__('messages.d14')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->roupeiro_imbutido)
                      <p class="mb-2"><img src="{{asset('images/armario-embutido.png')}}" class="property-details-icons"/> {{__('messages.d15')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->elevator)
                      <p class="mb-2"><img src="{{asset('images/elevador.png')}}" class="property-details-icons"/> {{__('messages.d16')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->propiedade_acessivel)
                      <p class="mb-2"><img src="{{asset('images/acessibilidade.png')}}" class="property-details-icons"/> {{__('messages.d17')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->quarto)
                      <p class="mb-2"><img src="{{asset('images/quartos.png')}}" class="property-details-icons"/>{{ $propertie->quarto }} {{__('messages.d18')}}</p>
                      @endif
                  </div>
                  <div class="flex-item">
                      @if ($propertie->banheiro)
                      <p class="mb-2"><img  src="{{asset('images/wc.png')}}" class="property-details-icons"/>{{ $propertie->banheiro }} {{__('messages.d19')}}</p>
                      @endif
                  </div>
              </div>
          </div>

          </div>


          <div class="bg-white widget border rounded">
            <h3 class="h4 text-black widget-title mb-3">{{__('messages.df1')}}</h3>

            <form id="ajaxForm" method="POST" action="{{ route('submitVisit') }}">
                @csrf
                <input type="hidden" id="properties_id" name="properties_id" value="{{ $propertie->id }}">

                <label for="name">{{__('messages.df2')}}:</label>
                <input type="text" id="name" name="name" class="form-control" required>

                <label for="phone">{{__('messages.df3')}}:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>

                <label for="info">{{__('messages.df4')}}:</label>
                <textarea id="info" name="info" class="form-control" required></textarea>

                <label for="data_vista">{{__('messages.df5')}}:</label>
                <input type="date" id="data_vista" name="data_vista" class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary">{{__('messages.df6')}}</button>
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
