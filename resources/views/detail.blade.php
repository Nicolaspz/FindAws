@extends('index')

@section('og_meta')
    <!-- Meta Tags para Redes Sociais -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $propertie->title }} - Meu Kubiku">
    <meta property="og:description" content="{{ Str::limit($propertie->description, 160) }}">
    <meta property="og:image" content="{{ Storage::url($propertie->technical_details_img) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{{ $propertie->title }}">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $propertie->title }}">
    <meta name="twitter:description" content="{{ Str::limit($propertie->description, 160) }}">
    <meta name="twitter:image" content="{{ Storage::url($propertie->technical_details_img) }}">
    
    <!-- WhatsApp Specific -->
    <meta property="og:image:secure_url" content="{{ Storage::url($propertie->technical_details_img) }}">
@endsection

@section('title', $propertie->title)
@section('description', Str::limit($propertie->description, 160))
@section('keywords', $propertie->tags ?? 'casas, imóveis, Angola')

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
                            <img src="{{ Storage::url($propertie->technical_details_img) }}" alt="{{ $propertie->title }}" class="d-block">
                            <div class="carousel-caption d-none d-md-block" style="top: 37%;">
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
                            <strong class="d-block">{{ number_format($propertie->price, 2) }} {{$propertie->moeda}} 
                                @if($propertie->negociavel === 1)
                                    <span class="mb-2" style="color:#8504a5;background: #fff ; border-radius: 4px; padding: 5px">{{__('messages.fot7')}} </span>
                                @endif
                            </strong>
                        </div>
                    </div>
                    
                    <!-- Seção de Compartilhamento Melhorada -->
                    <div class="share-buttons mt-3 mb-3">
                        <span class="share-text">{{ __('messages.share') }}:</span>
                        
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}&quote={{ urlencode($propertie->title . ' - ' . number_format($propertie->price, 2) . ' ' . $propertie->moeda) }}" 
                           target="_blank" class="btn btn-sm btn-facebook" 
                           onclick="window.open(this.href, 'facebook-share', 'width=600,height=400'); return false;">
                           <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        
                        <!-- WhatsApp - Versão Melhorada -->
                        <a href="https://wa.me/?text={{ urlencode($propertie->title . ' - ' . number_format($propertie->price, 2) . ' ' . $propertie->moeda . '%0A%0A' . Str::limit($propertie->description, 100) . '%0A%0A' . url()->current()) }}" 
                           target="_blank" class="btn btn-sm btn-whatsapp"
                           onclick="window.open(this.href, 'whatsapp-share', 'width=600,height=500'); return false;">
                           <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        
                        <!-- Copiar Link - Versão Funcional -->
                        <button onclick="copyPropertyLink()" class="btn btn-sm btn-secondary">
                            <i class="fas fa-link"></i> {{ __('messages.copy_link') }}
                        </button>
                    </div>
                    
                    <h2 class="h4 text-black">{{__('messages.d4')}} </h2>
                    <p>{{ $propertie->description }}</p>
                    <p>{{ $propertie->abstract }}</p>
                    <hr>
                    <span class="property-icon icon-room"></span>{{ $propertie->provincia_name }} - {{ $propertie->municipio_name }} - {{ $propertie->distrito_name }} - {{ $propertie->cidade }}
                    <ul class="property-specs-wrap mb-3 mb-lg-0 font-bold" style="color:#8504a5;">
                        @if(isset($visitCounts[$propertie->id]))
                            <span class="property-specs">
                                {{__('messages.d5')}}: {{ $visitCounts[$propertie->id] }} {{__('messages.visita')}}
                            </span>
                        @endif
                    </ul>

                    <div class="row no-gutters mt-5">
                        @if($propertie->movie)
                        <div class="col-md-12">
                            <h5>{{__('messages.d6')}}</h5>
                            <video style="width: 100%;" controls>
                                <source src="{{ Storage::url($propertie->movie) }}" type="video/mp4">
                                Seu navegador não suporta vídeos HTML5.
                            </video>
                        </div>
                        @endif

                        @if($images->count() > 0)
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">{{__('messages.d7')}}</h2>
                        </div>
                        @foreach ($images as $image)
                            @foreach ($image->url as $imgUrl)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ Storage::url($imgUrl) }}" class="image-popup gal-item">
                                        <img src="{{ Storage::url($imgUrl) }}" alt="Imagem da propriedade" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach
                        @endif

                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ Storage::url($propertie->technical_details_img) }}" class="image-popup gal-item">
                                <img src="{{ Storage::url($propertie->technical_details_img) }}" alt="Imagem principal da propriedade" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">{{__('messages.d8')}}</h3>
                    <div class="col text-muted">
                        <div class="flex-container">
                            @if($propertie->area)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/area.png') }}" class="property-details-icons"/> {{__('messages.d9')}}: {{ $propertie->area }} m<sup>2</sup></p>
                            </div>
                            @endif
                            
                            @if ($propertie->piscina)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/piscina.png') }}" class="property-details-icons"/> {{__('messages.d10')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->terraco)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/terraco.png') }}" class="property-details-icons"/> {{__('messages.d11')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->jardin)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/jardim.png') }}" class="property-details-icons"/> {{__('messages.d12')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->park > 0)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/garagem.png') }}" class="property-details-icons"/> {{ $propertie->park }} {{__('messages.d13')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->ar_condicionado)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/ar-condicionado.png') }}" class="property-details-icons"/> {{__('messages.d14')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->roupeiro_imbutido)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/armario-embutido.png') }}" class="property-details-icons"/> {{__('messages.d15')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->elevator)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/elevador.png') }}" class="property-details-icons"/> {{__('messages.d16')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->propiedade_acessivel)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/acessibilidade.png') }}" class="property-details-icons"/> {{__('messages.d17')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->quarto)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/quartos.png') }}" class="property-details-icons"/> {{ $propertie->quarto }} {{__('messages.d18')}}</p>
                            </div>
                            @endif
                            
                            @if ($propertie->banheiro)
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{ asset('images/wc.png') }}" class="property-details-icons"/> {{ $propertie->banheiro }} {{__('messages.d19')}}</p>
                            </div>
                            @endif
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
    // Função para copiar link da propriedade
    function copyPropertyLink() {
        const link = window.location.href;
        navigator.clipboard.writeText(link).then(() => {
            showAlert('{{ __("messages.link_copied") }}', 'success');
        }).catch(err => {
            showAlert('{{ __("messages.copy_error") }}', 'danger');
            console.error('Erro ao copiar:', err);
        });
    }

    // Função para mostrar alerta
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} fixed-alert`;
        alertDiv.style.position = 'fixed';
        alertDiv.style.bottom = '20px';
        alertDiv.style.right = '20px';
        alertDiv.style.zIndex = '10000';
        alertDiv.style.padding = '15px';
        alertDiv.style.borderRadius = '5px';
        alertDiv.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
        alertDiv.style.animation = 'fadeIn 0.3s';
        alertDiv.textContent = message;
        
        document.body.appendChild(alertDiv);
        
        setTimeout(() => {
            alertDiv.style.animation = 'fadeOut 0.3s';
            setTimeout(() => {
                document.body.removeChild(alertDiv);
            }, 300);
        }, 3000);
    }

    // Inicialização do Mapa
    function initMap() {
        const latitude = {{ $propertie->lat ?? -8.839987 }};
        const longitude = {{ $propertie->lng ?? 13.289437 }};
        const propertyLocation = { lat: latitude, lng: longitude };
        
        const map = new google.maps.Map(document.getElementById('map'), {
            center: propertyLocation,
            zoom: 15,
            mapTypeControl: false,
            streetViewControl: false
        });
        
        new google.maps.Marker({
            position: propertyLocation,
            map: map,
            title: '{{ $propertie->title }}'
        });
    }

    // Máscara para telefone
    document.addEventListener('DOMContentLoaded', function() {
        Inputmask("999999999").mask(document.getElementById("phone"));
        
        // Garantir que a data da visita não seja no passado
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("data_vista").setAttribute("min", today);
    });

    // Redirecionamento suave para âncoras
    $(document).ready(function() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            const target = $(this.getAttribute('href'));
            if(target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
        
        // Verificar hash na URL ao carregar a página
        if(window.location.hash) {
            const target = $(window.location.hash);
            if(target.length) {
                setTimeout(() => {
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                }, 300);
            }
        }
    });
</script>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeOut {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(20px); }
    }
    .fixed-alert {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .share-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        align-items: center;
        margin: 15px 0;
    }
    .share-buttons .btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-facebook { background-color: #3b5998; color: white; }
    .btn-whatsapp { background-color: #25D366; color: white; }
    .btn-secondary { background-color: #6c757d; color: white; }
</style>
@endsection