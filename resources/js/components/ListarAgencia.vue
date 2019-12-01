<template>
    <section v-show="usuarios.length > 0" id="agencia" class="ds page_models models_square gorizontal_padding section_padding_70 columns_padding_0">
        <div class="container-fluid">
            <div class="row bottommargin_50 boxed-padding">
                <div class="col-lg-12 text-lg-right">
                    <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">ESCORT VIP EN CONCEPCION</h2>
                </div>
            </div>

            <div class="isotope row masonry-layout bottommargin_20 altura">
                <div v-for="usuario in usuarios" :key="usuario.id" class="isotope-item">
                    <div class="vertical-item content-absolute">
                        <div class="item-media">
                            <a v-bind:href="'modelo/' + usuario.id + '/ver'">
                                <img v-lazy="'storage/' + usuario.perfil_url" v-bind:alt="'Placerconce.cl - ' + usuario.nombre" class="perfil-imagen">
                                <div class="media-links"></div>
                            </a>
                        </div>
                        <div class="item-content text-center before_cover cs">
                            <p class="iconos">
                                <a class="p-link" v-bind:href="usuario.whatsapp" target="_blank"><img src="../../../public/general/images/whatsapp.png" height="30px" width="30px" alt=""></a>
                                <a class="p-link espacio-izquierda" v-bind:href="'tel:+' + usuario.telefono" target="_blank"><img src="../../../public/general/images/telefono.png" height="30px" width="30px" alt=""></a>
                                <a v-show="usuario.video == 1" class="p-link espacio-izquierda" v-bind:href="'modelo/' + usuario.id + '/ver'" target="_blank"><img src="../../../public/general/images/video.png" height="30px" width="30px" alt=""></a>
                            </p>
                            <a class="p-link" title="" v-bind:href="'modelo/' + usuario.id + '/ver'" v-text="usuario.nombre + ' - ' + usuario.edad"></a>      
                            <p v-if="usuario.busto != 0 && usuario.cintura != 0 && usuario.caderas != 0" class="medidas" v-text="'Medidas: ' + usuario.busto + '-' + usuario.cintura + '-' + usuario.caderas"></p>

                            <div class="row">
                                <label class="col-md-6" for="">Atención: {{ usuario.nota_atencion }} <i class="fa fa-star text-warning"></i></label>
                                <label class="col-md-6" for="">Fotos reales: {{ usuario.nota_fotos }} <i class="fa fa-star text-warning"></i></label>
                            </div>

                            <div class="row">
                                <label class="col-md-6" for="">Disponibilidad: {{ usuario.nota_disponibilidad }} <i class="fa fa-star text-warning"></i></label>
                                <label class="col-md-6" for="">Nota final: {{ usuario.nota }} <i class="fa fa-star text-warning"></i></label>
                            </div>
                            <hr>
                            <p class="row medidas text-center no-margin">
                                <label class="col-md-6" for="" v-for="(item, index) in usuario.valoraciones.slice(0, 4)" :key="index"><i class="fa fa-check text-success"></i> {{ item }}</label>
                            </p>
                            <p class="medidas"><b>{{ 'Tiene ' + usuario.calificaciones + ' valoracion(es)' }}</b></p>
                            <p class="medidas" v-text="'Actualizado hace ' + usuario.actualizado + ' horas'"></p>
                        </div>
                    </div>
                </div>                     
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                usuarios: []
            }
        },
        methods:{
            listarUsuarios (){
                let me=this;
                axios.get('/usuarios/agencia').then(function (response) {
                    me.usuarios = response.data.data;
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
            },
        },
        mounted() {
            this.listarUsuarios();
        }
    }
</script>

<style>
    .medidas {
        font-size: 12px;
    }

    .p-link {
        text-transform: uppercase;
        font-size: 15px;
    }

    .espacio-izquierda {
        margin-left: 6px;
    }

    .altura {
        height: auto;
    }

    @media (min-width: 240px) {
        .isotope-item {
            width: 50%;
        }

        .perfil-imagen {
            width:110%;
            height:390px;
            padding-bottom:180px;
            border-radius:1em;
            -o-object-fit: cover;
            object-fit:cover;
            margin-bottom:-180px;
        }

        .item-media {
            position: relative;
            overflow: hidden;
            margin: 2px;
        }
    }

    @media (min-width: 768px) {
        .isotope-item {
            width: 33.33%;
        }

        .perfil-imagen {
            width:100%;
            height:400px;
            padding-bottom:0px;
            border-radius:1em;
            object-fit:cover;
            margin-bottom:-20px;
        }
        .item-media {
            position: relative;
            overflow: hidden;
            margin: 2px;
        }
    }
    @media (min-width: 992px) {
        .isotope-item {
            width: 25%;
        }

        .models_square .vertical-item.content-absolute .item-content {
            margin-top: -30px;
            margin-left: 10px;
            margin-right: 10px;
        }

        .perfil-imagen {
            width: 100%;
            height: 400px;
            padding-bottom: 20px;
            border-radius: 1em;
        }

        .item-media {
            margin: 10px;
        }

    }

</style>