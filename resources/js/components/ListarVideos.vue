<template>
    <section v-show="usuarios.length > 0" id="agencia" class="ds page_models models_square gorizontal_padding section_padding_70 columns_padding_0">
        <div class="container-fluid">
            <div class="row bottommargin_50 boxed-padding">
                <div class="col-lg-12 text-lg-right">
                    <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">VÍDEOS</h2>
                </div>
            </div>

            <div class="isotope row masonry-layout bottommargin_20 altura">
                <div class="col-md-4" v-for="(video, index) in videos" :key="index">
                    <div class="columns_padding_5">
                        <div class="embed-responsive embed-responsive-16by9">
                            <video controls="controls" class="embed-responsive-item">
                                <source v-bind:src="'storage' + video" type="video/mp4">
                            </video>
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
                usuarios: [],
                videos: []
            }
        },
        methods:{
            listarUsuarios (){
                let me=this;
                axios.get('/usuarios/videos').then(function (response) {
                    me.usuarios = response.data.data;

                    me.usuarios = me.usuarios.filter(u => u.video == 1);


                    me.usuarios.forEach(function(u) {
                        u.videos.forEach(function(v) {
                            me.videos.push(v);
                        });
                    });

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