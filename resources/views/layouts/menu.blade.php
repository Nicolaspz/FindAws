<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->

  <div class="site-navbar mt-4">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4">
           <a href="/" class="d-block">
          <img src="{{ asset('images/Logo-01.svg') }}" alt="Meu Kubiku" class="img-fluid" style="max-height: 65px;">
        </a>
          </div>
          <div class="col-4 col-md-4 col-lg-8">
            <nav class="site-navigation text-right text-md-right" role="navigation">

              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block ">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                  <a href="/">Início</a>
                </li>
                <li class="{{ request()->is('vendajs*') ? 'active' : '' }}">
                  <a href="/vendajs#properties-container" class="ajax-l" id="rent-b">Comprar</a>
                </li>
                <li class="{{ request()->is('rendajs*') ? 'active' : '' }}">
                  <a href="/rendajs#properties-container" class="ajax-l" id="sell-b" >Arrendar</a>
                </li>
                

                <li class="{{ request()->is('sobre') ? 'active' : '' }}"><a href="/sobre">Sobre Nôs</a></li>
                <li class="{{ request()->is('contacto') ? 'active' : '' }}"><a href="contacto">Contacto</a></li>
                <li class="{{ request()->is('contacto') ? 'active' : '' }}" ><a href="/colaborador/login">Login</a></li>
              </ul>
            </nav>
          </div>


        </div>
      </div>
    </div>
  </div>
