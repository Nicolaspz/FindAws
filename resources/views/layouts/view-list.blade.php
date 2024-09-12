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
                    <div class="col-md-12">
                        <div class="property-entry horizontal d-lg-flex m-2">

                            <a href="/detail/{{$property->id}}#property_details" class="property-thumbnail h-100">
                                <div class="offer-type-wrap">
                                    <span class="offer-type {{ $property->business_id === 1 ? 'bg-danger' : 'bg-success' }}">
                                        {{ $property->business_name }}
                                    </span>
                                </div>
                                <img src="{{ Storage::url($property->technical_details_img) }}" alt="Image" class="img-fluid">
                            </a>

                            <div class="p-4 property-body">
                                @if ($property->destaque === 1)
                                    <a href="/detail/{{$property->id}}#property_details" class="property-favorite">
                                        <span class="icon-heart-o" style="color: red;"></span>
                                    </a>
                                @endif
                                <h2 class="property-title">
                                    <a href="/detail/{{$property->id}}#property_details">{{$property->title}}</a>
                                </h2>
                                <span class="property-location d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{$property->cidade}}, {{$property->municipio_name}} - {{$property->distrito_name}}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">
                                    {{ number_format($property->price, 2) }} Kz
                                </strong>
                                <p>{{ $property->description }}</p>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Quarto</span>
                                        <span class="property-specs-number">{{ $property->quarto }} <sup>+</sup></span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Banheiro</span>
                                        <span class="property-specs-number">{{ $property->banheiro }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Área</span>
                                        <span class="property-specs-number">{{ $property->area }} m²</span>
                                    </li>
                                </ul>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        @isset($visitCounts[$property->id])
                                            <span class="property-specs">Esta propriedade teve: {{ $visitCounts[$property->id] }} Visitas</span>
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
                        Não há propriedades pesquisadas no momento.
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if ($properties->count() > 0)  {{-- Paginação só aparece se houver propriedades --}}
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="site-pagination">
                @if ($properties->onFirstPage())
                    <span class="disabled">«</span>
                @else
                    <a href="{{ $properties->previousPageUrl() }}">«</a>
                @endif

                @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $num => $link)
                    @if ($num == $properties->currentPage())
                        <a href="#" style="background: #8504a5; color:white">{{ $num }}</a>
                    @elseif ($num == 1 || $num == $properties->lastPage() || ($num >= $properties->currentPage() - 2 && $num <= $properties->currentPage() + 2))
                        <a href="{{ $link }}">{{ $num }}</a>
                    @elseif ($num == $properties->currentPage() - 3 || $num == $properties->currentPage() + 3)
                        <span>...</span>
                    @endif
                @endforeach

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
