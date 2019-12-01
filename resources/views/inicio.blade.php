@extends('layouts.app')

@section('contenido')

    <inicio></inicio>

    <template v-if="ciudad > 0">
        <section class="ds section_padding_70 parallax">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-offset-2 col-xs-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 text-center">
                        <h2 class="big margin_0">¿Qué deseas?</h2>
                        <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">Bienvenidos</h2>
                        
                        <div class="row text-center"><a href="#agencia" class="btn-block theme_button color1 bottommargin_5 center-block"><font size="5">ESCORT EN TU CIUDAD</font></a></div>
                        <div class="row text-center"><a href="{{ url('/usuarios-online') }}"  class="btn-block theme_button color1 bottommargin_5 center-block">USUARIOS ONLINE</a></div>
                        <div class="row text-center"><a href="{{ url('/private') }}"  class="btn-block theme_button color1 bottommargin_5 center-block">CHAT</a></div>
                        <div class="row text-center"><a href="{{ url('/valoradas') }}" class="btn-block theme_button color1 bottommargin_5 center-block">MEJOR VALORADAS</a></div>
                        <div class="row text-center"><a href="{{ url('/ventas') }}" class="btn-block theme_button color1 bottommargin_5 center-block">VENTA DE FOTOS Y VÍDEOS</a></div>
                        <div class="row text-center"><a href="{{ url('/videos')}}" class="btn-block theme_button color1 bottommargin_5 center-block">VÍDEOS</a></div>
                        <div class="row text-center"><a href="#"  class="btn-block theme_button color1 bottommargin_5 center-block">DATOS PARA ESCORT</a></div>
                        
                        {{-- <div class="row text-center"><a href="#agencia" class="btn-block theme_button color1 bottommargin_5 center-block"><font size="5">ESCORT EN TU CIUDAD</font></a></div>
                        <div class="row text-center"><a href="#avisos"  class="btn-block theme_button color1 bottommargin_5 center-block">AVISOS ERÓTICOS</a></div>
                        <div class="row text-center"><a href="{{ url('/valoradas') }}" class="btn-block theme_button color1 bottommargin_5 center-block">MEJOR VALORADAS</a></div>
                        <div class="row text-center"><a href="{{ url('/ventas') }}" class="btn-block theme_button color1 bottommargin_5 center-block">VENTA DE FOTOS Y VÍDEOS</a></div>
                        <div class="row text-center"><a href="{{ url('/anuncios') }}" class="btn-block theme_button color1 bottommargin_5 center-block">CONOCE GENTE</a></div>
                        <div class="row text-center"><a href="{{ url('/videos')}}" class="btn-block theme_button color1 bottommargin_5 center-block">PERFILES CON VÍDEO</a></div> --}}
                        
                    </div>
                </div>
            </div>
        </section>

        @guest
            <registro-usuario></registro-usuario>
        @endguest
        
        <usuarios-video-estado :ciudad="ciudad"></usuarios-video-estado>
        
        <usuarios-vip :ciudad="ciudad"></usuarios-vip>

        <usuarios-mejor-valorados :ciudad="ciudad"></usuarios-mejor-valorados>

        <descanso-uno></descanso-uno> 

        <usuarios-normal :ciudad="ciudad"></usuarios-normal>

        <descanso-dos></descanso-dos> 

        @guest
            <registro-persona></registro-persona>
        @endguest

        <avisos-usuario-inicio :ciudad="ciudad"></avisos-usuario-inicio>

        <publicaciones-pagina></publicaciones-pagina>  

        <seccion-nosotros></seccion-nosotros>

    </template>

@endsection