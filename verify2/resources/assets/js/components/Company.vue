<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Empresas
                        <button type="button" @click="abrirModal('company','registrar')" class="btn btn-secondary">
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="ruc">Ruc</option>
                                      <option value="razon_social">Razon Social</option>
                                      </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarCompany(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarCompany(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>RUC</th>
                                    <th>Razon Social</th>
                                   <!--  <th>Represante Legal</th> -->
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="company in arrayCompany" :key="company.id">
                                    <td>
                                        <button type="button" @click="abrirModal('company','actualizar',company)" class="btn btn-warning btn-sm">
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="company.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarCompany(company.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-info btn-sm" @click="activarCompany(company.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="company.ruc"></td>
                                    <td v-text="company.razon_social"></td>
                                    <!-- <td  v-text="company.representantes_legales.r1.nombre"></td> -->
                                    <td v-text="company.telefono"></td>
                                    <td v-text="company.email"></td>
                                    <td>
                                        <div v-if="company.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">RUC</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="ruc" class="form-control" placeholder="RUC de la empresa" maxlength="11" pattern=".{11,}" >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="email" class="form-control" placeholder="Ingrese Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Teléfono</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="telefono" class="form-control" placeholder="Ingrese Teléfono" maxlength="9" pattern=".{9,}">
                                    </div>
                                </div>
                                <div v-show="errorCompany" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjCompany" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarCompany()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarCompany()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    export default {
        data (){
            return {
                company_id: 0,
                ruc:'',
                razon_social:'',
                condicion:'',
                nombre_comercial:'',
                tipo:'',
                fecha_inscripcion:'',
                estado:'',
                direccion:'',
                sistema_emision:'',
                actividad_exterior:'',
                oficio:'',
                actividad_economica:'',
                sistema_contabilidad:'',
                emision_electronica:'',
                ple:'',
                cantidad_trabajadores:'',
                telefono:'',
                email:'',
                representantes_legales:{
                    r1:{
                        nombre:'',
                    }
                },
                arrayCompany : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorCompany : 0,
                errorMostrarMsjCompany : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'nombre',
                buscar : ''
            }
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;

            }
        },
        methods : {
            listarCompany (page,buscar,criterio){
                let me=this;
                var url= '/company?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayCompany = respuesta.companys.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarCompany(page,buscar,criterio);
            },
            registrarCompany(){
               /* if (this.validarCompany()){
                    return;
                }*/

                let me = this;

                axios.post('/company/registrar',{
                    'ruc': this.ruc,
                    'email': this.email,
                    'telefono': this.telefono
                }).then(function (response) {
                    me.cerrarModal();
                    me.listarCompany(1,'','razon_social');
                    /*console.log(response);*/

                }).catch(function (error) {
                    console.log(error);
                });
            },

            desactivarCompany(id){
               swal({
                title: 'Esta seguro de desactivar esta categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/company/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarCompany(1,'','razon_social');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            activarCompany(id){
               swal({
                title: '¿Esta seguro de activar esta categoría?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/company/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarCompany(1,'','razon_social');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });


                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {

                }
                })
            },
            validarCompany(){
                this.errorCompany=0;
                this.errorMostrarMsjCompany =[];

                if (!this.ruc) this.errorMostrarMsjCompany.push("El RUC no puede estar vacío.");
                if (!this.validRuc(this.ruc)) this.errorMostrarMsjCompany.push('El RUC debe estar correcto.');

                if (!this.email) this.errorMostrarMsjCompany.push("El Email no puede estar vacío.");
                if (!this.validEmail(this.email)) this.errorMostrarMsjCompany.push('El Email debe estar correcto.');

                if (!this.telefono) this.errorMostrarMsjCompany.push("El telefono de la categoría no puede estar vacío.");
                if (!this.validPhone(this.telefono)) this.errorMostrarMsjCompany.push('El telefono debe estar correcto.');

                if (this.errorMostrarMsjCompany.length) this.errorCompany = 1;

                return this.errorCompany;
            },
            validEmail: function (email) {
              var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return re.test(email);
            },

            validPhone: function (telefono) {
              var re = /^\d{9}$/;
              return re.test(telefono);
            },

            validRuc: function (ruc) {
              var re = /^\d{11}$/;
              return re.test(ruc);
            },

            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                /*this.nombre='';
                this.descripcion='';*/
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "company":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Empresa';
                                this.ruc= '';
                                this.email = '';
                                this.telefono = '';
                                this.tipoAccion = 1;
                                break;
                            }
                            /*case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Empresa';
                                this.tipoAccion=2;
                                this.categoria_id=data['id'];
                                this.nombre = data['nombre'];
                                this.descripcion= data['descripcion'];
                                this.precio= data['precio'];
                                break;
                            }*/
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarCompany(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: red !important;
        font-weight: bold;
    }
</style>
