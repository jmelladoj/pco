<template>
    <section v-show="calificaciones.length > 0" class="ds model-page section_padding_70 section_padding_bottom_60 columns_padding_25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 text-center">
                    <form class="form">  
                        <h2 class="big margin_0" v-text="'Revisa sus calificaciones'"></h2>
                        <br>
                        <row v-for="calificacion in calificaciones" :key="calificacion.id">
                            <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight" v-text="calificacion.nombre + ' - ' + calificacion.fecha"></h2>
                            <div class="row">
                                <div class="form-group col-md-6 v-center">
                                    <label for="" class="label-control col-md-4 h3">Fotos       reales: </label>
                                    <div class="col-md-8">
                                        <star-rating v-model="calificacion.fotos" readonly="true" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="fotos" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 v-center">
                                    <label for="" class="label-control col-md-4 h3">Atención: </label>
                                    <star-rating v-model="calificacion.atencion" readonly="true" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="atención" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 v-center">
                                    <label for="" class="label-control col-md-4 h3">Disponibilidad: </label>
                                    <star-rating v-model="calificacion.disponibilidad" readonly="true" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="disponibilidad" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                                </div>
                                <div class="form-group col-md-6 v-center">
                                    <label for="" class="label-control col-md-4 h3">Nota final: </label>
                                    <star-rating v-model="calificacion.nota" readonly="true" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="nota" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                                </div>
                            </div> 
                            <br>
                            <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">Puntos sobresalientes</h2>
                            <div class="form-group row text-left">
                                <div class="col-md-4 col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="rostro" class="custom-control-input" v-model="calificacion.rostro" :value="calificacion.rostro">
                                        <label class="custom-control-label" for="rostro">Rostro</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="cuerpo" class="custom-control-input" v-model="calificacion.cuerpo" :value="calificacion.cuerpo">
                                        <label class="custom-control-label" for="cuerpo">Cuerpo</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="trato" class="custom-control-input" v-model="calificacion.trato" :value="calificacion.trato">
                                        <label class="custom-control-label" for="trato">Trato</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="besos" class="custom-control-input" v-model="calificacion.besos" :value="calificacion.besos">
                                        <label class="custom-control-label" for="besos">Besos</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="cama" class="custom-control-input" v-model="calificacion.cama" :value="calificacion.cama">
                                        <label class="custom-control-label" for="cama">Movimientos</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="sexo_oral" class="custom-control-input" v-model="calificacion.sexo_oral" :value="calificacion.sexo_oral">
                                        <label class="custom-control-label" for="sexo_oral">Sexo oral</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="sexo_anal" class="custom-control-input" v-model="calificacion.sexo_anal" :value="calificacion.sexo_anal">
                                        <label class="custom-control-label" for="sexo_anal">Sexo anal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="oral_mutuo" class="custom-control-input" v-model="calificacion.oral_mutuo" :value="calificacion.oral_mutuo">
                                        <label class="custom-control-label" for="oral_mutuo">Oral mutuo</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="trasero" class="custom-control-input" v-model="calificacion.trasero" :value="calificacion.trasero">
                                        <label class="custom-control-label" for="trasero">Trasero</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="senos" class="custom-control-input" v-model="calificacion.senos" :value="calificacion.senos">
                                        <label class="custom-control-label" for="senos">Senos</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="americana" class="custom-control-input" v-model="calificacion.americana" :value="calificacion.americana">
                                        <label class="custom-control-label" for="americana">Americana</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="fotos_reales" class="custom-control-input" v-model="calificacion.fogosa" :value="calificacion.fogosa">
                                        <label class="custom-control-label" for="fotos_reales">Fogosa</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </row>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: [
            'usuario'
        ],
        data() {
            return {
                calificacion: {
                    id: 0,
                    nombre_cliente: '',
                    atencion: 0,
                    higiene: 0,
                    fotos: 0,
                    nota: 0,
                    rostro: 0,
                    cuerpo: 0,
                    trato: 0,
                    besos: 0,
                    cama: 0,
                    sexo_oral: 0,
                    sexo_anal: 0,
                    oral_mutuo: 0,
                    trasero: 0,
                    senos: 0,
                    americana: 0,
                    fotos_reales: 0
                },
                calificaciones: []
            }
        },
        methods: {
            listarValoraciones (){
                let me=this;
                axios.get('/valoraciones/usuario/' + this.usuario.id).then(function (response) {
                    me.calificaciones = response.data.data;
                })
                .catch(function (error) {
                    console.log(error.response.data);
                });
            },
            ver_calificacion(){
                let me = this;

                var calificacion = me.calificaciones.find(function(c) {
                    return c.id == me.calificacion.id;
                });

                if(calificacion){
                    me.calificacion.atencion = calificacion.atencion;
                    me.calificacion.disponibilidad = calificacion.disponibilidad;
                    me.calificacion.fotos = calificacion.fotos;
                    me.calificacion.nota = calificacion.nota;
                    me.calificacion.rostro = calificacion.rostro;
                    me.calificacion.cuerpo = calificacion.cuerpo;
                    me.calificacion.trato = calificacion.trato;
                    me.calificacion.besos = calificacion.besos;
                    me.calificacion.cama = calificacion.cama;
                    me.calificacion.sexo_oral = calificacion.sexo_oral;
                    me.calificacion.sexo_anal = calificacion.sexo_anal;
                    me.calificacion.oral_mutuo = calificacion.oral_mutuo;
                    me.calificacion.trasero = calificacion.trasero;
                    me.calificacion.senos = calificacion.senos;
                    me.calificacion.americana = calificacion.americana;
                    me.calificacion.fogosa = calificacion.fogosa;
                }
            }
        },
        mounted() {
            this.listarValoraciones();
        }
    }
</script>

<style>
    .parallax {
        background-repeat: initial;
    }

    .v-center {
        display: inline-block;
        vertical-align: middle;
        float: none;
    }

    .swal2-popup {
        font-size: 1.2rem;
    }
</style>