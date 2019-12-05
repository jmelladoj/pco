<template>
    <section class="ds section_padding_70 parallax fondo altura-seccion">
        <div class="container-fluid"> 
            <div class="row mt-5 mb-5">
                <div class="mt-5 mb-5 col-xs-offset-3 col-xs-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 text-center">
                    <br>
                    <h2 class="big margin_0">Hola</h2>
                    <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">Selecciona tu ciudad</h2>
                    
                    <form class="form">                      
                        <div class="form-group">
                            <select class="form-control" v-model="ciudad.id" @change="cambiarCiudad()">
                                <option value="0">Selecciona tu ciudad</option>
                                <option v-for="(ciudad, index) in ciudades" :key="index" :value="ciudad.id" v-text="ciudad.nombre"></option>
                            </select>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>


<script>
    export default {
        data() {
            return {
                ciudad:{
                    id: 0
                },
                ciudades: []
            }
        },    
        methods:{
            listarCiudades (){
                let me=this;
                axios.get('/ciudades/usuario').then(function (response) {
                    me.ciudades = response.data.ciudades;
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
            },
            cambiarCiudad(){
                let me = this;
                this.$root.ciudad = me.ciudad.id;
            }
        },
        mounted() {
            this.listarCiudades();
        }
    }
</script>

<style>
    @media (min-width: 992px) {
        .altura-seccion {
            min-height: 800px;
        }

    }
</style>