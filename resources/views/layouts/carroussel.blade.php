<div class="slide-one-item home-slider owl-carousel">
    @foreach ($properties_destaque as $property)
        <div class="site-blocks-cover overlay" style="background-image:url('{{ Storage::url($property->technical_details_img) }}');" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <span class="d-inline-block {{ $property->business_id === 1 ? 'bg-danger' : 'bg-info' }} text-white px-3 mb-3 property-offer-type rounded">
                            <div class="offer-type-wrap">
                                {{$property->business_name}}
                              </div>
                        </span>
                        <h1 class="mb-2">{{ $property->title }}</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ number_format($property->price, 2) }}</strong></p>
                        <p><a href="/detail/{{$property->id}}#property_details" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">See Details</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
