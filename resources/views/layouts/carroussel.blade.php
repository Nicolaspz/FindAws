<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <!-- Foreach loop para exibir as propriedades -->
    @foreach ($properties_destaque as $index => $property)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
          <img class="d-block w-100" src="{{ Storage::url($property->technical_details_img) }}" alt="{{ $property->title }}">
          <div class="carousel-caption d-none d-md-block"  style="top: 37%;">
                <div class="dentro">
                      <span class="d-inline-block {{ $property->business_id === 1 ? 'custom-bg-danger' : 'bg-info' }} text-white px-3 mb-3 property-offer-type rounded">
                            <div class="offer-type-wrap">
                                 @switch($property->business_id)
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
                        <h1 class="mb-2 pz14">{{ $property->title }}</h1>
                        <p class="mb-2" ><strong class="h2  font-weight-bold">{{ number_format($property->price, 2) }} {{$property->moeda}}</strong></p>
                        @if($property->negociavel === 1)
                           <span class="mb-2" style="color:#8504a5;background: #fff ; border-radius: 4px; padding: 5px" > {{__('messages.fot7')}} </span>
                        
                        @endif
                       
                        <p class="mt-4"><a href="/detail/{{$property->id}}#property_details" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">{{__('messages.detalhe')}}</a></p>
                 </div>
            </div>
        </div>
      @endforeach

      <!-- Exemplo de imagem de publicidade -->
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('images/publicit.jpg') }}" alt="Publicidade">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>

    </div>

    <!-- Controles de navegação -->
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
