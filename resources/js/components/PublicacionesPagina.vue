<template>
        <section v-show="publicaciones.length > 0" class="ds section_padding_top_100 section_padding_bottom_50 columns_padding_25">
        <div class="container-fluid">
            <div class="row">
                <div v-for="(publicacion, index) in publicaciones" :key="index" class="col-md-4 col-sm-12 col-xs-12">
                    <article class="vertical-item post format-standard with_background">
                        <a v-bind:href="'publicacion/' + publicacion.id">
                            <div class="item-media entry-thumbnail">
                                <img v-lazy="'storage/' + publicacion.imagen" class="post-img" v-bind:alt="'Placerconce.cl - ' + publicacion.titulo">
                            </div>
                
                            <div class="item-content entry-content">
                                <header class="entry-header">
                                    <h4 class="entry-title text-center">
                                        <a v-bind:href="'publicacion/' + publicacion.id" rel="bookmark text-center" v-text="publicacion.titulo"></a>
                                    </h4>
                                </header>
                                <!-- .entry-header -->
    
                                <p class="text-justify" v-text="publicacion.resumen.substr(0, 200) + ' ... ver más aquí'"></p>
                                <p class="text-center" v-text="'Publicado hace ' + publicacion.creado + ' horas.'"></p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                publicaciones: []
            }
        },
        methods:{
            listarPublicaciones (){
                let me=this;
                axios.get('/publicaciones/pagina').then(function (response) {
                    me.publicaciones = response.data.data;
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
            },
        },
        mounted() {
            this.listarPublicaciones();
        }
    }
</script>

<style>
    .post-img {
        width: 100%;
        max-height: 200px;
        width: auto;
        border-radius: 1rem !important;
    }

    h4 a {
        font-size: 25px;
    }

    .entry-title {
        text-transform: uppercase;
    }

    .entry-thumbnail {
        padding-top: 10px;
    }

    .espacio {
        padding-bottom: 10px;
    }

</style>