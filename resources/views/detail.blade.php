@extends('index')
@section('title', $propertie->title)
@section('description', Str::limit($propertie->description, 150))
@section('keywords', $propertie->tags ?? 'casas, imóveis, Angola')

@section('og_title', $propertie->title)
@section('og_description', Str::limit($propertie->description, 150))
@section('og_image', Storage::url($propertie->technical_details_img))
@section('og_url', url()->current())

@section('twitter_title', $propertie->title)
@section('twitter_description', Str::limit($propertie->description, 150))
@section('twitter_image', Storage::url($propertie->technical_details_img))

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
                        
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->full()) }}&quote={{ urlencode($propertie->title.' - '.number_format($propertie->price, 2).' '.$propertie->moeda) }}" 
                           target="_blank" class="btn btn-sm btn-facebook" 
                           onclick="window.open(this.href, 'facebook-share', 'width=600,height=400'); return false;">
                           <i class="fab fa-facebook-f"></i>
                        </a>
                        
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($propertie->title.' - '.number_format($propertie->price, 2).' '.$propertie->moeda.' '.url()->full()) }}" 
                           target="_blank" class="btn btn-sm btn-twitter" 
                           onclick="window.open(this.href, 'twitter-share', 'width=600,height=300'); return false;">
                           <i class="fab fa-twitter"></i>
                        </a>
                        
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->full()) }}" 
                           target="_blank" class="btn btn-sm btn-linkedin" 
                           onclick="window.open(this.href, 'linkedin-share', 'width=600,height=500'); return false;">
                           <i class="fab fa-linkedin-in"></i>
                        </a>
                        
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($propertie->title.' - '.number_format($propertie->price, 2).' '.$propertie->moeda.' '.url()->full()) }}" 
                           target="_blank" class="btn btn-sm btn-whatsapp" 
                           onclick="window.open(this.href, 'whatsapp-share', 'width=600,height=500'); return false;">
                           <i class="fab fa-whatsapp"></i>
                        </a>
                        
                        <button onclick="copyToClipboard('{{ __('messages.link_copied') }}')" class="btn btn-sm btn-secondary">
                            <i class="fas fa-link"></i> {{ __('messages.copy_link') }}
                        </button>
                    </div>
                    
                    <h2 class="h4 text-black">{{__('messages.d4')}} </h2>
                    <p>{{$propertie->description}}</p>
                    <p>{{$propertie->abstract}}</p>
                    <hr>
                    <span class="property-icon icon-room"></span>{{$propertie->provincia_name}} - {{$propertie->municipio_name}}-{{$propertie->distrito_name}} - {{$propertie->cidade}}
                    <ul class="property-specs-wrap mb-3 mb-lg-0 font-bold" style="color:#8504a5;">
                        @if(isset($visitCounts[$propertie->id]))
                            <span class="property-specs">
                                {{__('messages.d5')}}: {{ $visitCounts[$propertie->id] }} {{__('messages.visita')}}
                            </span>
                        @endif
                    </ul>

                    <div class="row no-gutters mt-5">
                        <div class="col-md-12">
                            <h5>{{__('messages.d6')}}</h5>
                            <video style="width: 100%;" controls src="{{Storage::url($propertie->movie) }}"></video>
                        </div>

                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">{{__('messages.d7')}}</h2>
                        </div>
                        @foreach ($images as $image)
                            @foreach ($image->url as $imgUrl)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ Storage::url($imgUrl) }}" class="image-popup gal-item">
                                        <img src="{{ Storage::url($imgUrl) }}" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        @endforeach

                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ Storage::url($propertie->technical_details_img) }}" class="image-popup gal-item">
                                <img src="{{ Storage::url($propertie->technical_details_img) }}" alt="Image" class="img-fluid">
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
                            <div class="flex-item">
                                <p class="mb-2"><img src="{{asset('images/area.png')}}" class="property-details-icons"/> {{__('messages.d9')}}: {{ $propertie->area ? $propertie->area : 'N/A' }} m<sup>2</sup></p>
                            </div>
                            @if ($propertie->piscina)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/piscina.png')}}" class="property-details-icons"/> {{__('messages.d10')}}</p>
                                </div>
                            @endif
                            @if ($propertie->terraco)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/terraco.png')}}" class="property-details-icons"/> {{__('messages.d11')}}</p>
                                </div>
                            @endif
                            @if ($propertie->jardin)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/jardim.png')}}" class="property-details-icons"/> {{__('messages.d12')}}</p>
                                </div>
                            @endif
                            @if ($propertie->park > 0)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/garagem.png')}}" class="property-details-icons"/>{{$propertie->park }} {{__('messages.d13')}}</p>
                                </div>
                            @endif
                            @if ($propertie->ar_condicionado)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/ar-condicionado.png')}}" class="property-details-icons"/> {{__('messages.d14')}}</p>
                                </div>
                            @endif
                            @if ($propertie->roupeiro_imbutido)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/armario-embutido.png')}}" class="property-details-icons"/> {{__('messages.d15')}}</p>
                                </div>
                            @endif
                            @if ($propertie->elevator)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/elevador.png')}}" class="property-details-icons"/> {{__('messages.d16')}}</p>
                                </div>
                            @endif
                            @if ($propertie->propiedade_acessivel)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/acessibilidade.png')}}" class="property-details-icons"/> {{__('messages.d17')}}</p>
                                </div>
                            @endif
                            @if ($propertie->quarto)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/quartos.png')}}" class="property-details-icons"/>{{ $propertie->quarto }} {{__('messages.d18')}}</p>
                                </div>
                            @endif
                            @if ($propertie->banheiro)
                                <div class="flex-item">
                                    <p class="mb-2"><img src="{{asset('images/wc.png')}}" class="property-details-icons"/>{{ $propertie->banheiro }} {{__('messages.d19')}}</p>
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
    // Função para copiar link com feedback visual
    function copyToClipboard(message) {
        navigator.clipboard.writeText(window.location.href).then(() => {
            showNotification(message, 'success');
        }).catch(err => {
            showNotification('Erro ao copiar link', 'error');
            console.error('Erro ao copiar: ', err);
        });
    }

    // Função para mostrar notificação
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.style.position = 'fixed';
        notification.style.bottom = '20px';
        notification.style.right = '20px';
        notification.style.backgroundColor = type === 'success' ? '#4CAF50' : '#f44336';
        notification.style.color = 'white';
        notification.style.padding = '15px';
        notification.style.borderRadius = '5px';
        notification.style.zIndex = '10000';
        notification.style.transition = 'all 0.3s ease';
        notification.innerText = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }

    
    

    // Máscara para telefone
    Inputmask("999999999").mask(document.getElementById("phone"));

    // Garantir que a data da visita não seja no passado
    document.getElementById("data_vista").setAttribute("min", new Date().toISOString().split("T")[0]);

    // Redirecionamento suave para âncoras
    $(document).ready(function() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = $(this.getAttribute('href'));
            if(target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });
        
        // Verifica hash na URL ao carregar a página
        if(window.location.hash) {
            var target = $(window.location.hash);
            if(target.length) {
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        }
    });
</script>
@endsection