<template>
    <section id="publicateEscort" class="ds section_padding_50 parallax fondo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 text-center">
                    <div class="form-group row alert alert-danger" role="alert" v-show="errors.all().length > 0 && estado == 1">
                        <ul>
                            <li class="text-left"  v-for="error in errors.all()" v-bind:key="error">{{ error }}</li>
                        </ul>
                    </div>
                    <br>
                    <form class="form">  
                        <h2 class="big margin_0" v-text="'Califica a ' + usuario.nombre"></h2>
                        <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">¿Te atendiste con ella?</h2>
    
                        <div class="row">
                            <div class="form-group col-md-12">
                                <input type="text" v-model="calificacion.nombre_cliente" class="form-control" placeholder="Ingresa tu Alias" v-validate.continues="'required|alpha_spaces|min:2'" data-vv-scope="calificacion_usuario">
                            </div>
                        </div>                
                        <div v-show="calificacion.nombre_cliente.length > 0" class="row">
                            <div class="form-group col-md-6 v-center">
                                <label for="" class="label-control col-md-4 h3">Fotos       reales: </label>
                                <div class="col-md-8">
                                    <star-rating v-model="calificacion.fotos" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="fotos" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                                </div>
                            </div>
                            <div class="form-group col-md-6 v-center">
                                <label for="" class="label-control col-md-4 h3">Atención: </label>
                                <star-rating v-model="calificacion.atencion" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="atención" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                            </div>
                        </div>
                        <div v-show="calificacion.nombre_cliente.length > 0" class="row">
                            <div class="form-group col-md-6 v-center">
                                <label for="" class="label-control col-md-4 h3">Disponibilidad: </label>
                                <star-rating v-model="calificacion.disponibilidad" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="disponibilidad" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                            </div>
                            <div class="form-group col-md-6 v-center">
                                <label for="" class="label-control col-md-4 h3">Nota final: </label>
                                <star-rating v-model="calificacion.nota" :star-size="24" class="h3" active-color="#ffdd00" inactive-color="#999999" v-validate.continues="'required|between:1,5'" data-vv-as="nota" data-vv-scope="calificacion_usuario"  @change="cambiarEstado()"></star-rating>
                            </div>
                        </div>
                        <br>
                        <h2 v-show="calificacion.nombre_cliente.length > 0" class="muellerhoff topmargin_5 bottommargin_50 highlight">Puntos sobresalientes</h2>
                        <div v-show="calificacion.nombre_cliente.length > 0" class="form-group row text-left">
                            <div class="col-md-4 col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="rostro" class="custom-control-input" v-model="calificacion.rostro" value="1">
                                    <label class="custom-control-label" for="rostro">Rostro</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="cuerpo" class="custom-control-input" v-model="calificacion.cuerpo" value="1">
                                    <label class="custom-control-label" for="cuerpo">Cuerpo</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="trato" class="custom-control-input" v-model="calificacion.trato" value="1">
                                    <label class="custom-control-label" for="trato">Trato</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="besos" class="custom-control-input" v-model="calificacion.besos" value="1">
                                    <label class="custom-control-label" for="besos">Besos</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="cama" class="custom-control-input" v-model="calificacion.cama" value="1">
                                    <label class="custom-control-label" for="cama">Movimientos</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="sexo_oral" class="custom-control-input" v-model="calificacion.sexo_oral" value="1">
                                    <label class="custom-control-label" for="sexo_oral">Sexo oral</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="sexo_anal" class="custom-control-input" v-model="calificacion.sexo_anal" value="1">
                                    <label class="custom-control-label" for="sexo_anal">Sexo anal</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="oral_mutuo" class="custom-control-input" v-model="calificacion.oral_mutuo" value="1">
                                    <label class="custom-control-label" for="oral_mutuo">Oral mutuo</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="trasero" class="custom-control-input" v-model="calificacion.trasero" value="1">
                                    <label class="custom-control-label" for="trasero">Trasero</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="senos" class="custom-control-input" v-model="calificacion.senos" value="1">
                                    <label class="custom-control-label" for="senos">Senos</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="americana" class="custom-control-input" v-model="calificacion.americana" value="1">
                                    <label class="custom-control-label" for="americana">Americana</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="fogosa" class="custom-control-input" v-model="calificacion.fogosa" value="1">
                                    <label class="custom-control-label" for="fogosa">Fogosa</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <button type="button" name="registro" @click="calificar()" class="theme_button color1 bottommargin_0 btn-block"><i class="fa fa-paper-plane"></i> Enviar</button>
                        </div>
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
                    nombre_cliente: '',
                    atencion: 1,
                    disponibilidad: 1,
                    fotos: 1,
                    nota: 1,
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
                    fogosa: 0
                },
                estado: 0
            }
        },
        methods: {
            calificar(){
                this.$validator.validateAll('calificacion_usuario').then(valido => {
                    if (valido) {
                        let me = this;

                        axios.post('/usuario/calificar',{
                            'calificacion': JSON.stringify(me.calificacion),
                            'usuario_id': this.usuario.id
                        }).then(function (response) {
                            me.calificacion.nombre_cliente = '';
                            me.calificacion.atencion = 1;
                            me.calificacion.disponibilidad = 1;
                            me.calificacion.fotos = 1;
                            me.calificacion.nota = 1;
                            me.calificacion.rostro = 0;
                            me.calificacion.cuerpo = 0;
                            me.calificacion.trato = 0;
                            me.calificacion.besos = 0;
                            me.calificacion.cama = 0;
                            me.calificacion.sexo_oral = 0;
                            me.calificacion.sexo_anal = 0;
                            me.calificacion.oral_mutuo = 0;
                            me.calificacion.trasero = 0;
                            me.calificacion.senos = 0;
                            me.calificacion.americana = 0;
                            me.calificacion.fogosa = 0;

                            swal.fire(
                                'Calificación enviada con éxito',
                                '!Muchas gracias por tu opinión!',
                                'success'
                            );
                            me.estado = 0;

                        }).catch(function (error) {
                            console.log(error.response.data);
                        });
                    }
                })
            },
            cambiarEstado(){
                this.estado = 1;
            }
        }
    }
</script>

<style>
    .btn-block {
        width: 100%;
    }

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

    .vue-star-rating-rating-text{
        display: none;
    }
</style>