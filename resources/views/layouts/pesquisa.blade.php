<div class="site-section site-section-sm pb-0">
    <div class="container">
        <form class="form-search col-md-12" style="margin-top: -100px;" method="GET" action="{{ url('/search') }}#properties-container" id="searchForm">
            <div class="row align-items-end">
              <div class="col-md-2">
                <label for="business_id">Tipo de Negócio</label>
                <div class="select-wrap">
                  <select name="business_id" id="business_id" class="form-control">
                    <option value="">Selecione</option>
                    <!-- Supondo que 'businesses' sejam como 'Venda', 'Renda', etc. -->
                    <option value="1">Venda</option>
                    <option value="2">Renda</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <label for="typology_id">Tipologia</label>
                <div class="select-wrap">
                    <select name="typology_id" id="typology_id" class="form-control">
                        <option value="">Selecione Tipologia</option>
                        @foreach ($tipologies as $typology)
                            <option value="{{ $typology->id }}">{{ $typology->name }}</option>
                        @endforeach
                    </select>
                </div>
              </div>

              <div class="col-md-2">
                <label for="cidade" class="small-text">Local</label>
                <input type="text" name="cidade" id="cidade" class="form-control">
              </div>

              <div class="col-md-2">
                <label for="price_min">Preço Mínimo</label>
                <input type="number" name="price_min" id="price_min" class="form-control">
              </div>

              <div class="col-md-2">
                <label for="price_max">Preço Máximo</label>
                <input type="number" name="price_max" id="price_max" class="form-control">
              </div>

              <div class="col-md-2">
                <input type="submit" class="btn bg-info text-white btn-block" value="Buscar">
              </div>
            </div>
          </form>



      <div class="row">
        <div class="col-md-12">
          <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
            {{--
                <div class="mr-auto">
              <a href="index.html" class="icon-view view-module active"><span class="icon-view_module"></span></a>
              <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>

            </div>
                --}}
            <div class="ml-auto d-flex align-items-center">
              <div>
                <a href="/#properties-container" class="view-list px-3 border-right active" id="">Todos</>
                <a href="/vendajs#properties-container"  class="view-list px-3 border-right" id="">Comprar</a>
                <a href="/rendajs#properties-container" class="view-list px-3" id="">Arrendar</a>
              </div>


             {{--
                 <div class="select-wrap">
                <span class="icon icon-arrow_drop_down"></span>
                <select class="form-control form-control-sm d-block rounded-0">
                  <option value="">Sort by</option>
                  <option value="">Price Ascending</option>
                  <option value="">Price Descending</option>
                </select>
              </div>
                --}}

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
