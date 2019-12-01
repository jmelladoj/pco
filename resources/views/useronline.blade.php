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

            </div>
        </div>
    </header>

    <section id="user-online" class="ds page_models models_square gorizontal_padding section_padding_70 columns_padding_0">
            <div class="container-fluid">
                <div class="row bottommargin_50 boxed-padding">
                    <div class="col-lg-12 text-lg-right">
                        <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight" style="text-align:center">Usuarios online</h2>
                    </div>
                </div>
                
                 <div class="isotope row masonry-layout bottommargin_20 altura">
                   @foreach ($users as $user)
                          @if ($user->tipo_usuario==2 )
                          @if ($user->perfil_url!=NULL)
                       
                        <div class="vertical-item content-absolute" >
                            <div class="item-media">
                                <a href="{{ url('modelo/'.$user->id.'/ver') }}">
                                 <img src="{{ asset('storage/' . $user->perfil_url) }}" alt="Placerconce.cl - {{ $user->nombre }}" class="perfil-imagen">
                                    <div class="media-links"></div>
                                </a>
                            </div>
                       
                          
                                   <div style="float:right;list-style:none;margin-top:-40px;position:inherit;margin-right:20px;">
                               @if ($user->isOnline())
                                             <li class="text-success" >
                                                 <div style="background:#38c172;border-radius:5em;width:20px;height:20px;"><p style="color:transparent">Onli</p></div>
                                             </li>
                                         @else
                                             <li class="text-muted">
                                                <div style="background:#eee;border-radius:5em;width:20px;height:20px;"><p style="color:transparent">Offl</p></div>
                                            </li>
                                         @endif
                            </div>
                            <div ><h4 style="text-align:center">{{$user->nombre}}</h4></div>
                           
                          
                        </div>
                     
                         @endif
                         @endif
                           @endforeach              
                       </div>
                    
                
                
        </div>
    </section>

@endsection