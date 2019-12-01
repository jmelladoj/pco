@extends('layouts.app')

@section('contenido')

    <header class="page_header header_darkgrey columns_padding_0 table_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 text-center">
                    <a href="{{ url('/') }}" class="logo logo_image">
                        <img src="{{ asset('general/images/logo.png') }}" alt="" style="max-height: 60px;">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <nav class="mainmenu_wrapper">
                        <ul class="center-block mainmenu nav sf-menu">
                            <li class="active">
                                <a href="{{ url('/') }}">Inicio</a>
                            </li>
    
                            <li>
                                <a href="{{ url('/#nosotros') }}">Nosotros</a>
                            </li>
                            
                            <li>
                                <a href="{{ url('/#agencia') }}">Escort VIP</a>
                            </li>

                            <li>
                                <a href="{{ url('/#independiente') }}">Escort</a>
                            </li>

                            <li>
                                <a href="{{ url('/#publicate') }}">Publicate</a>
                            </li>

                        </ul>
                    </nav>
                    <span class="toggle_menu">
                        <span></span>
                    </span>
                </div>
                <div class="col-md-3 col-sm-6 header-contacts text-center hidden-xs">
                    <div class="fontsize_20 grey topmargin_-5">Concepción</div>
                </div>
            </div>
        </div>
    </header>

    <section class="page_breadcrumbs changeable ls gradient gorizontal_padding section_padding_20 columns_padding_5 table_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 text-center text-sm-left darklinks">
                </div>
                <div class="col-sm-6 text-center">
                    <ol class="center-block breadcrumb">
                        <li>
                            <a href="{{ url('/') }}">
                                Inicio
                            </a>
                        </li>
                        <li class="active">
                            <span>Venta de fotos y vídeos</span>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-3 text-center text-sm-right">
                    <ul class="inline-dropdown inline-block">
                        <li class="dropdown login-dropdown">
                            @guest
                                <login></login>                              
                            @else
                                <a class="topline-button" id="login" href="{{ url('/home')}}" role="button" >
                                    <i class="rt-icon2-user"></i> {{ Auth::user()->nombre }}
                                </a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <usuarios-venta></usuarios-venta>

    <registro-usuario></registro-usuario>
@endsection