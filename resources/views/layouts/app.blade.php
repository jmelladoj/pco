<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" defer>
    @if(request()->is('login')) <link href="{{ asset('css/css-login.css') }}" rel="stylesheet" defer> @endif
    <link href="{{ asset('css/pagina.css') }}" rel="stylesheet" id="color-switcher-link" defer>
    <link href="{{ url('css/fonts.css') }}" rel="stylesheet" defer>

    <link rel="shortcut icon" href="{{ asset('general/images/logo.png') }}">
</head>
<body>
    <div id="app">
	    <div id="canvas">
            <div id="box_wrapper">
                
                @if(request()->is('/'))
                    <section class="page_topline ds ms gorizontal_padding table_section">
                        <div class="container-fluid with_border">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2 text-center">
                                    <a href="{{ url('/') }}" class="logo logo_image">
                                        <img src="{{ asset('general/images/logo.png') }}" class="img-fluid" alt="" width="100px">
                                    </a>
                                </div>

                                <div class="col-sm-4 col-md-6 col-lg-8 text-center">
                                    <div class="page_social_icons">
                                        <a class="social-icon color-icon soc-youtube" href="#" title="Youtube"></a>
                                        <a class="social-icon color-icon soc-instagram" href="#" title="Instagram"></a>
                                    </div>
                                </div>
                                
                                @auth
                                    <a class="topline-button" id="login" href="{{ url('/home')}}" role="button" >
                                        <i class="fa fa-user"></i> {{ Auth::user()->nombre }}
                                    </a>
                                @else
                                    <div class="col-sm-4 col-md-3 col-lg-2 text-xs-center text-right text-lg-left">
                                        <ul class="inline-dropdown inline-block">
                                            <login></login>
                                        </ul>
                                    <div>
                                @endauth


                            </div>
                        </div>
                    </section>
                @endif

                @yield('contenido')

                <a href="#" id="toTop" style="display: inline;"><span id="toTopHover" style="opacity: 0;"></span></a>

            </div>
            <!-- eof #box_wrapper -->

            <section class="ls page_copyright section_padding_20">
				<div class="container">
					<div class="row topmargin_5 bottommargin_5">
						<div class="col-sm-12 text-center">
							<p class="darklinks">&copy; PlacerConce 2019. Todos los derechos reservados.
							</p>
						</div>
					</div>
				</div>
			</section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/pagina.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
</body>
</html>
