<div class="site-section site-section-sm pb-0">
  <div class="container">
    <form class="form-search col-md-12" style="margin-top: -100px;" method="GET" action="{{ url('/search') }}#properties-container" id="searchForm">
  <div class="row align-items-end">
    <!-- Tipo de Negócio -->
    <div class="col-md-3">
      <label for="business_id" style="font-size: 12px;">Tipo de Negócio</label>
      <select name="business_id" id="business_id" class="form-control form-control-sm">
        <option value="">Selecione</option>
        <option value="2">Venda</option>
        <option value="1">Renda</option>
      </select>
    </div>

    <!-- Tipo de Propriedade -->
    <div class="col-md-3">
      <label for="propriedade_id" style="font-size: 12px;">Tipo De Propriedade</label>
      <select name="propriedade_id" id="propriedade_id" class="form-control form-control-sm">
        <option value="">Selecione tipo de propriedade</option>
        @foreach ($propertie_Type as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Tipologia -->
    <div class="col-md-3">
      <label for="typology_id" style="font-size: 12px;">Tipologia</label>
      <select name="typology_id" id="typology_id" class="form-control form-control-sm">
        <option value="">Selecione Tipologia</option>
        @foreach ($tipologies as $typology)
          <option value="{{ $typology->id }}">{{ $typology->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Preço Mínimo -->
    <div class="col-md-3">
      <label for="price_min" style="font-size: 12px;">Preço Mínimo</label>
      <input 
      type="number" 
      name="price_min"
       id="price_min"
      class="form-control form-control-sm"
      oninput="this.value = this.value.replace(/[^0-9]/g, '');"
      >
    </div>
  </div>

  <div class="row align-items-end mt-3">
    <!-- Preço Máximo -->
    <div class="col-md-3">
      <label for="price_max" style="font-size: 12px;">Preço Máximo</label>
      <input 
      type="number"
      name="price_max"
      id="price_max" 
      class="form-control form-control-sm"
      oninput="this.value = this.value.replace(/[^0-9]/g, '');"
      >
    </div>

    <!-- Província -->
    <div class="col-md-3">
      <label for="province_id" style="font-size: 12px;">Província</label>
      <select name="province_id" id="province_id" class="form-control form-control-sm">
        <option value="">Selecione Província</option>
        @foreach ($provinces as $province)
          <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Município -->
    <div class="col-md-3">
      <label for="municipio_id" style="font-size: 12px;">Município</label>
      <select name="municipio_id" id="municipio_id" class="form-control form-control-sm">
        <option value="">Selecione Município</option>
        <!-- Municípios serão carregados dinamicamente -->
      </select>
    </div>

    <!-- Distrito -->
    <div class="col-md-3">
      <label for="distrito_id" style="font-size: 12px;">Distrito</label>
      <select name="distrito_id" id="distrito_id" class="form-control form-control-sm">
        <option value="">Selecione Distrito</option>
        <!-- Distritos serão carregados dinamicamente -->
      </select>
    </div>
  </div>

  <div class="row align-items-end mt-3">
    <!-- Botão de Buscar -->
    <div class="col-md-3">
      <input type="submit" class="btn bg-info text-white btn-block" value="Buscar">
    </div>
  </div>
</form>

<div class="row">
          <div class="col-md-12 d-none">
            <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
              <div class="mr-auto">
                <a href="/" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                <a href="/listview" class="icon-view view-list"><span class="icon-view_list"></span></a>

              </div>
              <div class="ml-auto d-flex align-items-center">
                <div>
                  <a href="/" class="view-list px-3 border-right active">Todos</a>
                  <a href="/vendajs#properties-container" class="view-list px-3 border-right">Arrendar</a>
                  <a href="/rendajs#properties-container" class="view-list px-3">Comprar</a>
                </div>

                 <!-- Comuna
               <div class="select-wrap">
                  <span class="icon icon-arrow_drop_down"></span>
                  <select class="form-control form-control-sm d-block rounded-0">
                    <option value="">Sort by</option>
                    <option value="">Price Ascending</option>
                    <option value="">Price Descending</option>
                  </select>
                </div>
                -->
              </div>
            </div>
          </div>
</div>

</div>
