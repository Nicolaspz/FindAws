<div class="site-section site-section-sm bg-light" id="properties-container">

    <div class="container">
        @if(session('errors'))
    @foreach(session('errors')->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
    @endif
        <div class="row mb-5">
            @if ($properties->count() > 0)  {{-- Verifica se há propriedades --}}
                @foreach ($properties as $property)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="property-entry h-100">
                        <a href="/detail/{{$property->id}}#property_details" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type {{ $property->business_id === 1 ? 'custom-bg-danger' : 'bg-info' }}">{{ $property->business_id === 1 ? __('messages.Vend1') : __('messages.Rend1') }}</span>
                            </div>
                            <img src="{{ Storage::url($property->technical_details_img) }}" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            @if ($property->destaque=== 1)
                                <a href="/detail/{{$property->id}}#property_details" style="background: #8504a5;" class="property-favorite">
                                    <span style="color: #fff;" class="icon-heart-o"></span>
                                </a>
                            @endif
                            <span class="property-specs">{{$property->type_name}}</span>
                            <h2 class="property-title"><a href="/detail/{{$property->id}}#property_details">{{$property->title}}</h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>{{$property->provincia_name}} - {{$property->municipio_name}}-{{$property->distrito_name}} - {{$property->cidade}}</span>
                            <strong class="property-price text-primary mb-3 d-block custum-info ">{{ number_format($property->price, 2) }}Kz</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">{{__('messages.form10')}}</span>
                                    <span class="property-specs-number">{{$property->typology_name}}</span>
                                </li>
                                
                                <li>
                                    <span class="property-specs">{{__('messages.d9')}}</span>
                                    <span class="property-specs-number">{{$property->area}}m<sup>2</sup></span>
                                </li>
                            </ul>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                
                                <li>
                                    @isset($visitCounts[$property->id])
                                        <span class="property-specs">{{__('messages.d5')}}: {{ $visitCounts[$property->id] }} {{__('messages.visita')}}</span>
                                    @endisset
                                    
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            @else  {{-- Caso não haja propriedades, exibe a mensagem --}}
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        Não há propriedades pesquisada de momento.
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if ($properties->count() > 0)  {{-- Paginação só aparece se houver propriedades --}}
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="site-pagination">
                {{-- Checar se a página anterior existe --}}
                @if ($properties->onFirstPage())
                    <span class="disabled">«</span>
                @else
                    <a href="{{ $properties->previousPageUrl() }}">«</a>
                @endif

                {{-- Páginas numéricas --}}
                @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $num => $link)
                    @if ($num == $properties->currentPage())
                        <a href="#" style="background: #8504a5; color:white" >{{ $num }}</a>
                    @elseif ($num == 1 || $num == $properties->lastPage() || ($num >= $properties->currentPage() - 2 && $num <= $properties->currentPage() + 2))
                        <a href="{{ $link }}">{{ $num }}</a>
                    @elseif ($num == $properties->currentPage() - 3 || $num == $properties->currentPage() + 3)
                        <span>...</span>
                    @endif
                @endforeach

                {{-- Checar se a próxima página existe --}}
                @if ($properties->hasMorePages())
                    <a href="{{ $properties->nextPageUrl() }}">»</a>
                @else
                    <span class="disabled">»</span>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
