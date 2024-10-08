<div class="site-section site-section-sm pb-0">
  <div class="container">
    <form class="form-search col-md-12" style="margin-top: -100px;" method="GET" action="{{ url('/search') }}#properties-container" id="searchForm">
      <div class="row align-items-end">

        <!-- Tipo de Negócio -->
        <div class="col-md-3">
          <label for="business_id" style="font-size: 12px;">Tipo de Negócio</label>
          <div class="select-wrap">
            <select name="business_id" id="business_id" class="form-control form-control-sm">
              <option value="">Selecione</option>
              <option value="1">Venda</option>
              <option value="2">Renda</option>
            </select>
          </div>
        </div>

        <!-- Tipologia -->
        <div class="col-md-3">
          <label for="typology_id" style="font-size: 12px;">Tipologia</label>
          <div class="select-wrap">
            <select name="typology_id" id="typology_id" class="form-control form-control-sm">
              <option value="">Selecione Tipologia</option>
              @foreach ($tipologies as $typology)
                <option value="{{ $typology->id }}">{{ $typology->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Local
        <div class="col-md-3">
          <label for="cidade" style="font-size: 12px;">Local</label>
          <input type="text" name="cidade" id="cidade" class="form-control form-control-sm">
        </div>
         -->

        <!-- Preço Mínimo -->
        <div class="col-md-3">
          <label for="price_min" style="font-size: 12px;">Preço Mínimo</label>
          <input type="number" name="price_min" id="price_min" class="form-control form-control-sm">
        </div>

        <div class="col-md-3">
          <label for="price_max" style="font-size: 12px;">Preço Máximo</label>
          <input type="number" name="price_max" id="price_max" class="form-control form-control-sm">
        </div>

      </div>

      <div class="row align-items-end mt-3">

        <!-- Preço Máximo -->


        <!-- Província -->
        <div class="col-md-3">
          <label for="province_id" style="font-size: 12px;">Província</label>
          <div class="select-wrap">
            <select name="province_id" id="province_id" class="form-control form-control-sm">
              <option value="">Selecione Província</option>
              <option value="1">Luanda</option>
              <option value="2">Benguela</option>
              <!-- Outras opções -->
            </select>
          </div>
        </div>

        <!-- Município -->
        <div class="col-md-3">
          <label for="municipio_id" style="font-size: 12px;">Município</label>
          <input type="text" name="municipio_id" id="municipio_id" class="form-control form-control-sm">
        </div>

        <!-- Comuna -->
        <div class="col-md-3 mb-2">
          <label for="comuna_id" style="font-size: 12px;">Distrito</label>
          <input type="text" name="comuna_id" id="comuna_id" class="form-control form-control-sm">
        </div>

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
