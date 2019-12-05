<template>
    <section id="publicateEscort" class="ds section_padding_70 parallax fondo">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-xs-offset-2 col-xs-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6 text-center">
                    <div class="form-group row alert alert-danger" role="alert" v-show="errors.all().length > 0">
                        <ul>
                            <li class="text-left"  v-for="error in errors.all()" v-bind:key="error">{{ error }}</li>
                        </ul>
                    </div>
                    <br>
                    <h2 class="big margin_0">Publicate ahora ya</h2>
                    <h2 class="muellerhoff topmargin_5 bottommargin_50 highlight">Sin esperas</h2>

                    <form class="form">                      
                        <div class="form-group">
                            <label for="usuario" class="sr-only">Usuario <span class="required">*</span></label>
                            <input type="text" aria-required="true" size="30" v-model="usuario" class="form-control text-center" placeholder="Usuario" v-validate.continues="'required'" name="usuario" data-vv-scope="registro_usuario">
                        </div>
                        <div class="form-group">
                            <label for="name" class="sr-only">Contraseña
                                <span class="required">*</span>
                            </label>
                            <input type="password" aria-required="true" size="30" v-model="clave" class="form-control text-center" placeholder="Contraseña" v-validate.continues="'required|min:8'" data-vv-as="Contraseña" data-vv-scope="registro_usuario">
                        </div>
                        <div class="form-group">
                            <select v-model="sexo" class="form-control" v-validate.continues="'required|included:1,2'" data-vv-as="Sexo" data-vv-scope="registro_usuario">
                                <option value="0">Selecciona una opción</option>
                                <option value="1">Mujer</option>
                                <option value="2">Hombre</option>
                            </select>
                        </div>
                        <br>
                        <button type="button" name="registro" @click="registro()" class="theme_button color1 bottommargin_0">Registrarme</button>
                        <button type="button" @click="limpiarDatos()" class="theme_button inverse bottommargin_0">Limpiar</button> 
                    </form>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="https://www.clubvip.cl/" target="__blank">
                        <img src="https://www.clubvip.cl/images/logo.png" alt="" class="img-fluid logos" height="150">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="https://www.tusencuentros.cl/ciudad/1" target="__blank">
                        <img src="https://www.tusencuentros.cl/principal/images/logo.png" alt="" class="img-fluid logos" height="150">
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                usuario: '',
                clave: '',
                sexo: 0
            }
        },    
        methods:{
            limpiarDatos(){
                //this.$validator.reset();
                this.usuario = '';
                this.clave = '';
                this.sexo = 0;
            },
            registro(){
                this.$validator.validateAll('registro_usuario').then(valido => {
                    if (valido) {
                        let me = this;
                        me.errors.clear();
                        axios.post('/register',{
                            'usuario': me.usuario,
                            'clave': me.clave,
                            'sexo': me.sexo,
                            'tipo_usuario': 2
                        }).then(function (response) {
                            window.location.href = "/home";
                        }).catch(function (error) {
                            console.log(error);
                            if (error.response.status === 422){
                                me.errors.add({
                                    field: 'registro',
                                    msg: 'El usuario ya esta en uso, intenta con otro por favor.'
                                })
                            } else {
                                console.error(error);
                            }                      
                        });
                    }
                })
            },
        }
    }
</script>

<style>
    .fondo{
        background-image: url('../../../public/general/images/map2.jpeg');
    }

    .logos{
        max-height: 100px;
    }
</style>